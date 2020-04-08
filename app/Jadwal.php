<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['kode_jadwal',
                        'tanggal_berangkat',
                        'tanggal_pulang',
                        'id_maskapai',
                        'id_jurusan',
                        'id_kategori',
                        'harga_tiket',
                        'tipe_tiket'];

    public function maskapai(){
        return $this->belongsTo('App\Maskapai','id_maskapai');
    }
    
    public function jurusan(){
        return $this->belongsTo('App\Jurusan','id_jurusan');
    }

    public function pemesanan(){
        return $this->hasMany('App\Pemesanan','id_jadwal');
    }

    public function kategori(){
        return $this->belongsTo('App/Kategori','id_kategori');
    }
    public function getRouteKeyName(){
        return 'kode_jadwal';
    }
}

