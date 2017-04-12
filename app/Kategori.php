<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori_produk';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['id_kategori','nama_kategori','status'];

    
}