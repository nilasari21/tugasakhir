<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Http\Request;

class UserController extends Controller {

   public function index()
    {
        $data = Users::all();
        // dd($data);
        return view('admin.user.user')->with('data',$data);
       //
    }
    public function postUpdate($id, Request $request)
    {
        // proses update data
        $data = Users::where('id','=',$id)->first();
        $data->status_user=$request->status;
        $data->save();
        
        return redirect('customer');
    }

}