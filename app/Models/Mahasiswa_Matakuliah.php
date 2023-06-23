<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa_Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_matakuliah';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mahasiswa_id',
        'matakuliah_id',
        'nilai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
}
