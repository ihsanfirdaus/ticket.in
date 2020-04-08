<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_jadwal');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_pulang')->nullable();
            $table->unsignedBigInteger('id_maskapai');
            $table->unsignedBigInteger('id_jurusan');
            $table->unsignedBigInteger('id_kategori');
            $table->string('harga_tiket');
            $table->string('tipe_tiket')->nullable();
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
        Schema::dropIfExists('jadwals');
    }
}
