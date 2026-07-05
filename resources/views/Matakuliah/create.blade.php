<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD - Tambah Mata Kuliah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* --- BACKGROUND GRADASI WARNA ANIME GINKGO --- */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background: linear-gradient(135deg, #a2c744 0%, #569238 25%, #2272b4 65%, #1e252b 100%);
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        .content-grow {
            flex: 1 0 auto;
            position: relative;
            z-index: 2;
        }

        /* --- ORNAMEN BOLA BERCAHAYA TEMATIK --- */
        .glow-sphere-1 {
            position: fixed;
            width: 350px;
            height: 350px;
            background: linear-gradient(135deg, #c3e267 0%, #a2c744 100%);
            border-radius: 50%;
            top: -80px;
            left: -80px;
            opacity: 0.3;
            filter: blur(60px);
            z-index: 1;
            pointer-events: none;
        }

        .glow-sphere-2 {
            position: fixed;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #3291dc 0%, #1e5485 100%);
            border-radius: 50%;
            bottom: 8%;
            right: -60px;
            opacity: 0.35;
            filter: blur(50px);
            z-index: 1;
            pointer-events: none;
        }

        /* --- NAVBAR GLASSMORPHISM MATA KULIAH --- */
        .navbar {
            background: rgba(30, 37, 43, 0.4) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
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

        .nav-link-custom {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.3s;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            color: #c3e267 !important;
        }

        .nav-link-back {
            color: #c3e267 !important;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .nav-link-back:hover {
            color: #ffffff !important;
            text-shadow: 0 0 10px rgba(195, 226, 103, 0.6);
        }

        .nav-link-siakad {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .dropdown-menu {
            background: rgba(26, 36, 43, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
        }

        .dropdown-item {
            color: rgba(255, 255, 255, 0.85);
        }

        .dropdown-item:hover {
            background: rgba(162, 199, 68, 0.3);
            color: #ffffff;
        }

        /* --- GLASSMORPHISM TABLE CONTAINER MATA KULIAH --- */
        .main-title {
            font-weight: 800;
            text-shadow: 0 4px 10px rgba(0,0,0,0.25);
        }

        .table-form-container {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        /* Styling baris form tabel */
        .table-form td {
            padding: 14px 0;
            vertical-align: middle;
            color: #ffffff;
            font-weight: 500;
            font-size: 0.95rem;
        }

        /* Input Custom bulat penuh mengikuti model ginkgo */
        .form-control-custom {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff !important;
            border-radius: 30px; 
            padding: 11px 22px;
            font-size: 0.95rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .form-control-custom:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(162, 199, 68, 0.6);
            box-shadow: 0 0 10px rgba(162, 199, 68, 0.2);
        }

        .form-control-custom::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        /* --- BUTTONS HIJAU GINKGO --- */
        .btn-add-submit {
            background: linear-gradient(90deg, #a2c744 0%, #569238 100%);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(162, 199, 68, 0.3);
        }

        .btn-add-submit:hover {
            transform: translateY(-2px);
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(162, 199, 68, 0.5);
        }

        .btn-clear-reset {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-weight: 600;
            border-radius: 30px;
            padding: 12px 30px;
            transition: all 0.3s ease;
        }

        .btn-clear-reset:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
        }

        /* --- STICKY FOOTER MATA KULIAH --- */
        footer {
            flex-shrink: 0;
            background: rgba(21, 28, 33, 0.9);
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            color: #ffffff;
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

    <div class="glow-sphere-1"></div>
    <div class="glow-sphere-2"></div>

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
                            <a class="nav-link nav-link-back" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}" style="font-size: 1.05rem; font-weight: 600;">
                                ← Kembali ke Tabel
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-link-siakad active" href="#" role="button" data-bs-toggle="dropdown" style="font-size: 0.95rem; font-weight: 500;">
                                Menu SIAKAD
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Dosen</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">Jurusan</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}">Kelas</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\KRSController::class, 'index']) }}">KRS</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container my-5" style="max-width: 800px;">
            <div class="mb-4 text-center text-md-start">
                <h1 class="main-title mb-1">Tambah Data Mata Kuliah</h1>
                <p class="text-white-50 mb-0">Isi formulir tabel di bawah dengan lengkap dan benar.</p>
            </div>

            <div class="table-form-container">
                <form action="{{ action([App\Http\Controllers\MatakuliahController::class, 'store']) }}" method="post">
                    @csrf
                    
                    <table class="w-100 table-form mb-4">
                        <tr>
                            <td width="25%">Jurusan Id</td>
                            <td width="3%">:</td>
                            <td>
                                <input type="text" name="jurusan_id" size="30" class="form-control-custom" placeholder="Masukkan ID Jurusan" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Kode MK</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="kode_mk" size="30" class="form-control-custom" placeholder="Masukkan kode mata kuliah" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama MK</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nama_mk" size="30" class="form-control-custom" placeholder="Masukkan nama mata kuliah" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Sks</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="sks" size="30" class="form-control-custom" placeholder="Masukkan beban SKS" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Dosen Id</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="dosen_id" size="30" class="form-control-custom" placeholder="Masukkan ID Dosen pengampu" required>
                            </td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-end gap-3 border-top border-white border-opacity-10 pt-4 mt-2">
                        <button type="reset" class="btn btn-clear-reset">Clear</button>
                        <button type="submit" class="btn btn-add-submit">Add</button>
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