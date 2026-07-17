<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model 
{ 
    use HasFactory;

    protected $table = 'mata_kuliah';
    
    protected $fillable = [
        'jurusan_id',
        'kode_mk',
        'nama_mk',
        'sks',
        'dosen_id',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function kelas() 
    {
        return $this->hasMany(Kelas::class, 'kode_mata_kuliah', 'id');
    }
}