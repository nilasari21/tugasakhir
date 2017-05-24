<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Testimoni;
use Illuminate\Http\Request;
use Image;
use Auth;
// cause Illuminate\Support\Fades\Input;
class TestimoniControllerMachiko extends Controller {

    public function index() {
        // $data=[];
        
        $data = Testimoni::join('users','users.id','=','testimoni.users_id')
                         // ->where('users_id','=',Auth::user()->id)
                         ->select('testimoni.*','users.*')
                         ->get();
       
        return view('machiko.testimoni')->with('data',$data);
    }
    public function showtambah()
    {
        return view('machiko.tambah_testi');
        
    }
public function simpan(Request $request)
    {
      $testi = new Testimoni; 
     
      
      $thumb = ('.img/produk/client');

      if($request->hasFile('image')){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = $request->file('image');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
       
        Image::make($images)->resize('150', '150')->save($thumb . '/' . $imageName);

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
      $testi->users_id= Auth::user()->id;
      $testi->foto_testi=$imageName;
      $testi->Keterangan=$request->keterangan;
      $testi->save();
     return redirect('testimoni');

       //
    }
}
