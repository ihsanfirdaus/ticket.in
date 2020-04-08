<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bandara_k');
            $table->string('keberangkatan');
            $table->string('kode_penerbangan_k');
            $table->time('waktu_k');
            $table->string('bandara_t');
            $table->string('tujuan');
            $table->string('kode_penerbangan_t');
            $table->time('waktu_t');
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
        Schema::dropIfExists('jurusans');
    }
}
