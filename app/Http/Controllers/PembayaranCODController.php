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

   public function index()
    {
        
      $data = Transaksi::leftjoin('users','users.id','transaksi.id_user')
                        ->join('metode','transaksi.id_metode','metode.id')
                        ->select('transaksi.*','users.*')
                        ->where('transaksi.status_bayar','=','Belum lunas')
                        ->where('metode.jenis','=','COD')
                        ->get();
      // dd($data);
        return view('admin.transaksi.pembayaran_cod')->with('data',$data);
       //
    }
    public function postUpdate($id, Request $request)
    {
        // proses update data
        $data = Transaksi::where('id_transaksi','=',$id)->first();
        $data->status_bayar=$request->lunas;
        $data->save();
        
        return redirect('pembayaran_cod');
    }
}
     
    

