<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $fillable = ['id_user','id_level','nama_lengkap','no_hp','tgl_lahir','jenis_kelamin','provinsi','kabupaten','kecamatan','alamat_lengkap',
    'email','username','kata_sandi','remember_token','status_user','','status_user','toko','foto'];

    
}