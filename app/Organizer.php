<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $table = 'organizers'; // -> meminta izin untuk mengakses table organizers
    protected $fillable = ['nama_paket','harga','email','no_telepon']; // -> field apa saja yang boleh di isi -> fill = mengisi, able = boleh jadi fillable = boleh di isi
    public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

    public function Pengantin()
    {
    	return $this->hasMany('App\Pengantin','id_organizer');
    }
}
