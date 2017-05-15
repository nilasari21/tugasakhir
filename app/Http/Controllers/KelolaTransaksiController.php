<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Kategori;
use App\Metode;
use App\Ukuran;
use Image;
// cause Illuminate\Support\Fades\Input;
use App\Models\ProdukUkuran;


class KelolaTransaksiController extends Controller {

   public function index()
    {
        
      $data = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('produk','produk.id','detail_transaksi.id_produk')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_detail','detail_transaksi.id_detail')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('detail_transaksi.status_pesan','=','Pending')
                        ->get();
                        // dd($data);
      $produksi = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('produk','produk.id','detail_transaksi.id_produk')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_detail','detail_transaksi.id_detail')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('detail_transaksi.status_pesan','=','Produksi')
                        ->get();
      $packing = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('produk','produk.id','detail_transaksi.id_produk')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_detail','detail_transaksi.id_detail')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('detail_transaksi.status_pesan','=','Packing')
                        ->get();
      $pengiriman = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('produk','produk.id','detail_transaksi.id_produk')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_detail','detail_transaksi.id_detail')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('detail_transaksi.status_pesan','=','Pengiriman')
                        ->get();
      $selesai = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('produk','produk.id','detail_transaksi.id_produk')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_detail','detail_transaksi.id_detail')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('detail_transaksi.status_pesan','=','Selesai')
                        ->get();
        return view('admin.transaksi.kelola_transaksi')->with(compact('data',$data,'produksi',$produksi,'packing',$packing,'pengiriman',$pengiriman,'selesai',$selesai));
       //
    }
    
}