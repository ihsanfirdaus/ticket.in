<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori'];

    public function jadwal(){
        return $this->hasMany('App/Jadwal','id_kategori');
    }
}
