<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Wishlist;
use App\ProdukUkuran;
use Illuminate\Http\Request;
use Auth;

class WishlistControllerMachiko extends Controller {

    public function index() {
        // $data=[];
        
        $data = Wishlist::join('produk','produk.id','=','wishlist.id_produk')
                        ->rightjoin('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                         ->where('id_user','=',Auth::user()->id)
                         ->select('wishlist.*','produk.*','produk_ukuran.*')
                         ->groupby('wishlist.id_wishlist')
                         ->get();
       // dd($data);
        return view('machiko.wishlist')->with('data',$data);
    }
    public function tambah(Request $request)
    {
        
        // $data = new Wishlist; // new Model
        
        // $data->id_produk = $request->produk_id;
        // $data->id_user = 2;
        
        $id = $request->get('produk_id');

        $data = new Wishlist(array(
            'id_produk' => $id,
            'id_user' => Auth::user()->id
            ));
        // $data->id_produk = $request->produk_id;
        // $data->id_user = 2;        
        
        $data->save();

        
        return redirect('wishlist')->with('id', $id );
                

       //
    }
    public function getDelete($id)
    {
        $data = Wishlist::where('id_wishlist','=',$id);
        $data->delete();
        return redirect('wishlist');
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
