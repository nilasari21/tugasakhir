<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Hash,Mail;
use Validator, Redirect, Session;
use Illuminate\Http\Request;
use Auth;
class FrontController extends Controller {
	
    public function depan() {
       /*if(Auth::user()->confirmed!=1){
       $notification = array(
                    'message' => 'Email belum diverifikasi', 
                    'alert-type' => 'danger'
                );
        
        
        return redirect()
                ->back()
                ->with($notification);
        }*/
        if(Auth::user()->level=="Admin"){
        	return redirect('/admin');
        }else{
        	return redirect('/machikokstore');
        }
    }

}