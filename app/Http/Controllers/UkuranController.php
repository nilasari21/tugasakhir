<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ukuran;
use Illuminate\Http\Request;

class UkuranController extends Controller {

   public function index()
    {
        $data = Ukuran::all();
        return view('admin.ukuran.ukuran')->with('data',$data);
       //
    }
    public function tambah(Request $request)
    {
        
        $data = new Ukuran; // new Model
    	$data->nama_ukuran = $request->nama_ukuran;
    	$data->save();
    	return redirect('ukuran');

       //
    }
    public function showEdit($id_ukuran)
    {
        // cari data yang akan diedit
       $data = Ukuran::where('id_ukuran',$id_ukuran)->first();
        // tampilkan view beserta data yang akan diedit
        return view('admin.ukuran.edit')->with('data',$data);
    }

    
        // proses update data
       public function postUpdate($id_ukuran, Request $request)
    {  
      $data = Ukuran::where('id_ukuran',$id_ukuran)->first();
        $data->nama_ukuran = $request->nama_ukuran;
        $data->status = $request->status;
        $data->save();
        // kembali ke halaman ukuran
        return redirect('ukuran');//route
    }

}