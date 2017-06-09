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
      /* $rules = [
          'email' => 'required|exists:users',
          'password' => 'required'
      ];
 
      $input = Input::only('email', 'password');
 
      $validator = Validator::make($input, $rules);
 
      if($validator->fails())
      {
          return Redirect::to('login')->withInput()->withErrors($validator);
      }
 
      $credentials = [
          'email' => Input::get('email'),
          'password' => Input::get('password'),
          'confirmed' => 1
      ];
 
      if ( ! Auth::attempt($credentials))
      {
        Session::flash('alert-class', 'alert-danger');
        Session::flash('message', 'Email belum di konfirmasi, Silahkan cek email anda!');
        return Redirect::to('login');
      }*/
        if(Auth::user()->level=="Admin"){
        	return redirect('/admin');
        }else{
        	return redirect('/machikokstore');
        }
    }

}