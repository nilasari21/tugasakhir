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

Route::get('/', 'ProdukControllerMachiko@index');
Route::get('/home', 'ProdukControllerMachiko@index');

/*Route::get('admin', function () {
    return view('admin.beranda.beranda');
});*/
Route::get('/forbidden', function () {
    return view('admin.salahHakAkses');
});
Route::get('cetak', function () {
    return view('machiko.cetak_invoice');
});
Route::get('about', function () {
    return view('machiko.tentang_kami');
});
Route::get('faq', function () {
    return view('machiko.faq');
});

/*Route::get('machiko', function () {
    return view('machiko.test');
});*/
Route::get('/front',['middleware'=>'auth','uses'=>'FrontController@depan']);

Route::get('toko', 'TestControllerMachiko@index');

Route::get('admin', 'BerandaController@index');
Route::get('beranda', 'BerandaController@index');

// Route::get('testmachiko', 'ProdukController@index');

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
Route::get('upgrade_user', 'UserController@upgrade_user');
Route::post('customer/status/{id}', 'UserController@postUpdate');
Route::post('customer/upgrade/', 'UserController@upgrade');

Route::get('testimoniadmin', 'TestimoniController@index');
Route::get('testimoniadmin/delete/{id}', 'TestimoniController@getDelete');

Route::get('preorder', 'PreorderController@index');
Route::post('preorder/simpan', 'PreorderController@simpanukurandetail');
Route::get('preorder/detail/{id}', 'PreorderController@detail');
Route::get('preorder/tambahpo', 'PreorderController@tambah');
Route::post('preorder/ubahgambar', 'PreorderController@ubahgambar');
Route::post('preorder/simpannonukuran', 'PreorderController@simpannonukuran');
Route::post('preorder/simpanukuran', 'PreorderController@simpanukuran');
Route::post('preorder/status/{id}', 'PreorderController@postUpdate');
Route::get('preorder/edit/{id}', 'PreorderController@showEdit');
Route::post('preorder/edit/simpan/{id}', 'PreorderController@edit');

Route::get('readystock/detail/{id}', 'ReadystockController@detail');
Route::post('readystock/ubahgambar', 'ReadystockController@ubahgambar');
Route::get('readystock/edit/{id}', 'ReadystockController@showEdit');
Route::post('readystock/edit/simpan/{id}', 'ReadystockController@edit');
Route::get('readystock', 'ReadystockController@index');
Route::post('readystock/status/{id}', 'ReadystockController@postUpdate');
Route::get('readystock/tambahrs', 'ReadystockController@tambah');
Route::post('readystock/simpannonukuran', 'ReadystockController@simpannonukuran');
Route::post('readystock/simpanukuran', 'ReadystockController@simpanukuran');

Route::get('testimonimachiko', 'TestimoniControllerMachiko@index');

Route::get('transaksi', 'KelolaTransaksiController@index');
Route::get('/transaksi/detail/{id}', 'KelolaTransaksiController@detailtrans');
Route::get('/transaksi/detailNotif/{id}', 'KelolaTransaksiController@detailtrans');
Route::post('/transaksi/ubah', 'KelolaTransaksiController@ubahstatus');
Route::get('transaksi_reseller', 'KelolaTransaksiController@transReseller');
Route::get('/transaksi_reseller/detail/{id}', 'KelolaTransaksiController@detail');

Route::post('/transaksi_reseller/detail/update/', 'KelolaTransaksiController@postUpdate');
Route::get('konfirmasibayar', 'KonfirmasiPembayaranController@index');
Route::post('konfirmasibayar/simpan', 'KonfirmasiPembayaranController@simpan');
Route::get('pembayaran_cod', 'PembayaranCODController@index');
Route::post('pembayaran_cod/lunas/{id}', 'PembayaranCODController@postUpdate');



Auth::routes();

// Route::get('/home', 'HomeController@index');




// front end

Route::get('/daftar', function () {
    return view('machiko.register');
});
Route::get('/masuk', function () {
    return view('machiko.login');
});

