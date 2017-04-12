<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller {

   public function index()
    {
        $data = Kategori::all();
        return view('admin.kategori.kategori')->with('data',$data);
       //
    }
    public function tambah(Request $request)
    {
        
        $data = new Kategori; // new Model
    	$data->nama_kategori = $request->kategori;
    	$data->save();
    	return redirect('kategori');

       //
    }
    public function showEdit($id_kategori)
    {
        // cari data yang akan diedit
       $data = Kategori::where('id_kategori',$id_kategori)->first();
        // tampilkan view beserta data yang akan diedit
        return view('admin.kategori.edit')->with('data',$data);
    }

    public function postUpdate($id_kategori, Request $request)
    {
        // proses update data
        $data = Kategori::where('id_kategori',$id_kategori)->first();
        $data->nama_kategori = $request->nama_kategori;
        $data->status = $request->status;
        $data->save();
        // kembali ke halaman kategori
        return redirect('kategori');//route
    }

}