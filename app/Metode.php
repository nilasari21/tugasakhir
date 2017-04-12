<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    protected $table = 'metode_bayar';
    protected $primaryKey = 'id_metode_bayar';
    protected $fillable = ['id_metode_bayar','metode','nomor','rate','nama_rekening','jenis','status'];

    
}