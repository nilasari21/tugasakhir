<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller {

   public function index()
    {
        $data = UserModel::all();
        return view('admin.user.user')->with('data',$data);
       //
    }
    /*public function tambah()
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
      $data->status = $request->status;
    	$data->save();
    	return redirect('metode');

       //
    }*/

}