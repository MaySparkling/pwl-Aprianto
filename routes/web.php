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

// =========================================================================
// RUTE UMUM (BISA DIAKSES SEBELUM LOGIN)
// =========================================================================
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');


// =========================================================================
// RUTE SETELAH LOGIN (WAJIB AUTENTIKASI)
// =========================================================================
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ---------------------------------------------------------------------
    // 1. ROLE: ADMIN (Akses Penuh CRUD Master Data)
    // ---------------------------------------------------------------------
    Route::middleware('role:admin')->group(function () {
        Route::resource('/mahasiswa', MahasiswaController::class);
        Route::resource('/dosen', DosenController::class);
        Route::resource('/jurusan', JurusanController::class);
        Route::resource('/mata_kuliah', MatakuliahController::class);
        Route::resource('/kelas', KelasController::class)->except(['show', 'edit', 'update']);
    });

    // ---------------------------------------------------------------------
    // 2. ROLE: MAHASISWA (Hanya Mengelola KRS Milik Sendiri)
    // Mahasiswa hanya boleh melihat daftar (index), mendaftar (create/store), & detail (show)
    // ---------------------------------------------------------------------
    Route::middleware('role:mahasiswa')->group(function () {
        Route::resource('/krs', KRSController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource('/krs-detail', KRSDetailController::class)->only(['index', 'create', 'store', 'show']);
    });

   // ---------------------------------------------------------------------
    // 3. ROLE: DOSEN (Read-Only Data Master & Fitur Approval KRS)
    // ---------------------------------------------------------------------
    Route::middleware('role:dosen')->group(function () {
        // Hak Akses Melihat Data Master (Hanya index & show) tanpa ribet ganti nama rute
        Route::resource('/mahasiswa', MahasiswaController::class)->only(['index', 'show']);
        Route::resource('/dosen', DosenController::class)->only(['index', 'show']);
        Route::resource('/jurusan', JurusanController::class)->only(['index', 'show']);
        Route::resource('/mata_kuliah', MatakuliahController::class)->only(['index', 'show']);
        Route::resource('/kelas', KelasController::class)->only(['index']);

        // Hak Akses Terkait Validasi KRS
        Route::get('/krs', [KRSController::class, 'index'])->name('dosen.krs.index');
        Route::get('/krs/{id}', [KRSController::class, 'show'])->name('dosen.krs.show');
        Route::post('/krs/{id}/approve', [KRSController::class, 'approve'])->name('dosen.krs.approve');
        Route::post('/krs/{id}/reject', [KRSController::class, 'reject'])->name('dosen.krs.reject');
    });

});