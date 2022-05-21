<?php

use Illuminate\Database\Seeder;

class MahasiswasTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Mahasiswa::insert([
            [
              'id'  			=> 1,
              'user_id'  		=> 1,
              'nim'				=> 10000353,
              'nama' 			=> 'Amelia',
              'tempat_lahir'	=> 'Sulawesi',
              'tgl_lahir'		=> '2018-01-01',
              'jk'				=> 'P',
              'prodi'			=> 'TI',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'user_id'  		=> 2,
              'nim'				=> 10000375,
              'nama' 			=> 'Indra Yoga',
              'tempat_lahir'	=> 'Kalimantan',
              'tgl_lahir'		=> '2019-01-01',
              'jk'				=> 'L',
              'prodi'			=> 'TI',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
