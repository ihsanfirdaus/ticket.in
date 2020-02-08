<?php

use Illuminate\Database\Seeder;

class AllDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::insert('insert into jenis__k_s (id, jenis_kendaraan) 
        values (?, ?),(?, ?)', 
        [1, 'Bus',
        2, 'Pesawat']);

        DB::insert('insert into kendaraans (id,id_jenis,nama_kendaraan,gambar_kendaraan,jumlah_kursi) values (?,?,?,?,?)', 
        [1,1,'JetBus 3','foto_mobil',30]);

        DB::insert('insert into jurusans (id,keberangkatan,tujuan,waktu) values (?,?,?,?)', [1, 'Bandung','Jakarta','14:00']);

        DB::insert('insert into kategoris (id, nama_kategori) values (?, ?),(?, ?),(?, ?)', [1, 'Ekonomi', 2, 'Bisnis', 3, 'Kelas Pertama']);
    }
}
