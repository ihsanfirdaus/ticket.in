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
            $table->date('tanggal_berangkat');
            $table->date('tanggal_pulang');
            $table->unsignedBigInteger('id_pengemudi');
            $table->unsignedBigInteger('id_kendaraan');
            $table->unsignedBigInteger('id_jurusan');
            $table->unsignedBigInteger('id_kategori');
            $table->integer('harga_tiket');
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
