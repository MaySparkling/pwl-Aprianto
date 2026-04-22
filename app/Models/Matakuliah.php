<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mata_kuliah extends Model 
{ 
    use HasFactory;

    protected $table = 'Mata_kuliah';
    
    protected $fillable = [
        'jurusan_id',
        'kode_mk',
        'nama_mk',
        'sks',
        'dosen_id',
    ];
}