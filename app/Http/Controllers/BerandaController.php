<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Users;
use Illuminate\Http\Request;

class BerandaController extends Controller {
	public function __construct(){
		$this->middleware('levelAdmin');
	}


    public function index() {
       $countTrans = Transaksi::where('jenis_pemesanan','Reseller')
       						->where('status_jenis_pesan','Tunggu')
       						->count('id_transaksi');
       $data = Users::where('level','!=','Admin')
                    ->where('konfirm_admin','Pending')
                    ->count('id');
        $tunggu = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        // ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('detail_transaksi.status_pesan','=','Pending')
                        ->count('detail_transaksi.id_detail_transaksi');
        $data2 = Transaksi::join('konfirmasi','konfirmasi.id_konfirmasi','transaksi.id_konfirmasi')
                        ->join('users','transaksi.id_user','users.id')
                        ->select('transaksi.id_transaksi','transaksi.total_bayar','users.name','konfirmasi.*')
                        ->where('konfirmasi.status','=','Pending')
                        ->count('konfirmasi.id_konfirmasi');
        $data3 = Transaksi::leftjoin('users','users.id','transaksi.id_user')
                        ->join('metode','transaksi.id_metode','metode.id')
                        // ->select('transaksi.*','users.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('metode.jenis','=','COD')
                        ->count('transaksi.id_transaksi');
        return view('admin.beranda.beranda')->with(compact('countTrans',$countTrans,'data',$data,'tunggu',$tunggu,'data2',$data2,'data3',$data3));
    }

}