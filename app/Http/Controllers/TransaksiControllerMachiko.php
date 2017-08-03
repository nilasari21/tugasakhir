<?php

namespace App\Http\Controllers;
use App\MetodeProduk;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Penerima;
use App\Keranjang;
use App\Users;
use App\User;
use App\Metode;
use App\DetailTransaksi;
use DB;
use Carbon\Carbon;
use RajaOngkir;
use Auth;
// use Notification;
use App\Notifications\PostNewNotification;



use Illuminate\Http\Request;

class TransaksiControllerMachiko extends Controller {

    public function index() {
      
        $data = Produk::join('detail_transaki','transaksi.id_transaksi','=','detail_transaki.id_transaksi')
                     ->join('konfirmasi','konfirmasi.id_konfirmasi','=','transaksi.id_konfirmasi')
                     ->join('penerima','transaksi.id_penerima','=','penerima.id_penerima')
                     ->join('metode_produk','metode_produk.id_metode','=','transaksi.id_metode')
                     ->select('transaksi.*','detail_transaki.*','konfirmasi.*','penerima.*')
                // ->where('produk.status','=','Ready Stock')
                     ->get();

        return view('machiko.produk')->with('data',$data);
    }

      public function checkout($id) {
        $keranjang = Keranjang::leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                         ->join('produk','produk.id','=','produk_ukuran.produk_id')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('keranjang.*','produk.*','produk_ukuran.*','ukuran.*')
                         ->where('user_id','=',$id)
                         ->get();
                         // dd($keranjang);
         $beratharga = Keranjang::leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                        ->join('produk','produk.id','=','produk_ukuran.produk_id')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select((DB::raw ('SUM((keranjang.berat_total)) as berat')),
                          (DB::raw ('SUM(keranjang.Total_harga) as total')))
                         ->where('user_id','=',Auth::user()->id)
                         ->get();
        $data = Users::where('id','=',$id)
                      ->first();
        $data2=Penerima::where('penerima.id_user','=',$id)
                          ->first();
        $penerima = Penerima::where('penerima.id_user','=',$id)
                        ->get();
        $ker= Keranjang::where('user_id','=',$id)
                        ->select(DB::raw ('count(keranjang.id_keranjang) as c'))
                        ->first();
                        // dd($ker);

       $metodebanyak=  MetodeProduk::join ('metode','metode_produk.metode_id','=','metode.id' )
                              // ->join('produk','metode_produk.produk_id','produk.id')
                              ->join('produk_ukuran','produk_ukuran.produk_id','=','metode_produk.produk_id')
                              ->JOIN ('keranjang' ,'produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                              
                              // ->where('produk_ukuran.produk_id','=','produk.id')
                              ->where('keranjang.user_id','=',$id)
                              ->where('metode.status','=','Aktif')
                              ->select('metode.id','metode.metode',(DB::raw ('count(keranjang.id_keranjang)')))
                              ->GROUPBY ('metode.id','metode.metode')
                              ->HAVING ((DB::raw ('count(metode_produk.metode_id)')) ,'=',
                                $ker->c
                                )
                              ->get();
                              // dd($metodebanyak);
        $kota = RajaOngkir::Kota()->all();
        // dd($kota);
         return view('machiko.checkout')->with(compact('data2',$data2,'keranjang','data',$data,$keranjang,
          'penerima',$penerima,'metodebanyak',$metodebanyak,'beratharga',$beratharga,'kota',$kota));
    }
     public function checkout2($id) {
        $keranjang = Keranjang::leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                         ->join('produk','produk.id','=','produk_ukuran.produk_id')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('keranjang.*','produk.*','produk_ukuran.*','ukuran.*')
                         ->where('user_id','=',$id)
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
                    // ->where('produk.status','=','Ready Stock')
       // dd($keranjang);
         $beratharga = Keranjang::leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                        ->join('produk','produk.id','=','produk_ukuran.produk_id')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select((DB::raw ('SUM((keranjang.berat_total)) as berat')),(DB::raw ('SUM(keranjang.Total_harga) as total')))
                         ->where('user_id','=',$id)
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
        // dd($beratharga);
        $data = Users::where('id','=',$id)
                      ->first();
                        
                        // dd($data);
       /* $penerima = Penerima::where('penerima.id_user','=',$id)
                        ->get();*/
       // dd($penerima);

                        // return $jumlahkeranjang;
        $ker= Keranjang::where('user_id','=',$id)
                        ->select(DB::raw ('count(keranjang.id_keranjang) as c'))
                        ->first();
                        // dd($ker);

       $metodebanyak=  MetodeProduk::join ('metode','metode_produk.metode_id','=','metode.id' )
                              // ->join('produk','metode_produk.produk_id','produk.id')
                              ->join('produk_ukuran','produk_ukuran.produk_id','=','metode_produk.produk_id')
                              ->JOIN ('keranjang' ,'produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                              
                              // ->where('produk_ukuran.produk_id','=','produk.id')
                              ->where('keranjang.user_id','=',$id)
                              ->where('metode.status','=','Aktif')
                              ->select('metode.id','metode.metode',(DB::raw ('count(keranjang.id_keranjang)')))
                              ->GROUPBY ('metode.id','metode.metode')
                              ->HAVING ((DB::raw ('count(metode_produk.metode_id)')) ,'=',
                                $ker->c
                                )
                              ->get();
                              // dd($metodebanyak);
         $user=Users::where('id','=',$id)
                    ->first();
                    // dd($user);
         $kota = RajaOngkir::Kota()->all();
         $prov = RajaOngkir::Provinsi()->all();
        // return $hasil;
                        // dd($kota);
        return view('machiko.tambahalamat')->with(compact('keranjang',$keranjang,'data',$data,'metodebanyak',$metodebanyak,'beratharga',$beratharga,'kota',$kota,'prov',$prov,
                                              'user',$user));
    }
    public function rekap() {
        $data = Transaksi::select('transaksi.id_transaksi')
                          ->where('id_user','=',Auth::user()->id)
                          ->orderby('id_transaksi','desc')
                          ->first();
                          // dd($data);
                          $id=$data->id_transaksi;
        $trans = Transaksi::leftjoin('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                          // ->leftjoin('penerima','penerima.id_penerima','transaksi.id_penerima')
                          
                          // ->leftjoin('metode','metode.id','transaksi.id_metode')
                           ->leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','detail_transaksi.id_produk_ukuran')
                           ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('transaksi.*','detail_transaksi.*','produk.*','produk_ukuran.*','ukuran.*')
                         ->where('transaksi.id_transaksi','=',$id)
                         ->where('detail_transaksi.id_transaksi','=',$id)
                         ->get();
        $transak=Transaksi::leftjoin('penerima','penerima.id_penerima','transaksi.id_penerima')
                          ->leftjoin('metode','metode.id','transaksi.id_metode')
                          ->where('transaksi.id_transaksi','=',$id)
                          ->select('transaksi.*','penerima.*','metode.*')
                          ->get();
       // dd($transak);
        
        return view('machiko.rekap_pemesanan')->with(compact('data',$data,'trans',$trans,'transak',$transak));
    }
    public function cetak() {
        $data = Transaksi::select('transaksi.id_transaksi')
                          ->where('id_user','=',Auth::user()->id)
                          ->orderby('id_transaksi','desc')
                          ->first();
                          // dd($data);
                          $id=$data->id_transaksi;
        $trans = Transaksi::leftjoin('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
                          // ->leftjoin('penerima','penerima.id_penerima','transaksi.id_penerima')
                          
                          // ->leftjoin('metode','metode.id','transaksi.id_metode')
                           ->leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','detail_transaksi.id_produk_ukuran')
                           ->leftjoin('produk','produk.id','produk_ukuran.produk_id')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('transaksi.*','detail_transaksi.*','produk.*','produk_ukuran.*','ukuran.*')
                         ->where('transaksi.id_transaksi','=',$id)
                         ->where('detail_transaksi.id_transaksi','=',$id)
                         ->get();
        $transak=Transaksi::leftjoin('penerima','penerima.id_penerima','transaksi.id_penerima')
                          ->leftjoin('metode','metode.id','transaksi.id_metode')
                          ->where('transaksi.id_transaksi','=',$id)
                          ->select('transaksi.*','penerima.*','metode.*')
                          ->get();
       // dd($trans);
        
        return view('machiko.cetak_invoice')->with(compact('data',$data,'trans',$trans,'transak',$transak));
    }
 public function hasil($kota_tujuan,$berat) {
        $data = RajaOngkir::Kota()->all();

       
        $hasil = RajaOngkir::Cost([
            'origin'        => 501, // id kota asal
            'destination'   => $kota_tujuan, // id kota tujuan
            'weight'        => $berat, // berat satuan gram
            'courier'       => 'jne', // kode kurir pengantar ( jne / tiki / pos )
        ])->get();
         
        // return $hasil;
        return $hasil;

    }
    public function kotacari($kota_asal) {
        

       
       $data = RajaOngkir::Kota()->byProvinsi($provinsi_id)->get();
         
        // return $hasil;
        return $data;

    }
     
    public function getId($kota_asal) {
        

       
       $data = RajaOngkir::Kota()->search('city_name', $name = $kota_asal)->get();
         
        // return $hasil;
        return $data;

    }
    public function alamat($alamat) {
        

       
       $alamat = Penerima::where('kabupaten','=',$alamat)
                        /*->select('nama_penerima','no_hp_penerima','provinsi','kabupaten','kecamatan','alamat_lengkap')*/
                        ->get();
        $data = RajaOngkir::Kota()->search('city_name', $name = $alamat)->get();
         
        // return $hasil;
        return $alamat;

    }
     public function metode($metode) {
        

       
       $metode=  Metode::where('id','=',$metode)
                            ->get();
                            // dd($metode);
                            return $metode;


    }
    public function tambah(Request $request)

    {
      // dd($request->status);
      if($request->metode=="Pilih"){
       $notification = array(
                    'message' => 'Anda belum memilih metode', 
                    'alert-type' => 'warning'
                );
        return redirect()
                ->back()
                ->with($notification);  
      }if($request->ongkir==null){
       $notification = array(
                    'message' => 'Anda belum memilih kurir', 
                    'alert-type' => 'warning'
                );
        return redirect()
                ->back()
                ->with($notification);  
      }if(!($request->kota_asal==135 || $request->kota_asal==419 ||
        $request->kota_asal==210 || $request->kota_asal==39 || $request->kota_asal==501) && $request->kurir=="COD"){
       $notification = array(
                    'message' => 'COD hanya berlaku untuk wilayah yogyakarta dan sekitarnya', 
                    'alert-type' => 'warning'
                );
        return redirect()
                ->back()
                ->with($notification);  
      }else{
      if($request->jenis_pesan=="Dropshipper"){
      $toko= Users::where('id','=',Auth::user()->id)
                  ->first();
      $toko->toko=$request->nama_toko;
      $toko->save();  
      }
      if(Auth::user()->konfirm_admin == "Pending"){
        $transaksi = new Transaksi; 
     
      
      $transaksi->id_user=Auth::user()->id;
      $transaksi->tgl_transaksi= Carbon::now(7);
      $transaksi->id_metode= $request->metode;
      $transaksi->total_berat= $request->berat;
      $transaksi->id_penerima=$request->idpenerima;
      $transaksi->status_bayar="Belum lunas";
      $transaksi->jenis_pemesanan="Customer";
      // if()
      $transaksi->status_jenis_pesan=$request->status;
      $transaksi->total_berat=$request->berat;
      $transaksi->status_pemesanan_produk="Pending";
      $transaksi->ongkir=$request->ongkir;
      $transaksi->kurir=$request->kurir;
      $transaksi->total_bayar=$request->total;
      /*$transaksi->created_at= Carbon::now(7);
      $transaksi->updated_at= Carbon::now(7);*/
      // $transaksi->save();
      if($transaksi->save()){
       
        $admin=User::where('level', '=', 'Admin')->get();
         foreach ($admin as $admin) {
        
        \Notification::send($admin, new PostNewNotification($transaksi));
       }  
      }
      }else{
        $transaksi = new Transaksi; 
     
      
      $transaksi->id_user=Auth::user()->id;
      $transaksi->tgl_transaksi= Carbon::now(7);
      $transaksi->id_metode= $request->metode;
      $transaksi->total_berat= $request->berat;
      $transaksi->id_penerima=$request->idpenerima;
      $transaksi->status_bayar="Belum lunas";
      $transaksi->jenis_pemesanan=$request->level;
      if($request->level=="Reseller"){
      $transaksi->status_jenis_pesan="Tunggu";  
      }else{
      $transaksi->status_jenis_pesan=$request->status;  
      }
      
      $transaksi->total_berat=$request->berat;
      $transaksi->ongkir=$request->ongkir;
      $transaksi->kurir=$request->kurir;
      $transaksi->status_pemesanan_produk="Pending";
      $transaksi->total_bayar=$request->total;
      // $transaksi->created_at= Carbon::now(7);
      // $transaksi->updated_at= Carbon::now(7);
      $transaksi->save();
      
      }
      

      $keranjang = Keranjang::where('user_id','=',Auth::user()->id)
                  ->join('produk_ukuran','produk_ukuran.id_produk_ukuran','keranjang.id_produk_ukuran')
                  ->join('produk','produk.id','produk_ukuran.produk_id')
                         ->get();
                         // dd($keranjang);
    // dd($transaksi);

        foreach ($keranjang as $key ) {
          // dd($key->jenis);
          $detailtransaksi = new DetailTransaksi();
          $detailtransaksi->id_transaksi = $transaksi->id_transaksi;
          // $detailtransaksi->id_produk = $key->produk_id;
          $detailtransaksi->id_produk_ukuran = $key->id_produk_ukuran;
          // $detailtransaksi->status_pesan= "Pending";
          $detailtransaksi->jumlah_beli= $key->jumlah;
          if($key->jenis=='Ready Stock'){
            $detailtransaksi->status="Siap";
          }if($key->jenis=='PreOrder'){
            $detailtransaksi->status="Menunggu";
          }
          $detailtransaksi->created_at=Carbon::now(8);
          $detailtransaksi->updated_at=Carbon::now(8);
          $detailtransaksi->save();
          $data = Keranjang::where('user_id','=',Auth::user()->id);
          // ;
          $data->delete();
          /*if($data->delete()){
       
        $admin=User::where('level', '=', 'Admin')->get();
         foreach ($admin as $admin) {
        
        \Notification::send($admin, new PostNewNotification($data));
       }  
      }*/
      }
      
     
      
      

      
      return redirect('rekap_pemesanan');
                
                
       //
    }
  }
     public function tambah2(Request $request)
    // { dd($request->ongkoskirim);
     {
      if($request->metode=="Pilih"){
       $notification = array(
                    'message' => 'Anda belum memilih metode', 
                    'alert-type' => 'warning'
                );
        return redirect()
                ->back()
                ->with($notification);  
      }if($request->ongkoskirim==null){
       $notification = array(
                    'message' => 'Anda belum memilih kurir', 
                    'alert-type' => 'warning'
                );
        return redirect()
                ->back()
                ->with($notification);  
      }if(!($request->kota_asal==135 || $request->kota_asal==419 ||
        $request->kota_asal==210 || $request->kota_asal==39 || $request->kota_asal==501) && $request->kurir=="COD"){
       $notification = array(
                    'message' => 'COD hanya berlaku untuk wilayah yogyakarta dan sekitarnya', 
                    'alert-type' => 'warning'
                );
        return redirect()
                ->back()
                ->with($notification);  
      }else{
      if($request->jenis_pesan=="Dropshipper"){

      $toko= Users::where('id','=',Auth::user()->id)
                  ->first();
      $toko->toko=$request->nama_toko;
      $toko->save();  
      }
      $penerima = new Penerima;
      
    $penerima->id_user=Auth::user()->id;
    $penerima->provinsi=$request->provinsi;
    $penerima->kabupaten=$request->kabupaten;
    $penerima->nama_alamat=$request->nama_alamat;
    $penerima->alamat_lengkap=$request->alamat_lengkap;
    $penerima->nama_penerima=$request->nama_penerima;
    $penerima->no_hp_penerima=$request->no_hp_penerima;

    $penerima->save();
    if(Auth::user()->konfirm_admin == "Pending"){
     $transaksi = new Transaksi; 
     
      
      $transaksi->id_user=Auth::user()->id;
      $transaksi->tgl_transaksi= Carbon::now(7);
      $transaksi->id_metode= $request->metode;
      $transaksi->total_berat= $request->berat;
      $transaksi->id_penerima=$penerima->id_penerima;
      $transaksi->status_bayar="Belum lunas";
      $transaksi->jenis_pemesanan="Customer";
      $transaksi->status_jenis_pesan=$request->status;
      $transaksi->total_berat=$request->berat;
      $transaksi->ongkir=$request->ongkoskirim;
      $transaksi->kurir=$request->kurir;
      $transaksi->total_bayar=$request->total;
      $transaksi->created_at= Carbon::now(7);
      $transaksi->updated_at= Carbon::now(7);
      $transaksi->status_pemesanan_produk="Pending";
      $transaksi->save();
      /*if($transaksi->save()){
       
        $admin=User::where('level', '=', 'Admin')->get();
         foreach ($admin as $admin) {
        
        \Notification::send($admin, new PostNewNotification($transaksi));
       }  
      }*/
    }else{
      $transaksi = new Transaksi; 
     
      
      $transaksi->id_user=Auth::user()->id;
      $transaksi->tgl_transaksi= Carbon::now(7);
      $transaksi->id_metode= $request->metode;
      $transaksi->total_berat= $request->berat;
      $transaksi->id_penerima=$penerima->id_penerima;
      $transaksi->status_bayar="Belum lunas";
      $transaksi->jenis_pemesanan=$request->level;
      $transaksi->status_jenis_pesan=$request->status;
      $transaksi->total_berat=$request->berat;
      $transaksi->ongkir=$request->ongkoskirim;
      $transaksi->kurir=$request->kurir;
      $transaksi->status_pemesanan_produk="Pending";
      $transaksi->total_bayar=$request->total;
      $transaksi->created_at= Carbon::now(7);
      $transaksi->updated_at= Carbon::now(7);
      $transaksi->save();
      /*if($transaksi->save()){
       
        $admin=User::where('level', '=', 'Admin')->get();
         foreach ($admin as $admin) {
        
        \Notification::send($admin, new PostNewNotification($transaksi));
       }  
      }*/
    }
      

      $keranjang = Keranjang::where('user_id','=',Auth::user()->id)
                         ->get();
    // dd($transaksi);
        foreach ($keranjang as $key ) {
          $detailtransaksi = new DetailTransaksi();
          $detailtransaksi->id_transaksi = $transaksi->id_transaksi;
          // $detailtransaksi->id_produk = $key->produk_id;
          $detailtransaksi->id_produk_ukuran = $key->id_produk_ukuran;
          // $detailtransaksi->status_pesan= "Pending";
          $detailtransaksi->jumlah_beli= $key->jumlah;
          if($key->jenis=='Ready Stock'){
            $detailtransaksi->status="Siap";
          }if($key->jenis=='PreOrder'){
            $detailtransaksi->status="Menunggu";
          }
          $detailtransaksi->save();
          $data = Keranjang::where('user_id','=',Auth::user()->id);
          $data->delete();
      }
      return redirect('rekap_pemesanan');
                
                
       //
    }
}    
}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
