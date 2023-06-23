<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matkul = [
            [
                'nama_matkul' => 'Pemrograman Berbasis Objek',
                'sks' => '2',
                'jam' => '4',
                'semester' => '4',
            ],
            [
                'nama_matkul' => 'Pemrograman Web Lanjut',
                'sks' => '3',
                'jam' => '5',
                'semester' => '4',
            ],
            [
                'nama_matkul' => 'Basis Data Lanjut',
                'sks' => '2',
                'jam' => '6',
                'semester' => '4',
            ],
            [
                'nama_matkul' => 'Praktikum Basis Data Lanjut',
                'sks' => '3',
                'jam' => '7',
                'semester' => '4',
            ],
        ];

        DB::table('matakuliah')->insert($matkul);
    }
}
