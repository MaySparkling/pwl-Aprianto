<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD - Tambah Kelas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* --- BACKGROUND GRADASI ELEGAN & WARM SESUAI GAMBAR ACUAN --- */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background: linear-gradient(135deg, #3a0303 0%, #b21f1f 25%, #f15b22 65%, #fbb03b 100%);
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .content-grow {
            flex: 1 0 auto;
        }

        /* --- NAVBAR GLASSMORPHISM --- */
        .navbar {
            background: rgba(26, 5, 0, 0.4) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 14px 0;
        }

        .logo-wrapper {
            width: 40px;
            height: 40px;
            background: #ffffff; 
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .logo-wrapper img {
            width: 85%;
            height: 85%;
            object-fit: contain;
        }

        .brand-text {
            font-weight: 600;
            font-size: 1.1rem;
            color: #ffffff;
            text-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }

        .nav-link-custom {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.2s;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            color: #fbb03b !important; 
        }

        .nav-link-back {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.2s;
            text-decoration: none;
        }
        
        .nav-link-back:hover {
            color: #fbb03b !important;
        }

        .dropdown-menu {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .dropdown-item {
            color: #2b2b2b;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: #f15b22; 
            color: #ffffff;
        }

        /* --- GLASSMORPHISM FORM CARD --- */
        .form-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .main-title {
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .form-label {
            font-weight: 500;
            color: #ffffff; /* Dipastikan Putih Cerah */
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff !important;
            border-radius: 8px; 
            padding: 10px 16px;
            font-size: 0.95rem;
        }

        /* --- MENYALA PUTIH: Mengubah warna placeholder/teks "Contoh: ---" menjadi putih bersih --- */
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.85) !important;
            opacity: 1; /* Override standaran browser agar tidak pudar */
        }

        .form-select option {
            background-color: #3a0303;
            color: #ffffff;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.18);
            border-color: #fbb03b;
            box-shadow: 0 0 0 0.25rem rgba(251, 176, 59, 0.25);
        }

        .form-check-input {
            background-color: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .form-check-input:checked {
            background-color: #f15b22;
            border-color: #fbb03b;
        }

        /* --- BUTTON SIMPAN ELEGAN --- */
        .btn-add {
            background: linear-gradient(90deg, #fbb03b 0%, #f15b22 100%);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 25px;
            padding: 10px 30px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 10px rgba(241, 91, 34, 0.2);
        }

        .btn-add:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(241, 91, 34, 0.4);
            color: white;
        }

        /* --- FOOTER --- */
        footer {
            flex-shrink: 0;
            background: rgba(15, 5, 0, 0.85);
            backdrop-filter: blur(5px);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: #ffffff;
            padding: 20px 0;
            width: 100%;
        }

        .footer-logo-container {
            display: flex;
            align-items: center;
            height: 30px;
        }

        .footer-logo-container img {
            height: 100%;
            width: auto;
            filter: brightness(0) invert(1);
        }
    </style>
</head>

<body>

    <div class="content-grow">

        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-3" href="/">
                    <div class="logo-wrapper">
                        <img src="{{ asset('images/ITB-SS.jpg') }}" alt="Logo ITBSS">
                    </div>
                    <span class="brand-text">Institut Teknologi & Bisnis Sabda Setia</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 flex-grow-1 d-flex justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="/">Home</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-4">
                        <li class="nav-item">
                            <a class="nav-link nav-link-back" href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}">
                                ← Kembali ke Tabel
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-link-siakad" href="#" role="button" data-bs-toggle="dropdown">
                                Menu SIAKAD
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Dosen</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">Jurusan</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">Mata Kuliah</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\KRSController::class, 'index']) }}">KRS</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container my-5" style="max-width: 800px;">
            <div class="mb-4 text-center text-md-start">
                <h1 class="main-title mb-1">Tambah Kelas</h1>
                <p class="text-white mb-0">Isi formulir alokasi jadwal perkuliahan di bawah dengan lengkap.</p>
            </div>

            <div class="form-card">
                <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Kode Kelas</label>
                            <input type="text" name="kode_kelas" class="form-control" placeholder="Contoh: KLS-001" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" class="form-control" placeholder="Contoh: 2025/2026" required>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label">Mata Kuliah</label>
                            <select name="kode_mata_kuliah" class="form-select" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach($mata_kuliah as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label">Dosen Pengampu</label>
                            <select name="kode_dosen" class="form-select" required>
                                <option value="">-- Pilih Dosen --</option>
                                @foreach($dosen as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Hari</label>
                            <select name="hari" class="form-select" required>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Jam Perkuliahan</label>
                            <select name="jam" class="form-select" required>
                                <option value="07:00 - 08:40">07:00 - 08:40</option>
                                <option value="08:50 - 11:30">08:50 - 11:30</option>
                                <option value="12:30 - 14:10">12:30 - 14:10</option>
                                <option value="17:00 - 18:40">17:00 - 18:40</option>
                                <option value="19:00 - 20:40">19:00 - 20:40</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Ruang Kelas</label>
                            <input type="text" name="ruang_kelas" class="form-control" placeholder="Contoh: Lab Komputer 1" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Jumlah Maksimal Mahasiswa</label>
                            <input type="number" name="jumlah_max" class="form-control" placeholder="Contoh: 40" required>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="form-label d-block">Semester</label>
                            <div class="d-flex gap-4 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="semester" id="semesterGanjil" value="ganjil" checked>
                                    <label class="form-check-label text-white" for="semesterGanjil">Ganjil</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="semester" id="semesterGenap" value="genap">
                                    <label class="form-check-label text-white" for="semesterGenap">Genap</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3 border-top border-white border-opacity-10 pt-4 mt-3">
                        <button type="submit" class="btn btn-add">Simpan Data Kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <div class="container d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <div class="footer-logo-container mb-2 mb-sm-0">
                <img src="{{ asset('images/Logo-ITBSS.png') }}" alt="Logo ITBSS Footer">
            </div>
            <p class="mb-0 small text-white-50">
                Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia. All rights reserved - Aprianto.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>