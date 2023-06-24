<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'Nim' => "2141720046",
            'Nama' => "Andi Dwi Prastyo",
            'Foto' => 'images/me.jpeg',
            'kelas_id' => "4",
            'Jurusan' => "IT",
            'No_Handphone' => "081291006320",
        ]);
        Mahasiswa::create([
            'Nim' => "2141720047",
            'Nama' => "Ariyanto",
            'Foto' => 'images/ncen.jpeg',
            'kelas_id' => "5",
            'Jurusan' => "IT",
            'No_Handphone' => "081291006321",
        ]);
    }
}
