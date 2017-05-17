<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produk;
use App\Kategori;
use App\ProdukUkuran;

use Illuminate\Http\Request;

class ProdukControllerMachiko extends Controller {

    public function index() {
      
        $data = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->select('produk.*','kategori_produk.*')
                // ->where('produk.status','=','Ready Stock')
                ->orderby('produk.id','desc')
                 ->GROUPBY('produk.nama_produk','produk.id')
                
                ->paginate(9);
        $kategori = Kategori::where('kategori_produk.status','=','Aktif')
                ->get();
        
        return view('machiko.produk2')->with(compact('data',$data,'kategori',$kategori));
    }
    public function index2() {
      
        $data = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->select('produk.*','kategori_produk.*')
                // ->where('produk.status','=','Ready Stock')
                // ->GROUPBY('produk.id')
                
                ->get();
        $kategori = Kategori::where('kategori_produk.status','=','Aktif')
                ->get();
        
        return view('machiko.produk2')->with(compact('data',$data,'kategori',$kategori));
    }
    public function filter(){
         $data = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->select('produk.*','kategori_produk.*')
                // ->where('produk.status','=','Ready Stock')
                ->get();
        $kategori = Kategori::where('kategori_produk.status','=','Aktif')
                ->get();
        return view('machiko.produk')->with(compact('data',$data,'kategori',$kategori));
    }
   
    public function detail($id) {
      
        $data = Produk::where('id',$id)->first();
        $kat=Produk::where('id','=',$id)
                    ->select('id_kategori')
                    ->get();
                    // dd($kat);
        $ukuran= ProdukUkuran::where('produk_ukuran.produk_id','=',$id)
                            ->join('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                            ->get();
        /*$terkait = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->select('produk.*','kategori_produk.*')
                ->where('produk.id_kategori','=',2)
                /*->orderby('produk.id','desc')
                ->GROUPBY('produk.id')
                ->limit(5)*/
                // ->get();*/
                // dd($terkait);
        return view('machiko.detailProduk')->with(compact('data',$data,'ukuran',$ukuran));
    }
    public function search(Request $request){
        
        
        $query = $request->get('cari');
         $data = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->select('produk.*','kategori_produk.*')
                ->where('produk.nama_produk', 'like' ,'%' . $query . '%')
                // ->GROUPBY('produk.id')
                
                ->paginate(9);
            
        $kategori = Kategori::where('kategori_produk.status','=','Aktif')
                ->get();
        
        return view('machiko.produk2')->with(compact('data',$data,'kategori',$kategori));
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/