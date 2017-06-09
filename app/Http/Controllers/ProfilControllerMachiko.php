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
       $data->email=$request->email;
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
        $data->save();
       
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
    public function ubahgambar(Request $request){
     $profil = Users::where('id','=',Auth::user()->id)->first();
     $thumb = ('.img/produk/client');

      if($request->hasFile('image')){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = $request->file('image');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $foto=$request->image->move(public_path('.img/produk/client'), $imageName);
       // Image::make($request->hasFile('image')))->save();
        Image::make($images)->resize('500', '500')->save($thumb . '/' . $imageName);

        // $foto->resize(100, 100);
        // $foto->save();
        // return $imageName;
        }else{
      $notification = array(
                    'message' => 'Ukuran file terlalu besar. max: 2mb', 
                    'alert-type' => 'danger'
                );
        
        // $request->session()->flash('alert-success', 'User was successful added!');
        return redirect()
                ->back()
                ->with($notification);
                
    }
    $profil->foto=$imageName;
    // dd($imageName);
    $profil->save();
      return redirect()
                ->back()
                ->with('succes', 'Gambar Berhasil di Upload');
   }
}
