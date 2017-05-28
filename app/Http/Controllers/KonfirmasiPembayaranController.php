<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Konfirmasi;
use App\Users;
use App\User;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Notifications\KonfirmasiPembayaranDitolak;
use App\Notifications\KonfirmasiPembayaranDiterima;
class KonfirmasiPembayaranController extends Controller {
public function __construct(){
    $this->middleware('levelAdmin');
  }

   public function index()
    {
        $data = Transaksi::join('konfirmasi','konfirmasi.id_konfirmasi','transaksi.id_konfirmasi')
                        ->join('users','transaksi.id_user','users.id')
                        ->select('transaksi.id_transaksi','transaksi.total_bayar','users.name','konfirmasi.*','transaksi.id_user')
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
          // dd($request->iduser);
          $konfirmasi->status=$request->status_pesan;
          
          // $konfirmasi->alasan_tolak=$request->alasan;
          $konfirmasi->save();

          $transaksi= Transaksi::where('id_konfirmasi','=',$konfirmasi->id_konfirmasi)->first();
          $transaksi->status_bayar="Lunas";
          if($transaksi->save()){
       
        $admin=User::where('id','=',$request->iduser)->first();
         // foreach ($admin as $admin) {
        
        \Notification::send($admin, new KonfirmasiPembayaranDiterima($transaksi));
       // }  
      } 
        }else{
        $konfirmasi->status=$request->status_pesan;
          
          $konfirmasi->alasan_tolak=$request->alasan;
          if($konfirmasi->save()){
       
        $admin=User::where('id','=',$request->iduser)->first();
         // foreach ($admin as $admin) {
        
        \Notification::send($admin, new KonfirmasiPembayaranDitolak($konfirmasi));
       // }  
      }            
        }
          
     return redirect('konfirmasibayar');

       //

        
    }
}