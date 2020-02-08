<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_K extends Model
{
    protected $fillable = ['jenis_kendaraan'];

    public function kendaraan(){
        return $this->hasMany('App\Kendaraan','id_jenis'); 
    }
}
