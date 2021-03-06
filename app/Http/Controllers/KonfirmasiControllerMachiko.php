<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Konfirmasi;
use App\Produk;
use App\ProdukUkuran;
use Illuminate\Http\Request;
use Image;
use Auth;
use App\User;
use App\Notifications\KonfirmasiPembayaran;
class KonfirmasiControllerMachiko extends Controller {

    public function index() {
        // $data=[];
        
        // $data = Transaksi::leftjoin('konfirmasi','transaksi.id_konfirmasi','=','konfirmasi.id_konfirmasi')
        //                  // ->join('users','users.id','=','transaksi.id_user')
        //                  // ->join('metode','metode.id','=','transaksi.id_metode')
        //                  ->select('transaksi.*','konfirmasi.*')
        //                  ->where('transaksi.id_user','=',Auth::user()->id)
        //                  ->where('konfirmasi.status','!=','Terima')
        //                  // ->groupby('transaksi.id_transaksi')
        //             // ->where('produk.status','=','Ready Stock')
        //                  ->get();
      $data=Transaksi::leftjoin('konfirmasi','transaksi.id_konfirmasi','=','konfirmasi.id_konfirmasi')
                      // ->join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                      // ->join('users','users.id','transaksi.id_user')
                      ->leftjoin('metode','metode.id','=','transaksi.id_metode')
                      ->where('transaksi.id_user','=',Auth::user()->id)
                      ->select('transaksi.*','metode.jenis','konfirmasi.*')
                      ->groupby('transaksi.id_transaksi')
                      ->orderby('transaksi.id_transaksi','desc')
                      // ->where('transaksi.status_bayar','Belum lunas')
                      // ->where('transaksi.status_pemesanan_produk','!=','Batal')
                      // ->where('transaksi.status_jenis_pesan','!=','Tolak')
                      ->get();
                         // dd($data);
        // $data->ukuran= new ProdukUkuran;
        /*$ukuran= ProdukUkuran::join('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                            ->where('produk_ukuran.produk_id','=','keranjang.produk_id'
                              ,'and','keranjang.id_produk_ukuran','=','produk_ukuran.id_detail')

                            ->get();*/
        return view('machiko.konfirmasi')->with('data',$data);
    }
   public function simpan(Request $request)
    {
      $konfirmasi = new Konfirmasi; 
     
      
      $thumb = ('.img/produk/client');

      if($request->hasFile('image')){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = $request->file('image');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
       
        Image::make($images)->resize('500', '500')->save($thumb . '/' . $imageName);

        }
      $konfirmasi->total_transfer= $request->total_transfer;
      $konfirmasi->foto=$imageName;
      $konfirmasi->status="Pending";
      $konfirmasi->nama_rekening=$request->nama_rekening;
      $konfirmasi->nomor_rekening=$request->nomor_rekening;
      $konfirmasi->tgl_transfer=$request->tanggal_transfer;
      $konfirmasi->save();
      // dd($konfirmasi);
      $transaksi = Transaksi::where('id_transaksi','=',$request->idtrans)->first();
//dd($data);
          $transaksi->id_konfirmasi=$konfirmasi->id_konfirmasi;
          // dd($konfirmasi->id);
          $transaksi->save();
          /* if($transaksi->save()){
       
        $admin=User::where('level', '=', 'Admin')->get();
         foreach ($admin as $admin) {
       
        \Notification::send($admin, new KonfirmasiPembayaran($transaksi));
       }  
      }*/
     return redirect('konfirmasi');

       //

        
    }
    public function ubahbukti(Request $request)
    {
      $idkon=Transaksi::select('id_konfirmasi') 
                      ->where('id_transaksi','=',$request->idtrans2)
                      ->first();
                      // dd($idkon);
     $konfirmasi=Konfirmasi::where('id_konfirmasi','=',$idkon->id_konfirmasi)
                            ->first();
      
      $thumb = ('.img/produk/client');

      if($request->hasFile('image')){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = $request->file('image');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
       
        Image::make($images)->resize('500', '500')->save($thumb . '/' . $imageName);

        }
      $konfirmasi->total_transfer= $request->total_transfer;
      $konfirmasi->foto=$imageName;
      $konfirmasi->status="Pending";
      $konfirmasi->nama_rekening=$request->nama_rekening;
      $konfirmasi->nomor_rekening=$request->nomor_rekening;
      $konfirmasi->tgl_transfer=$request->tanggal_transfer;
      $konfirmasi->save();
      // dd($konfirmasi);
      $transaksi = Transaksi::where('id_transaksi','=',$request->idtrans2)->first();
//dd($data);
          $transaksi->id_konfirmasi=$konfirmasi->id_konfirmasi;
          // dd($konfirmasi->id);
          // ();
           if($transaksi->save()){
       
        $admin=User::where('level', '=', 'Admin')->get();
         foreach ($admin as $admin) {
        // $transaksi;
        \Notification::send($admin, new KonfirmasiPembayaran($transaksi));
       }  
      }
     return redirect('konfirmasi');

       //

        
    }
    public function detail($id) {
        
     $data = Transaksi::select('transaksi.id_transaksi')
                          ->where('id_user','=',Auth::user()->id)
                          ->orderby('id_transaksi','desc')
                          ->first();
                          
        $trans = Transaksi::leftjoin('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                          
                           ->leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','detail_transaksi.id_produk_ukuran')
                           ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('transaksi.*','detail_transaksi.*','produk.*','produk_ukuran.*','ukuran.*','detail_transaksi.status as statusd')
                         ->where('transaksi.id_transaksi','=',$id)
                         ->where('detail_transaksi.id_transaksi','=',$id)
                         ->get();
        $transak=Transaksi::leftjoin('penerima','penerima.id_penerima','transaksi.id_penerima')
                          ->leftjoin('metode','metode.id','transaksi.id_metode')
                          ->where('transaksi.id_transaksi','=',$id)
                          ->select('transaksi.*','penerima.*','metode.*')
                          ->get();
       // dd($transak);
        
        return view('machiko.detail_pesan')->with(compact('data',$data,'trans',$trans,'transak',$transak));
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
