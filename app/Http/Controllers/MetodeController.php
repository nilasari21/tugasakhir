<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Metode;
use Illuminate\Http\Request;

class MetodeController extends Controller {

   public function index()
    {
        $data = Metode::all();
        return view('admin.metode.metode')->with('data',$data);
       //
    }
    public function tambah()
    {
        
        return view('admin.metode.tambah');
       //
    }
    public function simpan(Request $request)
    {
        
      $data = new Metode; // new Model
    	$data->metode = $request->metode;
      $data->nama_rekening = $request->nama_rekening;
      $data->nomor = $request->nomor;
      $data->rate = $request->rate;
      $data->jenis = $request->jenis;
      $data->status = "Aktif";
    	$data->save();
    	return redirect('metode');

       //
    }
     public function showEdit($id_metode_bayar)
    {
        // cari data yang akan diedit
       $data = Metode::where('id','=',$id_metode_bayar)->first();
        // tampilkan view beserta data yang akan diedit
        return view('admin.metode.edit')->with('data',$data);
    }

    public function postUpdate($id_metode_bayar, Request $request)
    {
        // proses update data
        $data = Metode::where('id',$id_metode_bayar)->first();
        $data->metode = $request->metode;
        $data->nama_rekening = $request->nama_rekening;
        $data->nomor = $request->nomor;
        $data->rate = $request->rate;
        $data->jenis = $request->jenis;
        $data->status = $request->status;
        $data->save();
        // kembali ke halaman kategori
        return redirect('metode');//route
    }

}