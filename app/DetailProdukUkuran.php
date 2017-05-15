<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProdukUkuran extends Model
{
    protected $table = 'detail_ukuran';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_detail','id_produk','id_ukuran','harga_tambah','stock'];

public function ukuran(){
		return $this->belongsTo('App\Ukuran','id_ukuran');
	} 
public function produk(){
		return $this->belongsTo('App\Produk','id_produk');
	} 
    
}