<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProdukUkuran extends Model
{
    // use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'produk_ukuran';
    protected $primaryKey = 'id_produk_ukuran';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_produk_ukuran','produk_id','ukuran_id','stock','harga_total','harga_pokok','created_at','updated_at'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    /*public function produk()
    {
        return $this->belongsTo('App\Models\Produk');
     }
     public function ukuran()
    {
        return $this->belongsTo('App\Models\Ukuran');
     }*/
      public function keranjang()
    {
        return $this->hasMany('App\keranjang');
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
