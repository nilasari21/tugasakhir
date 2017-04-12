<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produk;
use Illuminate\Http\Request;

class ReadystockController extends Controller {

   public function index()
    {
        $data = Produk::all();
        return view('admin.produk.readystock')->with('data',$data);
       //
    }
    /*public function tambah(Request $request)
    {
        
        $data = new Produk; // new Model
    	$data->nama_kategori = $request->kategori;
    	$data->save();
    	return redirect('kategori');

       //
    }*/

}