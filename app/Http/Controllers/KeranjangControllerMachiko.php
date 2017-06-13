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
use Carbon\Carbon;
class KeranjangControllerMachiko extends Controller {
public function __construct(){
    $this->middleware('levelCustomer');
  }

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
        $keranjang= Keranjang::where('user_id','=',Auth::user()->id)
                            ->where('id_produk_ukuran','=',$request->id_produk_ukuran)->first();
        $status=$request->status;
        if($status=="Ready Stock"){
            $produk= ProdukUkuran::where('id_produk_ukuran','=',$request->id_produk_ukuran)->first();
            $produk->stock= $produk->stock- $request->jumlah;
            $produk->save();
        }  else{
            $produk= ProdukUkuran::where('id_produk_ukuran','=',$request->id_produk_ukuran)->first();
            $produk->stock="NULL";
            $produk->save();
        }
        if(count($keranjang)!=0){
            $keranjang1= Keranjang::where('user_id','=',Auth::user()->id)
                            ->where('id_produk_ukuran','=',$request->id_produk_ukuran)->first();
            $keranjang1->jumlah=$keranjang1->jumlah + $request->jumlah;
            // $keranjang1->berat_total=$keranjang1->berat_total + $request->
            $keranjang->created_at= Carbon::now(7);
          $keranjang->updated_at= Carbon::now(7);
            $keranjang1->save();
        }else{
          $data = new Keranjang; 
        $data->user_id = Auth::user()->id;
        $data->id_produk_ukuran = $request->id_produk_ukuran;
        $data->jumlah = $request->jumlah;
        // $data->keterangan = $request->keterangan;
        $berat= Produk::where('id','=',$request->produk_id)
                    ->first();
        $data->berat_total=$berat->berat*$request->jumlah;
        $produkukuran= ProdukUkuran::where('id_produk_ukuran','=',$request->id_produk_ukuran)
                    ->first();            
        $hargatambah=$produkukuran->harga_tambah;
        
        $data->Total_harga=($produkukuran->harga_pokok * $request->jumlah)+$hargatambah;
        $data->created_at= Carbon::now(7);
          $data->updated_at= Carbon::now(7);
        $data->save();
        $status=$request->status;
        }
        $notification = array(
                    'message' => 'Produk berhasil disimpan di keranjang', 
                    'alert-type' => 'success'
                );
        return redirect()
                ->back()
                ->with($notification);
      }

    public function getDelete($id)
    {
        
        $keranjang=Keranjang::select('id_produk_ukuran','jumlah')
                            ->where('id_keranjang',$id)
                            ->first();
        $produk=ProdukUkuran::where('id_produk_ukuran',$keranjang->id_produk_ukuran)
                            ->join('produk','produk.id','produk_ukuran.produk_id')
                            ->first();
        if($produk->jenis=="Ready Stock"){
        $produk->stock=$produk->stock + $keranjang->jumlah;
        $produk->save();    
        }
        

        $data = Keranjang::where('id_keranjang','=',$id);
        $data->delete();
        return redirect('keranjang');
        
    }

    public function postUpdate(Request $request)
    {
        $i=0;

        
        foreach ($request->idproduk as $key=>$index ) {

              $tambah=$request->jumlah1[$i] - $request->jumlahawal[$i] ;
             
            if($request->status[$i]=="Ready Stock"){
            $produk= ProdukUkuran::where('id_produk_ukuran','=',$index)->first();
           if($produk->stock<$tambah){
             $notification = array(
                    'message' => 'stock kurang', 
                    'alert-type' => 'warning'
                );
        
        
        return redirect()
                ->back()
                ->with($notification);
                
           }else{
            $produk->stock = $produk->stock - $tambah;
            
            $produk->save(); 
           }
          
           
            }   
            
            $i++;       
        }
        
        $i=0;

        foreach ($request->idkeranjang as $key=>$index ) {
           

            $data=Keranjang::where('id_keranjang','=',$index)->first();
            $data->jumlah=$request->jumlah1[$i];
            $data->berat_total=$request->berat[$i]*$request->jumlah1[$i];
            $harga_tambah=($request->harga_tambah[$i]*$request->jumlah1[$i]);
            $data->Total_harga=(($request->harga[$i]*$request->jumlah1[$i]) + $harga_tambah );

            $data->save();
           
            $i++;       
        }
        
        
        return redirect('keranjang');
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
