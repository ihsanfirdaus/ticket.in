<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['bandara_k',
                        'keberangkatan',
                        'kode_penerbangan_k',
                        'waktu_k',
                        'bandara_t',
                        'tujuan',
                        'kode_penerbangan_t',
                        'waktu_t'];
    
    public function jadwal(){
        return $this->hasMany('App\Jadwal','id_jurusan');
    }
    
}

