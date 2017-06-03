<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RiwayatPo extends Model
{
    // use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'riwayat_po';
    protected $primaryKey = 'id_riwayat_po';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_riwayat_po','id_produk','id_status_po'];
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
     /* public function keranjang()
    {
        return $this->hasMany('App\keranjang');
     }*/
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
