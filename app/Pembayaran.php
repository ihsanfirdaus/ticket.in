<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = ['id_pemesanan','dari_bank','ke_bank','no_rek','atas_nama','nominal_transfer','gambar_bukti','tanggal_konfirmasi'];
}
