<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Jurusan extends Model
{
    protected $fillable = ['keberangkatan','tujuan','waktu'];
    
    public function jadwal(){
        return $this->hasMany('App\Jadwal','id_jurusan');
    }
    
    public static function boot(){
        parent::boot();
        
        self::deleting(function ($jurusan){
            // Jika data jurusan pada tabel jadwal masih digunakan,
            if ($jurusan->jadwal->count() > 0){
                //Membatalkan proses penghapusan
                return false;
            }
        });
    }
}
