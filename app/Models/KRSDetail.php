<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KRSDetail extends Model
{
    protected $table = 'table_krs_detail';

    protected $fillable = [
        'krs_id',
        'kelas_id',
        'status'
    ];

    public function kelas() {
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }

    public function krs() {
        return $this->hasOne(KRS::class, 'id', 'krs_id');
    }
}