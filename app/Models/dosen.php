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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'kode_dosen', 'id');
    }

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'dosen_id', 'id');
    }
}