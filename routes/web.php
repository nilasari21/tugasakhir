<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin', function () {
    return view('admin.beranda.beranda');
});

Route::get('machiko', function () {
    return view('machiko.test');
});

Route::get('toko', 'TestControllerMachiko@index');

Route::get('beranda', 'BerandaController@index');

Route::get('testmachiko', 'ProdukController@index');

Route::get('kategori', 'KategoriController@index');
Route::post('kategori/simpan', 'KategoriController@tambah');
Route::get('kategori/edit/{id}', 'KategoriController@showEdit');
Route::post('kategori/update/{id}', 'KategoriController@postUpdate');

Route::get('ukuran', 'UkuranController@index');
Route::post('ukuran/simpan', 'UkuranController@tambah');
Route::get('ukuran/edit/{id_ukuran}', 'UkuranController@showEdit');
Route::post('ukuran/update/{id_ukuran}', 'UkuranController@postUpdate');

Route::get('metode', 'MetodeController@index');
Route::get('metode/tambah', 'MetodeController@tambah');
Route::post('metode/simpan', 'MetodeController@simpan');
Route::get('metode/edit/{id}', 'MetodeController@showEdit');
Route::post('metode/update/{id}', 'MetodeController@postUpdate');

Route::get('customer', 'UserController@index');

Route::get('testimoniadmin', 'TestimoniController@index');

Route::get('preorder', 'PreorderController@index');
Route::get('preorder/tambahpo', 'PreorderController@tambah');
Route::post('preorder/simpannonukuran', 'PreorderController@simpannonukuran');
Route::post('preorder/simpanukuran', 'PreorderController@simpanukuran');

Route::get('readystock', 'ReadystockController@index');
Route::get('readystock/tambahrs', 'ReadystockController@tambah');
Route::post('readystock/simpannonukuran', 'ReadystockController@simpannonukuran');
Route::post('readystock/simpanukuran', 'ReadystockController@simpanukuran');

Route::get('testimonimachiko', 'TestimoniControllerMachiko@index');

Route::get('transaksi', 'KelolaTransaksiController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');




// front end

Route::get('/daftar', function () {
    return view('vendor.machiko.register');
});
Route::get('/masuk', function () {
    return view('vendor.machiko.login');
});

Route::get('profil', 'ProfilControllerMachiko@index');
Route::get('profil/edit/{id}', 'ProfilControllerMachiko@showEdit');

Route::get('machikokstore', 'ProdukControllerMachiko@index');
Route::get('machikok', 'ProdukControllerMachiko@index');
Route::get('/machikokstore/detailProduk/{id}', 'ProdukControllerMachiko@detail');

Route::post('keranjang/tambah', 'KeranjangControllerMachiko@tambah');
Route::get('keranjang', 'KeranjangControllerMachiko@index');
Route::get('keranjang/delete/{id}', 'KeranjangControllerMachiko@getDelete');
Route::post('keranjang/edit', 'KeranjangControllerMachiko@postUpdate');

Route::get('wishlist', 'WishlistControllerMachiko@index');
Route::post('wishlist/tambah', 'WishlistControllerMachiko@tambah');
Route::get('wishlist/delete/{id}', 'WishlistControllerMachiko@getDelete');

Route::get('testimoni', 'TestimoniControllerMachiko@index');
Route::get('testimoni/tambah', 'TestimoniControllerMachiko@showtambah');
Route::post('testimoni/simpan', 'TestimoniControllerMachiko@simpan');

Route::get('checkout/{id}', 'TransaksiControllerMachiko@checkout');
Route::get('hasil/{kota_tujuan}/{radio}/{berat}', 'TransaksiControllerMachiko@hasil');
Route::get('checkout/getId/{kota_asal}', 'TransaksiControllerMachiko@getId');
Route::get('checkout/hasil/{kota_tujuan}/{radio}/{berat}', 'TransaksiControllerMachiko@hasil');
Route::get('checkout/getAlamat/{alamat}', 'TransaksiControllerMachiko@alamat');
Route::post('checkout/simpan', 'TransaksiControllerMachiko@tambah');
Route::get('checkout/metode/{metode}', 'TransaksiControllerMachiko@metode');

Route::get('cekongkir', 'CekongkirControllerMachiko@index');
Route::get('cekongkir/hasil/{kota_tujuan}/{radio}/{berat}', 'CekongkirControllerMachiko@hasil');

Route::get('hasil/{kota_tujuan}/{radio}/{berat}', 'TransaksiControllerMachiko@hasil');
Route::get('checkout/getId/{kota_asal}', 'TransaksiControllerMachiko@getId');
Route::get('checkout/hasil/{kota_tujuan}/{radio}/{berat}', 'TransaksiControllerMachiko@hasil');

Route::get('konfirmasi', 'KonfirmasiControllerMachiko@index');
Route::post('konfirmasi/simpan', 'KonfirmasiControllerMachiko@simpan');

Route::get('pencarian', 'ProdukControllerMachiko@search');
