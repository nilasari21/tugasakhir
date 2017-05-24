<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BerandaController extends Controller {
	public function __construct(){
		$this->middleware('levelAdmin');
	}


    public function index() {
       
        return view('admin.beranda.beranda');
    }

}