<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Produk;
use App\Users;
use App\RiwayatPo;
use Carbon\Carbon;
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
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('transaksi.status_pemesanan_produk','=','Pending')
                        ->count('transaksi.id_transaksi');
        $data2 = Transaksi::join('konfirmasi','konfirmasi.id_konfirmasi','transaksi.id_konfirmasi')
                        ->join('users','transaksi.id_user','users.id')
                        ->select('transaksi.id_transaksi','transaksi.total_bayar','users.name','konfirmasi.*')
                        ->where('konfirmasi.status','=','Pending')
                        ->count('konfirmasi.id_konfirmasi');
        $data3 = Transaksi::leftjoin('users','users.id','transaksi.id_user')
                        ->join('metode','transaksi.id_metode','metode.id')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('metode.jenis','=','COD')
                        ->count('transaksi.id_transaksi');
        $produk= Produk::join('produk_ukuran','produk_ukuran.produk_id','produk.id')
                        ->leftjoin('detail_transaksi','detail_transaksi.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
                        ->join('transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        ->where('produk.jenis','=','PreOrder')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->select('produk.*', 
                            (DB::raw ('SUM(detail_transaksi.jumlah_beli) as total')))
                        ->groupby('produk.id')
                        ->orderby('produk.id','desc')
                        ->get();
                        // dd($produk);
        
        // dd($status);
       /* $produk=Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                         ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->where('produk.jenis','=','PreOrder')
                        ->select('produk.*','detail_transaksi.*',
                            (DB::raw ('SUM(detail_transaksi.jumlah_beli) as total')))
                        ->groupby('produk.id')
                        ->orderby('produk.id','desc')
                        ->get();*/
                        // dd($produk);
        /*$open= RiwayatPo::join('status_po','status_po.id_status_po','riwayat_po.id_status_po')
                        ->join('produk','produk.id','riwayat_po.id_produk')
                        ->select*/
        return view('admin.beranda.beranda')->with(compact('countTrans',$countTrans,'data',$data,'tunggu',$tunggu,
            'data2',$data2,'data3',$data3,'produk',$produk));
    }
    public function postUpdate($id, Request $request){
        if($request->status=="Produksi"){
        $data=Transaksi::join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        ->join('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->join('produk','produk.id','produk_ukuran.produk_id')
                        // ->select('transaksi.*')
                        ->where('produk.id','=',$id)
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->update(['status_pemesanan_produk'=>'Produksi']);
        $status= new RiwayatPo;
        $status->id_produk=$id;
        $status->id_status_po=2;
        $status->updated_at=Carbon::now(8);
        $status->save();    
        }
        return redirect('beranda');
        
    }

}