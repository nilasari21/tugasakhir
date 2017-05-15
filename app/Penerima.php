<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;

class Penerima extends Model
{
    // use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'penerima';
    protected $primaryKey = 'id_penerima';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_penerima','id_user','provinsi','kabupaten',
    'kecamatan','alamat_lengkap','nama_alamat','nama_penerima','no_hp_penerima'];
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
    public function transaki()
    {
        return $this->hasMany('App\Transaksi','id_penerima');
     }  
    /*public function user()
    {
        return $this->belongsTo('App\Models\Transaksi','id_penerima');
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
