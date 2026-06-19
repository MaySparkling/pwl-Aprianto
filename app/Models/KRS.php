<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    protected $table = 'table_krs';

    protected $fillable = [
        'kode_mahasiswa',
        'tahun_ajaran',
        'semester',
        'status',
        'total_sks'
    ];

    public function mahasiswa() {
        return $this->hasOne(Mahasiswa::class, 'id', 'kode_mahasiswa');
    }

    public function detail() {
        return $this->hasMany(KRSDetail::class, 'krs_id', 'id');
    }
}