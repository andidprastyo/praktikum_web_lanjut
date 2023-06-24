<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $guarded = 'id';

    protected $fillable = [
        'Nim',
        'Nama',
        'Foto',
        'kelas_id',
        'Jurusan',
        'No_Handphone',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class,'mahasiswa_matakuliah','mahasiswa_id','matakuliah_id')->withPivot('nilai');
    }
}
