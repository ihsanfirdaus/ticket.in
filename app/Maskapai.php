<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maskapai extends Model
{
    protected $fillable = ['id_jenis','nama_maskapai','gambar_maskapai','jumlah_kursi'];

    public function jenis_k(){
        return $this->belongsTo('App\Jenis_K','id_jenis'); 
    }
    
    public function jadwal(){
        return $this->hasMany('App\Jadwal','id_maskapai');
    }
    
}
