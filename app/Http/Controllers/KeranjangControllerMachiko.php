<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Keranjang;
use App\Produk;
use App\ProdukUkuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
class KeranjangControllerMachiko extends Controller {

    public function index() {
        // $data=[];
        
        $data = Keranjang::join('users','users.id','=','keranjang.user_id')
                         ->leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','=','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('keranjang.*','produk.*','produk.jenis','produk_ukuran.*','ukuran.nama_ukuran','users.level')
                         ->where('user_id',Auth::user()->id)
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
                          // dd($data);

        // $data->ukuran= new ProdukUkuran;
        /*$ukuran= ProdukUkuran::join('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                            ->where('produk_ukuran.produk_id','=','keranjang.produk_id'
                              ,'and','keranjang.id_produk_ukuran','=','produk_ukuran.id_detail')

                            ->get();*/
        return view('machiko.keranjang')->with('data',$data);
    }
    
    public function tambah(Request $request)
    {
        
        // dd($status);
        $keranjang= Keranjang::where('user_id','=',Auth::user()->id)
                            ->where('id_produk_ukuran','=',$request->id_produk_ukuran)
                            ->first();
        // dd($request->jumlah, $request->id_produk_ukuran);
        $status=$request->status;
        if($status=="Ready Stock"){
            $produk= ProdukUkuran::where('id_produk_ukuran','=',$request->id_produk_ukuran)->first();
            // dd($produk);
            $produk->stock= $produk->stock- $request->jumlah;
            $produk->save();

        }  else{
            $produk= ProdukUkuran::where('id_produk_ukuran','=',$request->id_produk_ukuran)->first();
            // dd($produk);
            $produk->stock="NULL";
            $produk->save();
        }
        if(count($keranjang)!=0){
            $keranjang1= Keranjang::where('user_id','=',Auth::user()->id)
                            ->where('id_produk_ukuran','=',$request->id_produk_ukuran)
                            ->first();
            $keranjang1->jumlah=$keranjang1->jumlah + $request->jumlah;
            
            $keranjang1->save();
            
            // dd($status);
            
        }else{
          $data = new Keranjang; // new Model

        // $data->produk_id = $request->produk_id;
        $data->user_id = Auth::user()->id;
        $data->id_produk_ukuran = $request->id_produk_ukuran;
        $data->jumlah = $request->jumlah;
        $data->keterangan = $request->keterangan;
        $berat= Produk::where('id','=',$request->produk_id)
                    ->first();
        $data->berat_total=$berat->berat*$request->jumlah;
        // $hargatambah=0;
        $produkukuran= ProdukUkuran::where('id_produk_ukuran','=',$request->id_produk_ukuran)
                    ->first();
                    // dd($produkukuran);
        $hargatambah=$produkukuran->harga_tambah;
        
        $data->Total_harga=($produkukuran->harga_pokok * $request->jumlah)+$hargatambah;
        $data->save();
        // dd();
        $status=$request->status;
        // dd($status);
        /*if($status=="Ready Stock"){
            $produk= ProdukUkuran::where('id_produk_ukuran','=',$request->id_produk_ukuran)->first();
            $produk->stock=$produk->stock - 1;
            $produk->save();

        }  else{
            $produk= ProdukUkuran::where('id_produk_ukuran','=',$request->id_produk_ukuran)->first();
            // dd($produk);
            $produk->stock="NULL";
            $produk->save();
        }*/
        }
        $notification = array(
                    'message' => 'Produk berhasil disimpan di keranjang', 
                    'alert-type' => 'success'
                );
        
        // $request->session()->flash('alert-success', 'User was successful added!');
        return redirect()
                ->back()
                ->with($notification);
                

       //
    }

    public function getDelete($id)
    {
        $data = Keranjang::where('id_keranjang','=',$id);
        $data->delete();
        /**/
        return redirect('keranjang');
    }

    public function postUpdate(Request $request)
    {
        $i=0;

        // dd($request->berat);
        foreach ($request->idproduk as $key=>$index ) {
// dd($request->harga_tambah);
            // dd($request->idproduk);
            // dd($key);
           /* $i=1;
            
            foreach ($request->jumlahawal as $val) {*/
              $tambah=$request->jumlah1[$i] - $request->jumlahawal[$i] ;
                // dd($tambah);
            /*$data=Keranjang::where('id_keranjang','=',$request->idkeranjang[$i])->first();
            $data->jumlah=$key;
            
            $data->save();*/
            if($request->status[$i]=="Ready Stock"){
            $produk= ProdukUkuran::where('id_produk_ukuran','=',$index)->first();
            // dd($produk->stock_total);
            
          $produk->stock = $produk->stock - $tambah;
            
            $produk->save(); 
            // dd($tambah);
            }   
            
            $i++;       
        }
        
        $i=0;

        foreach ($request->idkeranjang as $key=>$index ) {
           /* $i=1;
            foreach ($request->jumlahawal as $val) {*/
              /*$tambah=$key - $request->jumlahawal ;
            dd($tambah);*/

            $data=Keranjang::where('id_keranjang','=',$index)->first();
            $data->jumlah=$request->jumlah1[$i];
            $data->berat_total=$request->berat[$i]*$request->jumlah1[$i];
            $harga_tambah=($request->harga_tambah[$i]*$request->jumlah1[$i]);
            $data->Total_harga=(($request->harga[$i]*$request->jumlah1[$i]) + $harga_tambah );

            $data->save();
            /*if($request->status="Ready Stock"){
            $produk= Produk::where('id','=',$request->idproduk)->first();
            
            $produk->stock_total=$produk->stock_total - $tambah;
            
            $produk->save(); 
            }   
            */
            $i++;       
        }
        
        
        return redirect('keranjang');
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
