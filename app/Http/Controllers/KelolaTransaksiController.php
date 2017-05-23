<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Kategori;
use App\Metode;
use App\Ukuran;
use App\Penerima;
use App\DetailTransaksi;
use Image;
use DB;
// cause Illuminate\Support\Fades\Input;
use App\Models\ProdukUkuran;


class KelolaTransaksiController extends Controller {

   public function index()
    {
        
      $data = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('detail_transaksi.status_pesan','=','Pending')
                        ->get();
      $tunggu = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('detail_transaksi.status_pesan','=','Pending')
                        ->get();
                        // dd($data);
      $produksi = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('detail_transaksi.status_pesan','=','Produksi')
                        ->get();
      $packing = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('detail_transaksi.status_pesan','=','Packing')
                        ->get();
      $pengiriman = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('detail_transaksi.status_pesan','=','Pengiriman')
                        ->get();
      $selesai = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('detail_transaksi.status_pesan','=','Selesai')
                        ->get();
        return view('admin.transaksi.kelola_transaksi')->with(compact('data',$data,'produksi',$produksi,'packing',$packing,'pengiriman',$pengiriman,'selesai',$selesai,'tunggu',$tunggu));
       //
    }
     public function transReseller() {
      
       /*$data = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('detail_transaksi.status_pesan','=','Pending')
                        ->where('transaksi.jenis_pemesanan','=','Reseller')
                        ->where('transaksi.status_jenis_pesan','=','Tunggu')
                        ->get();*/
      $data=Transaksi::leftjoin('users','users.id','transaksi.id_user')
                        ->where('transaksi.jenis_pemesanan','=','Reseller')
                        ->where('transaksi.status_jenis_pesan','=','Tunggu')
                        ->select('transaksi.*','users.*')
                        ->get();

        return view('admin.transaksi.transaksi_reseller')->with('data',$data);
    }
    public function detail($id) {

      // $harga= Transaksi::
      
       $data = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*','ukuran.*',(DB::raw ('SUM((detail_transaksi.jumlah_beli)) as jumlah_beli')))
                        ->groupby('produk_ukuran.produk_id')
                        // ->distinct()
                        ->where('transaksi.id_transaksi','=',$id)
                        ->get();
     // dd($data); 

        return view('admin.transaksi.detail_trans_reseller')->with('data',$data);
    }
    public function detailtrans($id) {

      // $harga= Transaksi::
      
       $data = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*','ukuran.*',(DB::raw ('SUM((detail_transaksi.jumlah_beli)) as jumlah_beli')))
                        ->groupby('produk_ukuran.produk_id')
                        // ->distinct()
                        ->where('transaksi.id_transaksi','=',$id)
                        ->get();
                        // dd($data);
    $detail = Transaksi::join('users','users.id','transaksi.id_user')
                        ->select('transaksi.*','users.*')
                        ->where('transaksi.id_transaksi','=',$id)
                        ->first();
     // dd($detail);
    $penerima = Transaksi::join('penerima','transaksi.id_penerima','penerima.id_penerima')
                        // ->where('penerima.id_user','=',$id)
                        ->where('transaksi.id_transaksi','=',$id)
                        ->first();
// dd($penerima);
        return view('admin.transaksi.detail_transaksi')->with(compact('data',$data,'penerima',$penerima,'detail',$detail));
    }

    public function postUpdate($id_transaksi, Request $request)
    {
        // proses update data
      if($request->status_pesan == "Terima"){
        $data = Transaksi::where('id_transaksi',$id_transaksi)->first();
        $data->total_bayar=$request->total - $request->diskon;
        $data->status_jenis_pesan = $request->status_pesan;
        $data->save();
      }if($request->status_pesan == "Tolak"){
        $data = Transaksi::where('id_transaksi',$id_transaksi)->first();
        $data->status_jenis_pesan = $request->status_pesan;
        $data->save();

        
      }
        
        // kembali ke halaman kategori
        return redirect('transaksi');//route
    }
     public function ubahstatus(Request $request)
    {
        // dd($request->keterangan);
        // proses update data
      if($request->status_pesan == "Selesai"){
        $data = DetailTransaksi::where('id_detail_transaksi',$request->iddetail)->first();
        // $data->s=$request->total - $request->diskon;
        $data->status_pesan = $request->status_pesan;
        $data->keterangan_status = $request->keterangan;
        $data->save();

        $transaksi=Transaksi:: where('id_transaksi',$data->id_transaksi)->first();
        $transaksi->resi= $request->resi;
        $transaksi->save();
      }else{
        $data = DetailTransaksi::where('id_detail_transaksi',$request->iddetail)->first();
        // $data->s=$request->total - $request->diskon;
        $data->status_pesan = $request->status_pesan;
        $data->keterangan_status = $request->keterangan;
        $data->save();
        
      }
        
        // kembali ke halaman kategori
        return redirect('transaksi');//route
    }

}