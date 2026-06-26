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
        Schema::create('table_krs_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('krs_id');
            $table->foreign('krs_id')
            ->references('id')
            ->on('table_krs')
            ->onDelete('cascade');

            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')
            ->references('id')
            ->on('kelas')
            ->onDelete('cascade');

            $table->enum('status', ['pending', 'approved', 'partial', 'declined']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_krs_detail');
    }
};
