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
                      ->where('transaksi.status_bayar','Lunas')
                      ->get();
                        
        return view('machiko.status_pemesanan')->with('data',$data);
    }
    public function detail($id) {
        
      $data=Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                      ->join('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                      ->join('produk','produk_ukuran.produk_id','produk.id')
                      ->join('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                      ->where('transaksi.id_transaksi','=',$id)
                      ->where('transaksi.status_bayar','Lunas')
                      ->select('transaksi.*','detail_transaksi.*','produk_ukuran.*','ukuran.nama_ukuran','produk.*')
                      ->get();
                        
        return view('machiko.detail_status_pesan')->with('data',$data);
    }
   

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
