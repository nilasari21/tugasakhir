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
// use DB;
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
        $data1=Transaksi::join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        ->join('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->join('produk','produk.id','produk_ukuran.produk_id')
                       ->where('produk.id','=',$id)
                        ->where('produk.jenis','=','PreOrder')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->select('transaksi.id_transaksi')
                        ->get();
                        
        foreach ($data1 as $key ) {
            $data2=Transaksi::join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        
                        ->where('transaksi.id_transaksi','=',$key->id_transaksi)
                        ->select('detail_transaksi.id_transaksi',(DB::raw ('count(detail_transaksi.id_detail_transaksi)as b')))
                        ->get();
            foreach ($data2 as $key ) {
            
            if($key->b==1){
              $data=Transaksi::where('id_transaksi','=',$key->id_transaksi)
                            ->where('status_bayar','=','Lunas')
                        ->first();
                $data->status_pemesanan_produk="Produksi";
                $data->save();
                        
            }else{
                $data=Transaksi::where('id_transaksi','=',$key->id_transaksi)
                                ->where('status_bayar','=','Lunas')
                                ->first();
                        
                        $data->status_pemesanan_produk="Pending";
                $data->save();
            }
        }
        
                        
        }
        // dd($data2);
        
        $status= new RiwayatPo;
        $status->id_produk=$id;
        $status->id_status_po=2;
        $status->updated_at=Carbon::now(8);
        $status->save();    
        }
        if($request->status=="Packing"){
        $data1=Transaksi::join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        ->join('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->join('produk','produk.id','produk_ukuran.produk_id')
                       ->where('produk.id','=',$id)
                        ->where('produk.jenis','=','PreOrder')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->select('transaksi.id_transaksi')

                        ->get();
                        
        foreach ($data1 as $key ) {
            $data2=Transaksi::join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        
                        ->where('transaksi.id_transaksi','=',$key->id_transaksi)
                        ->select('detail_transaksi.id_transaksi',(DB::raw ('count(detail_transaksi.id_detail_transaksi)as b')))
                        ->get();
                        // dd($data2);
            foreach ($data2 as $key ) {
            // dd($data2);
            if($key->b==1){
              $data=Transaksi::where('id_transaksi','=',$key->id_transaksi)
                            ->where('status_bayar','=','Lunas')
                        ->first();
                        // dd($data);
                $data->status_pemesanan_produk="Packing";
                $data->save();
                        
            }
        }
        
                        
        }
        // dd($data2);
        
        $status= new RiwayatPo;
        $status->id_produk=$id;
        $status->id_status_po=3;
        $status->updated_at=Carbon::now(8);
        $status->save();    
        }
        if($request->status=="Pengiriman"){
        $data1=Transaksi::join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        ->join('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->join('produk','produk.id','produk_ukuran.produk_id')
                       ->where('produk.id','=',$id)
                        ->where('produk.jenis','=','PreOrder')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->select('transaksi.id_transaksi')
                        ->get();
                        
        foreach ($data1 as $key ) {
            $data2=Transaksi::join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        
                        ->where('transaksi.id_transaksi','=',$key->id_transaksi)
                        ->select('detail_transaksi.id_transaksi',(DB::raw ('count(detail_transaksi.id_detail_transaksi)as b')))
                        ->get();
            foreach ($data2 as $key ) {
            
            if($key->b==1){
              $data=Transaksi::where('id_transaksi','=',$key->id_transaksi)
                            ->where('status_bayar','=','Lunas')
                        ->first();
                $data->status_pemesanan_produk="Pengiriman";
                $data->save();
                        
            }
        }
        
                        
        }
        // dd($data2);
        
        $status= new RiwayatPo;
        $status->id_produk=$id;
        $status->id_status_po=4;
        $status->updated_at=Carbon::now(8);
        $status->save();    
        }
        if($request->status=="Batal"){
        $data1=Transaksi::join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        ->join('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->join('produk','produk.id','produk_ukuran.produk_id')
                       ->where('produk.id','=',$id)
                        ->where('produk.jenis','=','PreOrder')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->select('transaksi.id_transaksi')
                        ->get();
                        
        foreach ($data1 as $key ) {
            $data2=Transaksi::join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
                        
                        ->where('transaksi.id_transaksi','=',$key->id_transaksi)
                        ->select('detail_transaksi.id_transaksi',(DB::raw ('count(detail_transaksi.id_detail_transaksi)as b')))
                        ->get();
            foreach ($data2 as $key ) {
            
            if($key->b==1){
              $data=Transaksi::where('id_transaksi','=',$key->id_transaksi)
                            ->where('status_bayar','=','Lunas')
                        ->first();
                $data->status_pemesanan_produk="Batal";
                $data->save();
                        
            }
        }
        
                        
        }
        // dd($data2);
        
        $status= new RiwayatPo;
        $status->id_produk=$id;
        $status->id_status_po=6;
        $status->updated_at=Carbon::now(8);
        $status->save();    
        }
        return redirect('beranda');
        
    }

}