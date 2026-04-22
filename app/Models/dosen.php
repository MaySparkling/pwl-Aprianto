<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model 
{ 
    use HasFactory;

    protected $table = 'dosen';
    
    protected $fillable = [
        'fullname',
        'NIP',
        'NIDN',
        'pendidikan_terakhir',
        'jurusan_id',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat'
    ];
}