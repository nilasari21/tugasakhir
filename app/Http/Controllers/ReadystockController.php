<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;
use App\Kategori;
use App\Metode;
use App\Ukuran;
use Image;
// cause Illuminate\Support\Fades\Input;
use App\ProdukUkuran;


class ReadystockController extends Controller {

   public function index()
    {
        $data = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                ->join('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                ->select('produk.*','kategori_produk.*','produk_ukuran.*','ukuran.nama_ukuran')
                ->where('produk.jenis','=','Ready Stock')
                ->get();

        return view('admin.produk.readystock')->with('data',$data);
       //
    }
    public function tambah()
    {
        $kategori = Kategori::all()-> where('status','=','Aktif');
        $ukuran = Ukuran::all()-> where('status','=','Aktif')->where('nama_ukuran','!=','Tidak ada ukuran');
        $metode = Metode::all();
        
        return view('admin.produk.tambahrs')->with(compact('kategori',$kategori,'ukuran',$ukuran,'metode',$metode));
       //
    }

    public function simpannonukuran(Request $request)
    {
      $produk = new Produk; 
      
      
     // $metodeproduk = new MetodeProduk;
      // $link = ('.img/produk/');
      
      $thumb = ('.img/produk/client');

      if($request->hasFile('image')){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = $request->file('image');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $foto=$request->image->move(public_path('.img/produk/client'), $imageName);
       // Image::make($request->hasFile('image')))->save();
  Image::make($images)->resize('200', '200')->save($thumb . '/' . $imageName);

        // $foto->resize(100, 100);
        // $foto->save();
        // return $imageName;
        }

         // if ($request->hasFile('image')) {
         //        $images = $request->file('image');
         //        foreach ($images as $image) {
         //            $name = str_random(5) . '.' . $image->getClientOriginalExtension();
         //            $img = new Gambar();
         //            $img->img_name = $name;
         //            $img->id_product = $pro_id;
         //            $img->path_thumb = 'images/products/thumb/' . $name;
         //            $img->path_full = 'images/products/full/' . $name;
         //            $img->save();
         //            Image::make($image)->save($full . '/' . $name);
         //            Image::make($image)->resize('100', '100')->save($thumb . '/' . $name);
         //        }
                 
         //    }
            
      $produk->nama_produk= $request->nama_produk;
      // $produk->harga= $request->harga;
      // $produk->stock_total= $request->stock_total;
      $produk->berat= $request->berat;
      $produk->minimal_beli= $request->minimal_beli;
      $produk->batas_jam= $request->batas_jam;
      $produk->jenis="Ready Stock";
      $produk->foto=$imageName;
      $produk->id_kategori=$request->id_kategori;
      $produk->keterangan=$request->editor1;
      $produk->save();
      $produk->metode()->attach($request->metode_id);

      $ProdukUkuran = new ProdukUkuran();
          $ProdukUkuran->produk_id = $produk->id;
          $ProdukUkuran->ukuran_id = 6;
          $ProdukUkuran->harga_pokok = $request->harga_pokok1;
          $ProdukUkuran->stock = $request->stock1;
          $ProdukUkuran->harga_tambah= 0;
          $ProdukUkuran->save();

      return redirect()
                ->back()
                ->with('status', 'Gambar Berhasil di Upload');

       //
    }
    public function simpanukuran(Request $request)
    {
      $produk = new Produk; 
     // $metodeproduk = new MetodeProduk;
      /*if($request->hasFile('foto')){
        $foto = time().$produk->getClientOriginalName();
        $foto->move('.img/produk/client', $foto);

        $data = array_merge(['upload' => ".img/produk/client/{$foto}"], $request->all());

        Project::create($data);
      }*/
      $thumb = ('.img/produk/client');

      if($request->hasFile('image')){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = $request->file('image');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $foto=$request->image->move(public_path('.img/produk/client'), $imageName);
       // Image::make($request->hasFile('image')))->save();
        Image::make($images)->resize('200', '200')->save($thumb . '/' . $imageName);

        // $foto->resize(100, 100);
        // $foto->save();
        // return $imageName;
        }
      $produk->nama_produk= $request->nama_produk;
      // $produk->harga= $request->harga;
      // $produk->stock_total= $request->stock_total;
      $produk->berat= $request->berat;
      $produk->minimal_beli= $request->minimal_beli;
      $produk->batas_jam= $request->batas_jam;
      $produk->jenis="Ready Stock";
      $produk->foto=$imageName;
      $produk->keterangan=$request->editor1;
      $produk->id_kategori=$request->id_kategori;
      
      $produk->save();
      
      //$prod = [$produk->id];
      /*$a=['ukuran_id'=>$request->id];
      $b=['stock'=>$request->stock_];
      $c=['harga_tambah'=>$request->harga_tambah];*/
      // return $request->all();
      // if(count($request->id)==1){
      //   foreach ($request->id as $key => $value) {
          
        
      //     $ProdukUkuran = new ProdukUkuran();
      //     $ProdukUkuran->produk_id = $produk->id;
      //     $ProdukUkuran->ukuran_id = $request->id;
      //     $ProdukUkuran->stock = $request->stock_;
      //     $ProdukUkuran->harga_tambah= $request->harga_tambah;
      //     $ProdukUkuran->save();
      //   } 
      // }else{
        foreach ($request->id as $key=>$val ) {
          $ProdukUkuran = new ProdukUkuran();
          $ProdukUkuran->produk_id = $produk->id;
          $ProdukUkuran->ukuran_id = $val;
          $ProdukUkuran->harga_pokok = $request->harga_pokok;
          $ProdukUkuran->stock = $request->stock_[$key];
          $ProdukUkuran->harga_tambah= $request->harga_tambah[$key];
          $ProdukUkuran->save();
      }
      
      // $pivotData = array($produkId => array('stock' => $stock, 'harga_tambah' => $harga_tambah));

      // $produk->ukuran()->sync($pivotData);
     
      // $produk->ukuran()->attach($request->id);
      // }
      
      

      $produk->metode()->attach($request->metode_id);
      return redirect()
                ->back()
                ->with('succes', 'Gambar Berhasil di Upload');
                
       //
    }
}