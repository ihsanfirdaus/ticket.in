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

        DB::insert('insert into kategoris (id, nama_kategori) values (?, ?),(?, ?),(?, ?)', [1, 'Ekonomi', 2, 'Bisnis', 3, 'Kelas Pertama']);
    }
}
