<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = ['id_jenis','gambar_kendaraan','nama_kendaraan','jumlah_kursi'];

    public $timestamps = true;

    public function jenis_k(){
        return $this->belongsTo('App\Jenis_K','id_jenis'); 
    }
    
    public function jadwal(){
        return $this->hasMany('App\Jadwal','id_kendaraan');
    }

}

