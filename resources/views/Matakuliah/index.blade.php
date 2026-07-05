<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD - Data Mata Kuliah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* --- BACKGROUND GRADASI WARNA ANIME GINKGO --- */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            /* Perpaduan Hijau Daun, Langit Biru, dan Aksen Gelap Bangunan */
            background: linear-gradient(135deg, #a2c744 0%, #569238 25%, #2272b4 65%, #1e252b 100%);
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        /* Pembungkus utama pendorong footer */
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

        /* --- NAVBAR GLASSMORPHISM SESUAI ACUAN DOSEN --- */
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

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: #c3e267 !important; /* Warna highlight hijau daun muda */
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

        /* Search di Navbar */
        .navbar .search-control {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            border-radius: 28px;
            padding: 8px 14px;
            width: 100%;
            max-width: 380px;
        }

        .navbar .search-control::placeholder {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        .btn-search {
            border-radius: 28px;
            padding: 7px 14px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: #ffffff;
            background: transparent;
        }

        .btn-search:hover {
            background: #ffffff;
            color: #2272b4;
        }

        /* --- BUTTON CREATE SEJAJAR DI ATAS (ACUAN DOSEN) --- */
        .btn-create {
            background: linear-gradient(90deg, #a2c744 0%, #569238 100%);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 8px 18px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .btn-create:hover { 
            transform: translateY(-2px); 
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(162, 199, 68, 0.4);
        }

        /* --- TABLE CONTAINER GLASSMORPHISM --- */
        .main-title {
            font-weight: 800;
            text-shadow: 0 4px 10px rgba(0,0,0,0.25);
        }

        .table-responsive-wrapper {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .table {
            color: #ffffff !important; 
        }

        .table thead th {
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
            background-color: transparent;
            padding: 14px;
        }

        .table tbody td {
            vertical-align: middle;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff !important;
            background-color: transparent;
            padding: 14px;
        }
        
        .table-hover tbody tr:hover td {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.08) !important;
        }

        /* Custom Badge */
        .badge-custom {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Tombol Aksi */
        .btn-table-edit {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.35);
            color: #ffffff;
            border-radius: 20px;
            padding: 5px 15px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-table-edit:hover {
            background: #ffffff;
            color: #2272b4;
        }

        .btn-table-delete {
            background: rgba(235, 87, 87, 0.2);
            border: 1px solid rgba(235, 87, 87, 0.4);
            color: #ffcbd1;
            border-radius: 20px;
            padding: 5px 15px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-table-delete:hover {
            background: #eb5757;
            color: #ffffff;
            border-color: #eb5757;
        }

        /* --- STICKY FOOTER --- */
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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="/">Home</a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-3">
                        <form class="d-flex" role="search" action="#" method="get">
                            <input class="form-control search-control" name="q" type="search" placeholder="Cari mata kuliah..." aria-label="Search">
                            <button class="btn btn-search ms-2" type="submit">Search</button>
                        </form>

                        <div style="width: 1px; height: 25px; background: rgba(255,255,255,0.25);"></div>

                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="siakadMenu" role="button" data-bs-toggle="dropdown">
                                Menu SIAKAD
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="siakadMenu">
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Dosen</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">Jurusan</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}">Kelas</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\KRSController::class, 'index']) }}">KRS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container my-5">
            
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                <div>
                    <h1 class="main-title mb-1">Table Mata Kuliah</h1>
                    <p class="text-white-50 mb-0">Kelola kurikulum, beban data SKS, dan relasi dosen pengampu aktif.</p>
                </div>
                <div>
                    <a href="{{ action([App\Http\Controllers\MatakuliahController::class, 'create']) }}" class="btn btn-create btn-lg">
                        + Tambah Mata Kuliah
                    </a>
                </div>
            </div>

            <div class="table-responsive-wrapper">
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="6%">No</th>
                                <th width="15%">Nama MK</th>
                                <th width="12%">Kode MK</th>
                                <th width="8%">SKS</th>
                                <th width="12%">Jurusan ID</th>
                                <th width="12%">Dosen ID</th>
                                <th width="18%">Tanggal Pembuatan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mata_kuliah as $k)
                            <tr>
                                <td class="fw-bold">{{ $k->id }}</td>
                                <td class="fw-semibold text-warning" style="color: #edf794 !important;">{{ $k->nama_mk }}</td>
                                <td><span class="badge-custom">{{ $k->kode_mk }}</span></td>
                                <td class="fw-bold text-info" style="color: #aae2ff !important;">{{ $k->sks }} <span class="small text-white-50">SKS</span></td>
                                <td><span class="text-white-50">#{{ $k->jurusan_id }}</span></td>
                                <td><span class="text-white-50">#{{ $k->dosen_id }}</span></td>
                                <td>{{ $k->created_at }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ action([App\Http\Controllers\MatakuliahController::class, 'edit'], [$k->id]) }}">
                                            <input type="button" class="btn btn-table-edit" value="Edit">
                                        </a>

                                        <form action="{{ action([App\Http\Controllers\MatakuliahController::class, 'destroy'], [$k->id]) }}" method="post" class="m-0">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" class="btn btn-table-delete" value="Delete">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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