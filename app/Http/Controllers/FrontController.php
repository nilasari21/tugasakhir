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
     // return "test";
        if(Auth::user()->level=="Admin"){
        	return redirect('/admin');
        }else{
        	return redirect('/machikokstore');
        }
    }

}