<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengantin extends Model
{
     protected $table = 'pengantins';
     protected $fillable = ['nama_mempelai_pria','nama_mempelai_wanita','tanggal_pernikahan','no_telepon','id_organizer'];
     public $timestamps = true;

	public function Organizer()
	{
		return $this->belongsTo('App\Organizer','id_organizer');
	}

    public function Keluarga()
    {
    	return $this->hasOne('App\Keluarga','id_pengantin');
    }

    /*
     * Relasi Many-to-Many
     * ===================
     * Buat function bernama Pesanan(), dimana model 'Pesanan' memiliki relasi
     * Many-to-Many (belongsToMany) terhadap model 'Pesanan' yang terhubung oleh
     * tabel 'konfirmasi_bayar' masing-masing sebagai 'id_pengantin' dan 'id_pesanan' 
     */
    public function Pesanan() 
    {
return $this->belongsToMany('App\Pesanan', 'konfirmasi_bayar', 'id_pengantin', 'id_pesanan');
    }
}
