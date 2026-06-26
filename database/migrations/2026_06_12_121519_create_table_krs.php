<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_krs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_mahasiswa');
            $table->foreign('kode_mahasiswa')
            ->references('id')
            ->on('mahasiswa')
            ->onDelete('cascade');

            $table->string('tahun_ajaran');
            $table->enum('semester', ['ganjil', 'genap']);
            $table->enum('status', ['pending', 'approved', 'partial', 'declined']);
            $table->integer('total_sks');
            $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_krs');
    }
};
