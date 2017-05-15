<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;

class Preorder extends Model
{
    // use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_produk','id-kategori','nama_produk','harga','stock_totak','berat','minimal_beli','status',
    'tgl_awal_po','tgl_akhir_po','batas_waktu_bayar','batas_jam','foto','keterangan','id_kategori'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function ukuran()
    {
        return $this->belongsToMany('App\Ukuran','detail_produk_ukuran','id_produk','id_ukuran');
     }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function metode()
    {
        return $this->belongsToMany('App\Metode');
     }  
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
