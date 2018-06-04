<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengantinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengantins', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nama_mempelai_pria');
            $table->String('nama_mempelai_wanita');
            $table->date('tanggal_pernikahan');
            $table->integer('no_telepon')->unique();
            $table->unsignedInteger('id_organizer');
            $table->foreign('id_organizer')->references('id')->on('organizers')->ondelete('cascade');
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
        Schema::dropIfExists('pengantins');
    }
}
