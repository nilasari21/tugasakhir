<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Konfirmasi;
use App\Produk;
use App\ProdukUkuran;
use Illuminate\Http\Request;
use Image;

class KonfirmasiControllerMachiko extends Controller {

    public function index() {
        // $data=[];
        
        $data = Transaksi::leftjoin('konfirmasi','transaksi.id_konfirmasi','=','konfirmasi.id_konfirmasi')
                         ->join('users','users.id','=','transaksi.id_user')
                         ->select('transaksi.*','konfirmasi.*','users.*')
                         ->where('id_user','=','2')
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
                         // dd($data);
        // $data->ukuran= new ProdukUkuran;
        /*$ukuran= ProdukUkuran::join('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                            ->where('produk_ukuran.produk_id','=','keranjang.produk_id'
                              ,'and','keranjang.id_produk_ukuran','=','produk_ukuran.id_detail')

                            ->get();*/
        return view('machiko.konfirmasi')->with('data',$data);
    }
   public function simpan(Request $request)
    {
      $konfirmasi = new Konfirmasi; 
     
      
      $thumb = ('.img/produk/client');

      if($request->hasFile('image')){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = $request->file('image');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
       
        Image::make($images)->resize('150', '150')->save($thumb . '/' . $imageName);

        }
      $konfirmasi->total_transfer= $request->total_transfer;
      $konfirmasi->foto=$imageName;
      $konfirmasi->status="Pending";
      $konfirmasi->tgl_transfer=$request->tanggal_transfer;
      $konfirmasi->save();
      // dd($konfirmasi);
      $transaksi = Transaksi::where('id_transaksi','=',$request->idtrans)->first();
//dd($data);
          $transaksi->id_konfirmasi=$konfirmasi->id_konfirmasi;
          // dd($konfirmasi->id);
          $transaksi->save();
     return redirect('konfirmasi');

       //

        
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
