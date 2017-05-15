<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Wishlist extends Model
{
    // use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'wishlist';
    protected $primaryKey = 'id_wishlist';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_wishlist','id_produk','id_user'];
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
      public function produk()
    {
        return $this->belongsTo('App\Produk','id_produk');
     }
     public function user()
    {
        return $this->belongsTo('App\User','id_user');
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
