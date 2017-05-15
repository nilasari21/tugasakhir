<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Testimoni;
use Illuminate\Http\Request;

class TestimoniControllerMachiko extends Controller {

   public function index()
    {
        $data = Testimoni::join('users','testimoni.users_id','users.id')
                          ->select('testimoni.*','users.name')
                          ->get();
                          dd($data);
        return view('machiko.testimoni')->with('data',$data);
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