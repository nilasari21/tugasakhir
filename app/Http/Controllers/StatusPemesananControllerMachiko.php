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
use Auth;

class StatusPemesananControllerMachiko extends Controller {

    public function index() {
        
      $data=Transaksi::where('transaksi.id_user','=',Auth::user()->id)
                      // ->where('transaksi.status_bayar','Lunas')
                      ->get();
                        
        return view('machiko.status_pemesanan')->with('data',$data);
    }
    public function detail($id) {
        
     $data = Transaksi::select('transaksi.id_transaksi')
                          ->where('id_user','=',Auth::user()->id)
                          ->orderby('id_transaksi','desc')
                          ->first();
                          
        $trans = Transaksi::leftjoin('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                          
                           ->leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','detail_transaksi.id_produk_ukuran')
                           ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('transaksi.*','detail_transaksi.*','produk.*','produk_ukuran.*','ukuran.*','detail_transaksi.status as statusd')
                         ->where('transaksi.id_transaksi','=',$id)
                         ->where('detail_transaksi.id_transaksi','=',$id)
                         ->get();
        $transak=Transaksi::leftjoin('penerima','penerima.id_penerima','transaksi.id_penerima')
                          ->leftjoin('metode','metode.id','transaksi.id_metode')
                          ->where('transaksi.id_transaksi','=',$id)
                          ->select('transaksi.*','penerima.*','metode.*')
                          ->get();
       // dd($transak);
        
        return view('machiko.detail_status_pesan')->with(compact('data',$data,'trans',$trans,'transak',$transak));
    }
   

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
