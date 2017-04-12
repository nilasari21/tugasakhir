<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['id_produk','id-kategori','nama_produk','harga','stock_totak','berat','minimal_beli','status','tgl_awal_po','tgl_akhir_po','batas_waktu_bayar','batas_jam','foto','keterangan','nama_kategori'];

    
}