<?php

namespace App\Http\Controllers;

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
        $keranjang = Keranjang::join('produk','produk.id','=','keranjang.produk_id')
                         // ->join('users','users.id','=','keranjang.user_id')
                         ->leftJoin('produk_ukuran','produk_ukuran.id_detail','=','keranjang.id_produk_ukuran')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('keranjang.*','produk.*','produk_ukuran.*','ukuran.*')
                         ->where('user_id','=','2')
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
                    // ->where('produk.status','=','Ready Stock')
       
         $beratharga = Keranjang::join('produk','produk.id','=','keranjang.produk_id')
                         // ->join('users','users.id','=','keranjang.user_id')
                         ->leftJoin('produk_ukuran','produk_ukuran.id_detail','=','keranjang.id_produk_ukuran')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select((DB::raw ('SUM((keranjang.berat_total)) as berat')),(DB::raw ('SUM(keranjang.Total_harga) as total')))
                         ->where('user_id','=','2')
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
        
        $data = Transaksi::join('users','users.id','=','transaksi.id_user')
                        ->join('penerima','transaksi.id_penerima','=','penerima.id_penerima')
                        ->where('transaksi.id_user','=',$id)
                        ->first();
        $penerima = Penerima::where('penerima.id_user','=',$id)
                        ->get();
       
                        // return $jumlahkeranjang;
        $metodebanyak=  Metode::select('*',(DB::raw ('count(metode.metode) as c')))
                              ->join ('metode_produk','metode_produk.metode_id','=','metode.id' )
                              ->JOIN ('keranjang' ,'metode_produk.produk_id','=','keranjang.produk_id')
                              ->where('keranjang.user_id','=',$id)
                              ->GROUPBY ('metode.metode','metode.id')
                              ->HAVING ('c' ,'=',Keranjang::count('produk_id'))
                              ->get();
// return $metodebanyak;
// dd($keranjang);
         
         $kota = RajaOngkir::Kota()->all();
        // return $hasil;
                        
        return view('machiko.checkout')->with(compact('keranjang',$keranjang,'data',$data,'penerima',$penerima,'metodebanyak',$metodebanyak,'beratharga',$beratharga,'kota',$kota));
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
      $toko= Users::where('id','=',2)
                  ->first();
      $toko->toko=$request->nama_toko;
      $toko->save();  
      }
      
      $transaksi = new Transaksi; 
     
      
      $transaksi->id_user=2;
      $transaksi->tgl_transaksi= Carbon::now(7);
      $transaksi->id_metode= $request->metode;
      $transaksi->total_berat= $request->berat;
      $transaksi->id_penerima=$request->idpenerima;
      $transaksi->status_bayar="Belum lunas";
      $transaksi->jenis_pemesanan=$request->jenis_pesan;
      $transaksi->status_jenis_pesan=$request->status;
      $transaksi->total_berat=$request->berat;
      $transaksi->ongkir=$request->ongkir;
      $transaksi->total_bayar=$request->total;
      
      $transaksi->save();

      $keranjang = Keranjang::where('user_id','=',2)
                         ->get();
    // dd($transaksi);
        foreach ($keranjang as $key ) {
          $detailtransaksi = new DetailTransaksi();
          $detailtransaksi->id_transaksi = $transaksi->id_transaksi;
          $detailtransaksi->id_produk = $key->produk_id;
          $detailtransaksi->id_detail = $key->id_produk_ukuran;
          $detailtransaksi->status_pesan= "Pending";
          $detailtransaksi->jumlah_beli= $key->jumlah;
          $detailtransaksi->save();
          $data = Keranjang::where('user_id','=',2);
          $data->delete();
      }
      
     
      
      

      
      return redirect()
                ->back()
                ->with('succes', 'Gambar Berhasil di Upload');
                
       //
    }
}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
