<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaskapaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maskapais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_jenis');
            $table->string('gambar_maskapai')->nullable();
            $table->string('nama_maskapai');
            $table->integer('jumlah_kursi');
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
        Schema::dropIfExists('maskapais');
    }
}
