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
use DB;
// cause Illuminate\Support\Fades\Input;
use App\Models\ProdukUkuran;


class PembayaranCODController extends Controller {

   public function index()
    {
        
      $data = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->join('metode','transaksi.id_metode','metode.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('detail_transaksi.status_pesan','=','Pending')
                        ->where('metode.jenis','=','COD')
                        ->get();
      // dd($data);
        return view('admin.transaksi.pembayaran_cod')->with('data',$data);
       //
    }
}
     
    

