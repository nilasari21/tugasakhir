<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_user','level','nama_lengkap','no_hp','tgl_lahir','jenis_kelamin'
    ,'remember_token','status_user','toko','foto','confirmation_code','konfirm_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /*public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }*/
    }