Route::get('profil', 'ProfilControllerMachiko@index');
Route::post('profil/simpan', 'ProfilControllerMachiko@store');
Route::post('profil/alamat', 'ProfilControllerMachiko@alamat');
Route::post('profil/editAlamat', 'ProfilControllerMachiko@editAlamat');
Route::post('profil/upgrade', 'ProfilControllerMachiko@upgrade');

Route::get('machikokstore', 'ProdukControllerMachiko@index');
Route::get('machikok', 'ProdukControllerMachiko@index');
Route::get('/machikokstore/detailProduk/{id}', 'ProdukControllerMachiko@detail');

Route::post('keranjang/tambah', 'KeranjangControllerMachiko@tambah');
Route::get('keranjang', 'KeranjangControllerMachiko@index');
Route::get('keranjang/delete/{id}', 'KeranjangControllerMachiko@getDelete');
Route::post('keranjang/edit', 'KeranjangControllerMachiko@postUpdate');

Route::get('wishlist', 'WishlistControllerMachiko@index');
Route::post('wishlist/tambah', 'WishlistControllerMachiko@tambah');
Route::get('wishlist/tambah', 'WishlistControllerMachiko@tambah');
Route::get('wishlist/delete/{id}', 'WishlistControllerMachiko@getDelete');
// Route::resource('wenay', 'WenayController');
Route::get('testimoni', 'TestimoniControllerMachiko@index');
Route::get('testimoni/tambah', 'TestimoniControllerMachiko@showtambah');
Route::post('testimoni/simpan', 'TestimoniControllerMachiko@simpan');

Route::get('checkout/{id}', 'TransaksiControllerMachiko@checkout');
Route::get('checkout/alamatbaru/{id}', 'TransaksiControllerMachiko@checkout2');
Route::get('checkout/alamatbaru/hasil/{kota_tujuan}/{berat}', 'TransaksiControllerMachiko@hasil');
Route::get('checkout/hasil/{kota_tujuan}/{berat}', 'TransaksiControllerMachiko@hasil');
Route::get('checkout/getId/{kota_asal}', 'TransaksiControllerMachiko@getId');
Route::get('checkout/hasil/{kota_tujuan}/{radio}/{berat}', 'TransaksiControllerMachiko@hasil');
Route::get('checkout/getAlamat/{alamat}', 'TransaksiControllerMachiko@alamat');
Route::post('checkout/simpan', 'TransaksiControllerMachiko@tambah');
Route::post('checkout/simpan2', 'TransaksiControllerMachiko@tambah2');
Route::get('checkout/metode/{metode}', 'TransaksiControllerMachiko@metode');
Route::get('checkout/alamatbaru/metode/{metode}', 'TransaksiControllerMachiko@metode');
Route::get('rekap_pemesanan', 'TransaksiControllerMachiko@rekap');

Route::get('cekongkir', 'CekongkirControllerMachiko@index');
Route::get('cekongkir/hasil/{kota_tujuan}/{berat}', 'CekongkirControllerMachiko@hasil');

Route::get('hasil/{kota_tujuan}/{radio}/{berat}', 'TransaksiControllerMachiko@hasil');
Route::get('checkout/getId/{kota_asal}', 'TransaksiControllerMachiko@getId');
Route::get('checkout/hasil/{kota_tujuan}/{radio}/{berat}', 'TransaksiControllerMachiko@hasil');

Route::get('konfirmasi', 'KonfirmasiControllerMachiko@index');
Route::post('konfirmasi/simpan', 'KonfirmasiControllerMachiko@simpan');
Route::post('konfirmasi/ubahBukti', 'KonfirmasiControllerMachiko@ubahbukti');

Route::get('pencarian', 'ProdukControllerMachiko@search');


Route::get('status_pesan', 'StatusPemesananControllerMachiko@index');
Route::get('status_pesan/detail/{id}', 'StatusPemesananControllerMachiko@detail');

Route::post('register', 'Auth\RegisterController@create');
Route::get('register/verify/{confirmationCode}',[
    'as' => 'confirmation_path',
    'uses' => 'Auth\RegisterController@confirm'
]); 