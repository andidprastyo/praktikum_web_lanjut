<?php

namespace App\Models;

use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $guarded = 'id';

    protected $fillable = [
        'nama_matkul',
        'sks',
        'jam',
        'semester',
    ];

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class,'mahasiswa_matakuliah','matakuliah_id','mahasiswa_id');
    }
}
