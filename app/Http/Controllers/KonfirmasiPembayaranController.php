<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Konfirmasi;
use App\Users;
use App\Transaksi;
use Illuminate\Http\Request;

class KonfirmasiPembayaranController extends Controller {

   public function index()
    {
        $data = Transaksi::join('konfirmasi','konfirmasi.id_konfirmasi','transaksi.id_konfirmasi')
                        ->join('users','transaksi.id_user','users.id')
                        ->select('transaksi.id_transaksi','transaksi.total_bayar','users.name','konfirmasi.*')
                        ->where('konfirmasi.status','=','Pending')

                        ->get();
        return view('admin.transaksi.konfirmasi_pembayaran')->with('data',$data);
       //
    }
    
 public function simpan(Request $request)
    {
     
      $konfirmasi = Konfirmasi::where('id_konfirmasi','=',$request->idkonfirm)->first();
//dd($data);
      // dd($konfirmasi);
        if($request->status_pesan=="Terima"){
          $konfirmasi->status=$request->status_pesan;
          
          // $konfirmasi->alasan_tolak=$request->alasan;
          $konfirmasi->save();

          $transaksi= Transaksi::where('id_konfirmasi','=',$konfirmasi->id_konfirmasi)->first();
          $transaksi->status_bayar="Lunas";
          $transaksi->save();
        }else{
        $konfirmasi->status=$request->status_pesan;
          
          $konfirmasi->alasan_tolak=$request->alasan;
          $konfirmasi->save();          
        }
          
     return redirect('konfirmasibayar');

       //

        
    }
}