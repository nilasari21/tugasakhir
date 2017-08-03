<?php

namespace App\Http\Controllers;
use App\MetodeProduk;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Penerima;
use App\Keranjang;
use App\Users;
use App\User;
use App\Metode;
use App\DetailTransaksi;
use DB;
use Carbon\Carbon;
use RajaOngkir;
use Auth;
// use Notification;
use App\Notifications\PostNewNotification;



use Illuminate\Http\Request;

class LaporanTransaksi extends Controller {

    public function index() {
      
         $selesai = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('transaksi.status_pemesanan_produk','=','Selesai')
                        ->groupby('transaksi.id_transaksi')
                        ->get();

        return view('admin.transaksi.laporan_transaksi')->with('selesai',$selesai);
    }
    public function Laporan(Request $request)
    {
        // proses update data\
        // dd($request->tgl_awal);
       $selesai = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('transaksi.status_pemesanan_produk','!=','Batal')
                        ->whereBetween('transaksi.tgl_transaksi',[$request->tgl_awal,$request->tgl_akhir])
                        ->groupby('transaksi.id_transaksi')
                        ->get();
        // $data->save();
        $from=$request->tgl_awal;
        $to = $request->tgl_akhir;
        // dd($from);
        $total= Transaksi::select(DB::raw ('SUM(transaksi.total_bayar) as total'))
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('transaksi.status_pemesanan_produk','!=','Batal')
                        ->whereBetween('transaksi.tgl_transaksi',[$request->tgl_awal,$request->tgl_akhir])
                        // ->groupby('transaksi.id_transaksi')
                        ->first();
        $ongkir=Transaksi::select(DB::raw ('SUM(transaksi.ongkir) as ongkir'))
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('transaksi.status_pemesanan_produk','!=','Batal')
                        ->whereBetween('transaksi.tgl_transaksi',[$request->tgl_awal,$request->tgl_akhir])
                        // ->groupby('transaksi.id_transaksi')
                        ->first();
        $uang=$total->total-$ongkir->ongkir;
        // dd($uang);
                        // dd($ongkir);
        return view('admin.transaksi.laporan_transaksi2')->with(compact('selesai',$selesai,'from',$from,'to',$to,'total'
            ,$total,'ongkir',$ongkir,'uang',$uang));
    }
}