<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Dashboard');
});

Route::resource('/mahasiswa', MahasiswaController::class);
Route::resource('/dosen', DosenController::class);
Route::resource('/jurusan', JurusanController::class);
Route::resource('/mata_kuliah', MatakuliahController::class);
Route::resource('kelas', KelasController::class)
    ->except(['show', 'edit', 'update']);