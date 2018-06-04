<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluargas';
    protected $fillable = ['nama_kepala_keluarga','alamat','agama','no_telepon','id_pengantin'];
    public $timestamps = true;

    public function Pengantin()
	{
		return $this->belongsTo('App\Pengantin','id_pengantin');
	}
}
