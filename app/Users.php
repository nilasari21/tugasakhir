<?php

namespace App;
// namespace App\Notifications;

use Illuminate\Database\Eloquent\Model;

// use Backpack\CRUD\CrudTrait;

class Users extends Model
{
    // use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'users';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id','level','nama_lengkap','no_hp','tgl_lahir','jenis_kelamin','konfirm_email','konfirm_admin','created_at','alamat_lengkap',
    'email','kata_sandi','remember_token','status_user','','status_user','toko','foto','updated_at'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
/* public function routeNotificationFor()
    {
        return $this->id;
    }*/
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
