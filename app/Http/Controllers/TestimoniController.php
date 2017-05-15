<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller {

   public function index()
    {
        $data = Testimoni::join('users','testimoni.users_id','users.id')
                          ->select('testimoni.*','users.name')
                          // ->orderby('testimoni.id_testi',desc())
                          ->get();
                          // dd($data);
        return view('admin.testimoni.testimoni')->with('data',$data);
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