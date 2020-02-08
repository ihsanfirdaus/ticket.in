<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['tanggal_berangkat','id_kendaraan','id_jurusan','id_pengemudi','harga_tiket'];
    
    public $timestamps = true;

    public function kendaraan(){
        return $this->belongsTo('App\Kendaraan','id_kendaraan');
    }
    public function pengemudi(){
        return $this->belongsTo('App\Pengemudi','id_pengemudi');
    }
    public function jurusan(){
        return $this->belongsTo('App\Jurusan','id_jurusan');
    }
    public function booking(){
        return $this->hasMany('App\Booking','id_jadwal');
    }
}
