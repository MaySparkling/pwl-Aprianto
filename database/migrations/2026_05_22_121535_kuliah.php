<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Reverse the migrations.
     */
      public function up(): void
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas')
            $table->integer('kode_mata_kuliah')
            $table->integer('kode_dosen')
            $table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat'])
            $table->enum('jam', ['07:00 - 08:40', '08:50 - 11:30', '12:30 - 14:10', '17:00 - 18:40', '19:00 - 20:40'])
            $table->string('tahun_ajaran')
            $table->string('ruang_kelas')
            $table->integer('jumlah_mahasiswa')->default(0)
            $table->enum('semester', ['ganjil', 'genap'])
            $table->timestamp('created_at')
            $table->timestamp('update_at')
            $table->unique(['kode_dosen', 'hari', 'jam', 'tahun_ajaran', 'semester'])
            $table-> unique(['ruang_kelas', 'hari', 'jam', 'tahun_ajaran', 'semester'])
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};

