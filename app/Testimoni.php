<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'user';
    protected $fillable = ['id_user','id_testi','keterangan','tanggal_membuat','foto'];

    
}