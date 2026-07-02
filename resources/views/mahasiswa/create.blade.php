<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD - Tambah Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Mengunci background gradasi biru malam sinematik agar sinkron */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background: linear-gradient(180deg, #0f3156 0%, #0b223f 40%, #07172b 70%, #040d1a 100%);
            display: flex;
            flex-direction: column;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Pembungkus konten utama agar mendorong footer pintar tetap di bawah */
        .content-grow {
            flex: 1 0 auto;
        }

        /* --- STYLING NAVBAR PREMIUM (SINKRON) --- */
        .navbar {
            background: rgba(11, 34, 63, 0.4) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 12px 0;
        }

        .logo-wrapper {
            width: 45px;
            height: 45px;
            background: #ffffff; 
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .logo-wrapper img {
            width: 85%;
            height: 85%;
            object-fit: contain;
        }

        .brand-text {
            font-weight: 700;
            font-size: 1.15rem;
            letter-spacing: 0.5px;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        /* Memperbesar ukuran teks menu navigasi utama */
        .nav-link-custom {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 600;
            font-size: 1.05rem; /* Ukuran diperbesar sedikit */
            transition: all 0.3s;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            color: #90caf9 !important;
            text-shadow: 0 0 8px rgba(144, 202, 249, 0.4);
        }

        /* Styling khusus Kembali ke Tabel agar teksnya kontras dan sedikit lebih besar */
        .nav-link-back {
            color: #90caf9 !important;
            font-weight: 600;
            font-size: 1.05rem; /* Ukuran diperbesar sedikit */
            transition: all 0.3s;
        }
        
        .nav-link-back:hover {
            color: #ffffff !important;
            text-shadow: 0 0 10px rgba(144, 202, 249, 0.6);
        }

        /* Menu SIAKAD di ujung kanan tetap proporsional */
        .nav-link-siakad {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .dropdown-menu {
            background: rgba(16, 28, 54, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
        }

        .dropdown-item {
            color: rgba(255, 255, 255, 0.8);
        }

        .dropdown-item:hover {
            background: rgba(144, 202, 249, 0.15);
            color: #90caf9;
        }

        /* --- STYLING GLASSMORPHISM FORM CARD --- */
        .form-card {
            background: rgba(16, 28, 54, 0.55);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }

        .main-title {
            font-weight: 800;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .form-label {
            font-weight: 500;
            color: #e5efff;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff !important;
            border-radius: 30px; 
            padding: 11px 22px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #90caf9;
            box-shadow: 0 0 0 0.25rem rgba(144, 202, 249, 0.3);
        }

        textarea.form-control {
            border-radius: 18px;
        }

        .btn-add {
            background: linear-gradient(90deg, #1e5bb0 0%, #0f3069 100%);
            color: white;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 30px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(15, 48, 105, 0.4);
        }

        .btn-add:hover {
            background: linear-gradient(90deg, #266ecf 0%, #153f85 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(38, 110, 207, 0.5);
            color: white;
        }

        .btn-clear {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #e5efff;
            font-weight: 600;
            border-radius: 30px;
            padding: 12px 30px;
            transition: all 0.3s ease;
        }

        .btn-clear:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
        }

        /* --- STICKY FOOTER --- */
        footer {
            flex-shrink: 0;
            background: rgba(4, 13, 26, 0.95);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: #94a3b8;
            padding: 15px 0;
            width: 100%;
        }

        .footer-logo-container {
            display: flex;
            align-items: center;
            height: 35px;
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
                    <a class="nav-link nav-link-custom" href="/" style="font-size: 1.15rem; font-weight: 600;">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-4">
                
                <li class="nav-item">
                    <a class="nav-link nav-link-back" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}" style="font-size: 1.05rem; font-weight: 600;">
                        ← Kembali ke Tabel
                    </a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link-siakad active" href="#" role="button" data-bs-toggle="dropdown" style="font-size: 0.95rem; font-weight: 500;">
                        Menu SIAKAD
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Data Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Data Dosen</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">Data Jurusan</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">Mata Kuliah</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}">Kelas</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>

        <div class="container my-5" style="max-width: 800px;">
            
            <div class="mb-4 text-center text-md-start">
                <h1 class="main-title mb-1">Tambah Data Mahasiswa</h1>
                <p class="text-white-50 mb-0">Isi formulir di bawah dengan lengkap dan benar.</p>
            </div>

            <div class="form-card">
                <form action="{{ action([App\Http\Controllers\MahasiswaController::class, 'store']) }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                            <input type="text" name="NIM" class="form-control" placeholder="Masukkan NIM" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Nomor Induk Siswa Nasional (NISN)</label>
                            <input type="text" name="NISN" class="form-control" placeholder="Masukkan NISN">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan kota lahir" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label">Alamat Rumah</label>
                            <textarea name="alamat" rows="4" class="form-control" placeholder="Tuliskan alamat lengkap tempat tinggal saat ini" required></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3 border-top border-white border-opacity-10 pt-4 mt-2">
                        <button type="reset" class="btn btn-clear">
                            Clear
                        </button>
                        <button type="submit" class="btn btn-add">
                            Add Data
                        </button>
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
                Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>