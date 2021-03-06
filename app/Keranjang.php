<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Keranjang extends Model
{
    

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_keranjang','user_id','id_produk_ukuran',
    'jumlah'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
// $model = Keranjang::where('user_id','=',Auth::user()->id);
// View::make('view')->withModel($model);
/*public function a(){
    return $model = Keranjang::where('user_id','=',Auth::user()->id);
}*/
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    
     public function produk()
    {
        return $this->belongsTo('App\Produk','produk_id');
     } 
     public function user()
    {
        return $this->belongsTo('App\User','user_id');
     }  
     public function produk_ukuran()
    {
        return $this->belongsTo('App\ProdukUkuran','id_produk_ukuran');
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
