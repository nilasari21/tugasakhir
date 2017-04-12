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

Route::get('beranda', 'TestController@index');

Route::get('test', 'BerandaController@index');

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

Route::get('testimoni', 'TestimoniController@index');

Route::get('preorder', 'PreorderController@index');
Route::get('readystock', 'ReadystockController@index');

Route::get('testimonimachiko', 'TestimoniControllerMachiko@index');
