<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Penerima;
use App\Users;
use Illuminate\Http\Request;
use Image;
use Auth;
use RajaOngkir;
use App\User;
use App\Notifications\PermintaanUpgrade;
// cause Illuminate\Support\Fades\Input;
class ProfilControllerMachiko extends Controller {

    public function index() {
        // $data=[];
        
        $data = Users::where('users.id','=',Auth::user()->id)
                      ->first();
        $penerima = Penerima::where('id_user','=',Auth::user()->id)
                      ->get();
         $kota = RajaOngkir::Kota()->all();
        $prov = RajaOngkir::Provinsi()->all();
       // dd($data);
        return view('machiko.profil')->with(compact('data',$data,'penerima',$penerima,'kota',$kota,'prov',$prov));
    }
   public function store(Request $request)
    {
        $data = Users::where('users.id','=',Auth::user()->id)
                      ->first();
        $data->name=$request->nama;
        $data->no_hp=$request->nohp;
        $data->tgl_lahir=$request->tgl_lahir;
        $data->email=$request->email;
        $data->jenis_kelamin=$request->jenis_kelamin;
        $data->save();
       
        return redirect('profil');
    }
  public function upgrade(Request $request)
    {
        $data = Users::where('users.id','=',Auth::user()->id)
                      ->first();
        $data->level=$request->level;
        $data->konfirm_admin="Pending";
        $data->toko=$request->nama_toko;
       if($data->save()){
       
        $admin=User::where('level', '=', 'Admin')->get();
         foreach ($admin as $admin) {
        // $transaksi;
        \Notification::send($admin, new PermintaanUpgrade($data));
       }  
      }
        return redirect('profil');
    }
    public function alamat(Request $request) {
        $penerima= new Penerima;

       $penerima->id_user=Auth::user()->id;
       $penerima->nama_alamat=$request->nama_alamat;
       $penerima->nama_penerima=$request->nama_penerima;
       $penerima->no_hp_penerima=$request->no_hp;
       $penerima->kabupaten=$request->kota;
       $penerima->provinsi=$request->provinsi;
       $penerima->alamat_lengkap=$request->alamat_lengkap;
       $penerima->save();
        return redirect('profil');

    }
    public function editAlamat(Request $request) {
      
        $penerima= Penerima::where('id_penerima','=',$request->idpenerima)
                      ->first();
       $penerima->id_user=Auth::user()->id;
       $penerima->nama_alamat=$request->nama_alamat;
       $penerima->nama_penerima=$request->nama_penerima;
       $penerima->no_hp_penerima=$request->no_hp;
       $penerima->kabupaten=$request->kota;
       $penerima->provinsi=$request->provinsi;
       $penerima->alamat_lengkap=$request->alamat_lengkap;
       $penerima->save();
        return redirect('profil');

    }
}
