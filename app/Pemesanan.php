<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = ['no_pemesanan',
                        'id_jadwal',
                        'id_user',
                        'nama_pemesan',
                        'no_hp',
                        'jumlah_penumpang_dewasa',
                        'jumlah_penumpang_anak',
                        'harga_total',
                        'tanggal_pemesanan',
                        'status_pembayaran'];

    public $timestamps = true;

    public function jadwal(){
        return $this->belongsTo('App\Jadwal','id_jadwal');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
}
