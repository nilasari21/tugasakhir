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
                        ->where('detail_transaksi.status_pesan','=','Pending')
                        ->get();
    // dd( );
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
                     $waktu = Carbon::now(8)->subHour(5); 

        $trans= Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
            ->join('produk_ukuran','detail_transaksi.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
            ->join('produk','produk.id','produk_ukuran.produk_id')
            ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*')
            ->where('transaksi.status_bayar','=','Belum lunas')
            ->where('produk.jenis','=','Ready Stock')
            ->where('transaksi.updated_at','<',$waktu)
            
            ->get();
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
        // dd($request->idtrans);
        // proses update data
      if($request->status_pesan == "Terima"){
        // dd($request->total1);
        $data = Transaksi::where('id_transaksi',$request->idtrans)->first();
        $data->total_bayar=($request->total1 - $request->diskon);
        $data->status_jenis_pesan = $request->status_pesan;
        // $transaksi->created_at= Carbon::now(7);
      $data->updated_at= Carbon::now(7);
        $data->save();
      }if($request->status_pesan == "Tolak"){
        

        $det=DetailTransaksi::where('id_transaksi',$request->idtrans)
                            
                            ->update([
                                'status_pesan'=>"Batal"
                            ]);
                            
       
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
         /* if( $keranjang->save()){
       
        $user=User::all();
       foreach ($user as $user) {
           
       
       \Notification::send($user, new ResellerTolak($keranjang));
       
      }
  }*/
      }
        }
       $data = Transaksi::where('id_transaksi',$request->idtrans)->first();
       // dd($data->name);
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