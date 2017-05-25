<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Http\Requests;

class HeaderController extends Controller
{
	public function __construct(){
		$this->middleware('levelAdmin');
	}
    	public function index(){
	$transNotif = Transaksi::where('notifTrans','0')
	->join('users','transaksi.id_user','=','users.id')
	->get();
	
	/*$transBuk = Transaction::where('notifBukti','0')->where('bukti','!=','Belum Kirim bukti')
	->join('products','transactions.product_id','=','products.id')
	->get();*/

	$countTrans = Transaksi::where('notifTrans','0')->count('notifTrans');
	
	/*$countBukti = Transaction::where('notifBukti','0')->where('bukti','!=','Belum Kirim bukti')->count('notifBukti');
	
	$countUser = User::count('id');
	
	$countUserUniver = User::where('confirmed','0')->count('id');
	
	$countTotalTrans = Transaction::count('id');
	
	$countProduct = Product::count('id');*/


    return view('admin.beranda.beranda')->with(compact('transNotif',$transNotif,'countTrans',$countTrans));					
    }
}
