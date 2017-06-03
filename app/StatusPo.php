<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StatusPo extends Model
{
    // use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'staus_po';
    protected $primaryKey = 'id_status_po';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_status_po','nama_status'];

    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function produk()
    {
         return $this->belongsToMany('App\Produk')
                    ->withPivot('id_produk','id_status_po')
                    ->withTimestamps();
     }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    /*public function metode()
    {
        return $this->belongsToMany('App\Metode');
     }
     public function keranjang()
    {
        return $this->hasMany('App\keranjang');
     }*/
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
