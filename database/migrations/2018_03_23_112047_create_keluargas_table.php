<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nama_kepala_keluarga');
            $table->String('alamat');
            $table->String('agama');
            $table->integer('no_telepon')->unique();
            $table->unsignedInteger('id_pengantin');
            $table->foreign('id_pengantin')->references('id')->on('pengantins')->ondelete('cascade');
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
        Schema::dropIfExists('keluargas');
    }
}
