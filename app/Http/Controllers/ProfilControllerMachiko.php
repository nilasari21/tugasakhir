<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Penerima;
use App\Users;
use Illuminate\Http\Request;
use Image;
// cause Illuminate\Support\Fades\Input;
class ProfilControllerMachiko extends Controller {

    public function index() {
        // $data=[];
        
        $data = Users::where('users.id','=',2)
                      ->get();
        $penerima = Penerima::where('id_user','=',2)
                      ->get();
       // dd($data);
        return view('machiko.profil')->with(compact('data',$data,'penerima',$penerima));
    }
   public function showEdit($id)
    {
        // cari data yang akan diedit
       $data = Users::where('id',$id)->first();
       $penerima = Penerima::where('id_user','=',$id)
                      ->first();
                      // dd($data);
        // tampilkan view beserta data yang akan diedit
        return view('machiko.editprofil')->with(compact('data',$data,'penerima',$penerima));
    }
}
