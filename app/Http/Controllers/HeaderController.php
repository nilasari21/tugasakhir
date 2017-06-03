<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;
use App\Http\Requests;
use Auth;
class HeaderController extends Controller
{
	
    	public function index(){
	
	
	/*$transBuk = Transaction::where('notifBukti','0')->where('bukti','!=','Belum Kirim bukti')
	->join('products','transactions.product_id','=','products.id')
	->get();*/

	$countTrans = Keranjang::where('user_id',Auth::user()->id)->get();
	
	
// dd($countTrans);

    return view('machiko.header')->with(compact('countTrans',$countTrans));					
    }
}
