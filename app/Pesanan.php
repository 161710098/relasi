<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
	 protected $table = 'pesanans';
     protected $fillable = ['total_pesanan','uang_muka','sisa_bayar','tanggal_pesan'];
     public $timestamps = true;
    /*
	 * Relasi Many-to-Many
	 * ===================
	 * Buat function bernama Pengantin(), dimana model 'Pesanan' memiliki relasi
	 * Many-to-Many (belongsToMany) terhadap model 'Pengantin' yang terhubung oleh
	 * tabel 'konfirmasi_bayar' masing-masing sebagai 'id_pesanan' dan 'id_pengantin' 
	 */
	
    public function Pesanan() 
    {
		return $this->belongsToMany('App\Pengantin', 'konfirmasi_bayar', 'id_pesanan', 'id_pengantin');
}
}
