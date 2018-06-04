<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelKonfirmasiBayar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi_bayar', function (Blueprint $table) {
            $table->unsignedInteger('id_pengantin');
            $table->foreign('id_pengantin')->references('id')->on('pengantins')->onDelete('CASCADE');
            $table->unsignedInteger('id_pesanan');
            $table->foreign('id_pesanan')->references('id')->on('pesanans')->onDelete('CASCADE');
            $table->date('tanggal_konfirm');
            $table->String('atas_nama');
            $table->String('jenis_nama');
            $table->String('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfirmasi_bayar');
    }
}
