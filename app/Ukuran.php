<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    protected $table = 'ukuran';
    protected $primaryKey = 'id_ukuran';
    protected $fillable = ['id_ukuran' ,'nama_ukuran','status'];
    
    
}