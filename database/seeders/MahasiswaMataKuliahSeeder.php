<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa_Matakuliah::create([
            'mahasiswa_id' => '1',
            'matakuliah_id' => '1',
            'nilai' => 'A'
        ]);
        Mahasiswa_Matakuliah::create([
            'mahasiswa_id' => '1',
            'matakuliah_id' => '2',
            'nilai' => 'A'
        ]);
        Mahasiswa_Matakuliah::create([
            'mahasiswa_id' => '1',
            'matakuliah_id' => '3',
            'nilai' => 'A'
        ]);
        Mahasiswa_Matakuliah::create([
            'mahasiswa_id' => '1',
            'matakuliah_id' => '4',
            'nilai' => 'A'
        ]);
        Mahasiswa_Matakuliah::create([
            'mahasiswa_id' => '2',
            'matakuliah_id' => '1',
            'nilai' => 'B'
        ]);
        Mahasiswa_Matakuliah::create([
            'mahasiswa_id' => '2',
            'matakuliah_id' => '2',
            'nilai' => 'B'
        ]);
        Mahasiswa_Matakuliah::create([
            'mahasiswa_id' => '2',
            'matakuliah_id' => '3',
            'nilai' => 'B'
        ]);
        Mahasiswa_Matakuliah::create([
            'mahasiswa_id' => '2',
            'matakuliah_id' => '4',
            'nilai' => 'B'
        ]);
    }
}
