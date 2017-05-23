<?php

namespace App\Http\Controllers;
use App\MetodeProduk;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Penerima;
use App\Keranjang;
use App\Users;
use App\Metode;
use App\DetailTransaksi;
use DB;
use Carbon\Carbon;
use RajaOngkir;
use Auth;
// use App\Models\Penerima;


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
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
                    // ->where('produk.status','=','Ready Stock')
       // dd($keranjang);
         $beratharga = Keranjang::leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                        ->join('produk','produk.id','=','produk_ukuran.produk_id')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select((DB::raw ('SUM((keranjang.berat_total)) as berat')),(DB::raw ('SUM(keranjang.Total_harga) as total')))
                         ->where('user_id','=','2')
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
        // dd($beratharga);
         $data = Users::where('id','=',$id)
                      ->first();
                        
                        
                        // dd($data);
        $penerima = Penerima::where('penerima.id_user','=',$id)
                        ->get();
       // dd($penerima);
                        // return $jumlahkeranjang;
      /*  $metodebanyak=  Metode::select('*',(DB::raw ('count(metode.metode)')))
                              ->join ('metode_produk','metode_produk.metode_id','=','metode.id' )
                              ->join('produk_ukuran','produk_ukuran.produk_id','=','metode_produk.produk_id')
                              ->JOIN ('keranjang' ,'produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                              ->where('keranjang.user_id','=',$id)
                              ->where('metode.status','=','Aktif')
                              ->where('metode_produk.status','=','Aktif')
                              ->GROUPBY ('metode.metode','metode.id')
                              ->HAVING ((DB::raw ('count(metode.metode)')) ,'=',(DB::raw ('count(keranjang.id_produk_ukuran)')))
                              ->get();*/
            $metodebanyak=  MetodeProduk::select('*',(DB::raw ('count(metode_produk.metode_id)')))
                              ->join ('metode','metode_produk.metode_id','=','metode.id' )
                              ->join('produk_ukuran','produk_ukuran.produk_id','=','metode_produk.produk_id')
                              ->JOIN ('keranjang' ,'produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                              ->where('keranjang.user_id','=',$id)
                              ->where('metode.status','=','Aktif')
                              // ->ORwhere('metode_produk.status','=','Aktif')
                              ->GROUPBY ('metode.metode','metode.id')
                              ->HAVING ((DB::raw ('count(metode_produk.metode_id)')) ,'=',(DB::raw ('count(keranjang.id_produk_ukuran)')))
                              ->get();
                              // dd($metodebanyak);
          // $metodebanyak=Metode::all();
          // dd($metodebanyak);
// return $metodebanyak;
// dd($keranjang);
         
         $kota = RajaOngkir::Kota()->all();
        // return $hasil;
                        
        return view('machiko.checkout')->with(compact('keranjang','data',$data,$keranjang,'penerima',$penerima,'metodebanyak',$metodebanyak,'beratharga',$beratharga,'kota',$kota));
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
       $metodebanyak=  MetodeProduk::select('*',(DB::raw ('count(metode_produk.metode_id)')))
                              ->join ('metode','metode_produk.metode_id','=','metode.id' )
                              ->join('produk_ukuran','produk_ukuran.produk_id','=','metode_produk.produk_id')
                              ->JOIN ('keranjang' ,'produk_ukuran.id_produk_ukuran','=','keranjang.id_produk_ukuran')
                              ->where('keranjang.user_id','=',$id)
                              ->where('metode.status','=','Aktif')
                              // ->ORwhere('metode_produk.status','=','Aktif')
                              ->GROUPBY ('metode.metode','metode.id')
                              ->HAVING ((DB::raw ('count(metode_produk.metode_id)')) ,'=',(DB::raw ('count(keranjang.id_produk_ukuran)')))
                              ->get();
                              
         $user=Users::where('id','=',$id)
                    ->first();
         $kota = RajaOngkir::Kota()->all();
         $prov = RajaOngkir::Provinsi()->all();
        // return $hasil;
                        
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
                          ->leftjoin('produk','produk.id','detail_transaksi.id_produk')
                          // ->leftjoin('metode','metode.id','transaksi.id_metode')
                           ->leftJoin('produk_ukuran','produk_ukuran.id_produk_ukuran','=','detail_transaksi.id_produk_ukuran')
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
      if($request->jenis_pesan=="Dropshipper"){
      $toko= Users::where('id','=',Auth::user()->id)
                  ->first();
      $toko->toko=$request->nama_toko;
      $toko->save();  
      }
      
      $transaksi = new Transaksi; 
     
      
      $transaksi->id_user=Auth::user()->id;
      $transaksi->tgl_transaksi= Carbon::now(7);
      $transaksi->id_metode= $request->metode;
      $transaksi->total_berat= $request->berat;
      $transaksi->id_penerima=$request->idpenerima;
      $transaksi->status_bayar="Belum lunas";
      $transaksi->jenis_pemesanan=$request->level;
      $transaksi->status_jenis_pesan=$request->status;
      $transaksi->total_berat=$request->berat;
      $transaksi->ongkir=$request->ongkir;
      $transaksi->kurir=$request->kurir;
      $transaksi->total_bayar=$request->total;
      
      $transaksi->save();

      $keranjang = Keranjang::where('user_id','=',Auth::user()->id)
                         ->get();
    // dd($transaksi);
        foreach ($keranjang as $key ) {
          $detailtransaksi = new DetailTransaksi();
          $detailtransaksi->id_transaksi = $transaksi->id_transaksi;
          // $detailtransaksi->id_produk = $key->produk_id;
          $detailtransaksi->id_produk_ukuran = $key->id_produk_ukuran;
          $detailtransaksi->status_pesan= "Pending";
          $detailtransaksi->jumlah_beli= $key->jumlah;
          $detailtransaksi->save();
          $data = Keranjang::where('user_id','=',Auth::user()->id);
          $data->delete();
      }
      
     
      
      

      
      return redirect('keranjang');
                
                
       //
    }
     public function tambah2(Request $request)
    {
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
    $penerima->alamat_lengkap=$request->nama_alamat;
    $penerima->nama_penerima=$request->nama_penerima;
    $penerima->no_hp_penerima=$request->no_hp_penerima;

    $penerima->save();

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
      $transaksi->ongkir=$request->ongkir;
      $transaksi->kurir=$request->kurir;
      $transaksi->total_bayar=$request->total;
      
      $transaksi->save();

      $keranjang = Keranjang::where('user_id','=',Auth::user()->id)
                         ->get();
    // dd($transaksi);
        foreach ($keranjang as $key ) {
          $detailtransaksi = new DetailTransaksi();
          $detailtransaksi->id_transaksi = $transaksi->id_transaksi;
          // $detailtransaksi->id_produk = $key->produk_id;
          $detailtransaksi->id_produk_ukuran = $key->id_produk_ukuran;
          $detailtransaksi->status_pesan= "Pending";
          $detailtransaksi->jumlah_beli= $key->jumlah;
          $detailtransaksi->save();
          $data = Keranjang::where('user_id','=',Auth::user()->id);
          $data->delete();
      }
      
     
      
      

      
      return redirect('keranjang');
                
                
       //
    }
}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
