<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\KRSDetailController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::resource('/mahasiswa', MahasiswaController::class);

    Route::resource('/dosen', DosenController::class);

    Route::resource('/jurusan', JurusanController::class);

    Route::resource('/mata_kuliah', MatakuliahController::class);

    Route::resource('/kelas', KelasController::class)
        ->except(['show', 'edit', 'update']);

    Route::resource('/krs', KRSController::class);

    Route::resource('/krs-detail', KRSDetailController::class);

    Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
});