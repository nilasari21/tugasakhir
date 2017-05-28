<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\UpgradeUser;
use App\Notifications\UpgradeDitolak;
class UserController extends Controller {
public function __construct(){
        $this->middleware('levelAdmin');
    }

   public function index()
    {
        $data = Users::all();
        // dd($data);
        return view('admin.user.user')->with('data',$data);
       //
    }
    public function upgrade_user()
    {
        $data = Users::where('level','!=','Admin')
                    ->where('konfirm_admin','Pending')
                    ->get();
        // dd($data);
        return view('admin.user.upgrade_user')->with('data',$data);
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
    public function upgrade(Request $request)
    {
        // proses update data
        $data = Users::where('id','=',$request->iduser)->first();
        if($request->konfirm_admin=="Terima"){
        $data->konfirm_admin="Terima";
        // $data->save(); 
        if($data->save()){
       
        $admin=User::where('id','=',$request->iduser)->first();
         // foreach ($admin as $admin) {
        
        \Notification::send($admin, new UpgradeUser($data));
       // }  
      }    
        }if($request->konfirm_admin=="Tolak"){
        $data->konfirm_admin="Terima";
        $data->level="Customer";
        // $data->save(); 
          if($data->save()){
       
        $admin=User::where('id','=',$request->iduser)->first();
         // foreach ($admin as $admin) {
        
        \Notification::send($admin, new UpgradeDitolak($data));
       // }  
      }   
        }
        
        
        return redirect('customer');
    }

}