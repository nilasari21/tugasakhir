<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Produk extends Model
{
    // use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'produk';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['id','id_kategori','nama_produk','berat','minimal_beli','jenis',
    'tgl_awal_po','tgl_akhir_po','jumlah_minimal_produksi','foto','keterangan'];

    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function ukuran()
    {
         return $this->belongsToMany('App\Ukuran')
                    ->withPivot('produk_id','ukuran_id','stock','harga_tambah')
                    ->withTimestamps();
     }
     /*public function status()
    {
         return $this->belongsToMany('App\StatusPo')
                    ->withPivot('id_produk','id_status_po')
                    ->withTimestamps();
     }*/
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function metode()
    {
        return $this->belongsToMany('App\Metode');
     }
     public function keranjang()
    {
        return $this->hasMany('App\keranjang');
     }
    /*public function produk_ukuran()
    {
        return $this->hasMany('App\Models\ProdukUkuran','produk_id','ukuran_id','stock','harga_tambah','created_at','updated_at');
     } */ 
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
