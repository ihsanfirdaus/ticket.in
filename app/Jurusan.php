<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['keberangkatan','tujuan','waktu'];
    
    public function jadwal(){
        return $this->hasMany('App\Jadwal','id_jurusan');
    }
}
