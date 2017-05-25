<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
class FrontController extends Controller {
	
    public function depan() {
       
        if(Auth::user()->level=="Admin"){
        	return redirect('/admin');
        }else{
        	return redirect('/machikokstore');
        }
    }

}