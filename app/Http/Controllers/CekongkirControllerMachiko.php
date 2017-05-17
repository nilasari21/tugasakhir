<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Httpful\Request;
use Illuminate\Http\Request;
// Include('Httpful.Phar');
use RajaOngkir;


class CekongkirControllerMachiko extends Controller {

    public function index() {
        $data = RajaOngkir::Kota()->all();

        return view('machiko.cekongkir')->with('data',$data);

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
        // $data=[];
        
        // $data = 
       

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
