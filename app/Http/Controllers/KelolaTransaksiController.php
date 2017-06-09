<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\HeaderController;
use App\Transaksi;
use App\Kategori;
use App\Keranjang;
use App\Metode;
use App\Ukuran;
use App\ProdukUkuran;
use App\Penerima;
use App\DetailTransaksi;
use Image;
use App\User;
use DB;
use Carbon\Carbon;
// cause Illuminate\Support\Fades\Input;
// use App\Models\ProdukUkuran;
use App\Notifications\ResellerTolak;

class KelolaTransaksiController extends Controller {
    // private HeaderController;
public function __construct(){
        $this->middleware('levelAdmin');
        // $this->HeaderController->index();
        // $result= HeaderController::index();
    }

   public function index ()
    {
        
      $data = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('transaksi.status_pemesanan_produk','=','Pending')
                        ->where('transaksi.status_jenis_pesan','=','Terima')
                        ->groupby('transaksi.id_transaksi')
                        ->get();
    // dd( );
      $tunggu = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('transaksi.status_pemesanan_produk','=','Pending')
                        ->groupby('transaksi.id_transaksi')
                        ->get();
                        // dd($data);

        
            // dd()
/*$trans2= Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
            ->join('produk_ukuran','detail_transaksi.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
            ->join('produk','produk.id','produk_ukuran.produk_id')
            ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*')
            ->where('transaksi.status_bayar','=','Belum lunas')
            ->where('produk.jenis','=','Ready Stock')
            ->where('transaksi.updated_at','<',$waktu)
            
            ->get();*/
       /* foreach ($trans as $detail) {
                $produk = ProdukUkuran::find($detail->id_produk_ukuran);
                $produk->stock = $produk->stock + $detail->jumlah_beli;
                dd($produk->stock = $produk->stock + $detail->jumlah_beli);
                $produk->save();
                $trans->update(['status_pesan'=>'Batal']);
            }*/
      $produksi = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('transaksi.status_pemesanan_produk','=','Produksi')
                        ->groupby('transaksi.id_transaksi')
                        ->get();
      $packing = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('transaksi.status_pemesanan_produk','=','Packing')
                        ->groupby('transaksi.id_transaksi')
                        ->get();
      $pengiriman = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Lunas')
                        ->where('transaksi.status_pemesanan_produk','=','Pengiriman')
                        ->groupby('transaksi.id_transaksi')
                        ->get();
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
      $batal = Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','users.*','produk_ukuran.*','ukuran.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('transaksi.status_pemesanan_produk','=','Batal')
                        ->groupby('transaksi.id_transaksi')
                        ->get();
                       
        return view('admin.transaksi.kelola_transaksi')->with(compact('data',$data,'produksi',$produksi,'packing',$packing,'pengiriman',$pengiriman,'selesai',$selesai,'tunggu',$tunggu,'batal',$batal));
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
     $data2 =Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                        ->leftjoin('users','users.id','transaksi.id_user')
                        ->leftjoin('produk_ukuran','produk_ukuran.id_produk_ukuran','detail_transaksi.id_produk_ukuran')
                        ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                        ->leftjoin('ukuran','produk_ukuran.ukuran_id','ukuran.id')
                        ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*')
                        
                        // ->distinct()
                        ->where('transaksi.id_transaksi','=',$id)
                        ->get();
     // dd($data2); 
        return view('admin.transaksi.detail_trans_reseller')->with(compact('data',$data,'data2',$data));
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

    public function postUpdate(Request $request)
    {
      if($request->status_pesan == "Terima"){
        $data = Transaksi::where('id_transaksi',$request->idtrans)->first();
        $data->total_bayar=($request->total1 - $request->diskon);
      $data->updated_at= Carbon::now(7);
        $data->save();
      }if($request->status_pesan == "Tolak"){
        $data = Transaksi::where('id_transaksi',$request->idtrans)->first();
        $data->status_pemesanan_produk = "Batal";
        foreach ($request->iduser as $key=>$val ) {
          $keranjang = new Keranjang();
          $keranjang->user_id = $val;
          $keranjang->id_produk_ukuran = $request->idproUku[$key];
          $keranjang->jumlah = $request->jum_beli[$key];
          $keranjang->berat_total = $request->berat2[$key];
          $keranjang->Total_harga= $request->total[$key];
          $keranjang->created_at= Carbon::now(7);
          $keranjang->updated_at= Carbon::now(7);
          $keranjang->save();
            }
        }
       $data = Transaksi::where('id_transaksi',$request->idtrans)->first();
        $data->status_jenis_pesan = $request->status_pesan;
       $data->save();
        
        return redirect('transaksi');
      }
        
        // kembali ke halaman kategori
        //route
    // }
     public function ubahstatus(Request $request)
    {
        // dd($request->keterangan);
        // proses update data
      if($request->status_pesan == "Selesai"){
        $data = Transaksi::where('id_transaksi',$request->iddetail)->first();
       
        $data->status_pemesanan_produk = "Selesai";
        $data->resi= $request->resi;
        $data->save();

        
      }else{
        $data = Transaksi::where('id_transaksi',$request->idtrans)->first();
       
        $data->status_pemesanan_produk = $request->status_pesan;
        // $transaksi->resi= $request->resi;
        $data->save();
        
      }
        
        // kembali ke halaman kategori
        return redirect('transaksi');//route
    }

}