<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DetailTransaksi extends Model
{
    

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_detail_transaksi','id_transaksi','id_produk_ukuran','status_pesan','','keterangan_status',
    'jumlah_beli','keterangan'];
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
