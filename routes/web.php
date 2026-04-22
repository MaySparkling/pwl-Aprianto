<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/mahasiswa', MahasiswaController::class);
Route::resource('/dosen', DosenController::class);
Route::resource('/jurusan', JurusanController::class);