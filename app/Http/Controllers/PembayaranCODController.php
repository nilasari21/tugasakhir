<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

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
public function __construct(){
        $this->middleware('levelAdmin');
    }

   public function index()
    {
        
      $data = Transaksi::leftjoin('users','users.id','transaksi.id_user')
                        ->join('metode','transaksi.id_metode','metode.id')
                        ->select('transaksi.*','users.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('transaksi.status_pemesanan_produk','!=','Batal')
                        ->where('metode.jenis','=','COD')
                        // ->where('transaksi.kurir','=','COD')
                        ->get();
      // dd($data);
        return view('admin.transaksi.pembayaran_cod')->with('data',$data);
       //
    }
    public function postUpdate($id, Request $request)
    {
        // proses update data
        $data = Transaksi::where('id_transaksi','=',$id)->first();
        // dd($data);
        $data->status_bayar=$request->lunas;
        $data->save();
        
        return redirect('pembayaran_cod');
    }
    public function postUpdate2($id, Request $request)
    {
        // proses update data
        $data = Transaksi::where('id_transaksi','=',$id)->first();
        // dd($data);
        $data->status_pemesanan_produk=$request->status;
        $data->save();
        $detail=DB::table('detail_transaksi')
         ->where('id_transaksi','=',$data->id_transaksi)->get();
         foreach ($detail as $key ) {
            $produk=DB::table('produk_ukuran')
            ->join('produk','produk.id','produk_ukuran.produk_id')
            ->where('id_produk_ukuran','=',$key->id_produk_ukuran)
            ->update(['produk_ukuran.stock'=>$key->jumlah_beli+'produk_ukuran.stock']);
         }
        return redirect('pembayaran_cod');
    }
}
     
    

