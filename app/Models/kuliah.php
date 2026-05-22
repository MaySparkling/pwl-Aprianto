<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kuliah extends Model
{
    //
    use HasFactory;

    protected $table = 'mahasiswa';
    
    protected $fillable = [
        'kode_kelas',
        'kode_mata_kuliah',
        'kode_dosen',
        'hari',['senin', 'selasa', 'rabu', 'kamis', 'jumat']',
        'jam', ['07:00 - 08:40', '08:50 - 11:30', '12:30 - 14:10', '17:00 - 18:40', '19:00 - 20:40'])',
        'tahun_ajaran'
        'ruang_kelas'
        'jumlah_max'
        'jumlah_mahasiswa'->default(0)'
        '
    ];
}
}
