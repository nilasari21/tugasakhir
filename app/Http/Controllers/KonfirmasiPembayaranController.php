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
                        ->where('konfirmasi.status','!=','Terima')
                        ->get();
        return view('admin.transaksi.konfirmasi_pembayaran')->with('data',$data);
       //
    }
    
 public function simpan(Request $request)
    {
     
      $konfirmasi = Konfirmasi::where('id_konfirmasi','=',$request->idkonfirm)->first();
//dd($data);
      // dd($konfirmasi);
          $konfirmasi->status=$request->status_pesan;
          // dd($konfirmasi->status=$konfirmasi->status_pesan);
          // $konfirmasi->total_transfer=78000;
          // dd($konfirmasi->id);
          // $konfirmasi->update();
          $konfirmasi->alasan_tolak=$request->alasan;
          $konfirmasi->save();
     return redirect('konfirmasibayar');

       //

        
    }
}