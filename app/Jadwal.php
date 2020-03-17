<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['tanggal_berangkat','tanggal_pulang','id_kendaraan','id_jurusan','id_kategori','harga_tiket','tipe_tiket'];

    public function kendaraan(){
        return $this->belongsTo('App\Kendaraan','id_kendaraan');
    }
    
    public function jurusan(){
        return $this->belongsTo('App\Jurusan','id_jurusan');
    }

    public function booking(){
        return $this->hasMany('App\Booking','id_jadwal');
    }

    public function kategori(){
        return $this->belongsTo('App/Kategori','id_kategori');
    }
}
