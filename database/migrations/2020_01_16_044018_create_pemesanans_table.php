<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pemesanan')->unique();
            $table->unsignedBigInteger('id_jadwal');
            $table->unsignedBigInteger('id_user');
            $table->integer('jumlah_penumpang_dewasa');
            $table->integer('jumlah_penumpang_anak');
            $table->integer('harga_total');
            $table->string('status_pembayaran')->default("Belum dibayar");
            $table->date('tanggal_pemesanan');      
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
        Schema::dropIfExists('pemesanans');
    }
}
