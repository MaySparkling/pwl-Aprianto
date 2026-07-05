<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD - Data Jurusan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* --- BACKGROUND GRADASI SENJA ESTETIK --- */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 30%, #63385f 60%, #cf6372 100%);
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

        /* --- ORNAMEN BOLA BERCAHAYA --- */
        .glow-sphere-1 {
            position: fixed;
            width: 350px;
            height: 350px;
            background: linear-gradient(135deg, #e35d5b 0%, #e53935 100%);
            border-radius: 50%;
            top: -80px;
            left: -80px;
            opacity: 0.35;
            filter: blur(50px);
            z-index: 1;
            pointer-events: none;
        }

        .glow-sphere-2 {
            position: fixed;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #da4453 0%, #89216b 100%);
            border-radius: 50%;
            bottom: 8%;
            right: -60px;
            opacity: 0.4;
            filter: blur(40px);
            z-index: 1;
            pointer-events: none;
        }

        /* --- NAVBAR GLASSMORPHISM SESUAI ACUAN DOSEN --- */
        .navbar {
            background: rgba(24, 40, 72, 0.4) !important;
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

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            transition: all 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: #ffb3bd !important;
        }

        .dropdown-menu {
            background: rgba(43, 27, 54, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
        }

        .dropdown-item {
            color: rgba(255, 255, 255, 0.85);
        }

        .dropdown-item:hover {
            background: rgba(207, 99, 114, 0.3);
            color: #ffffff;
        }

        /* Search in navbar */
        .navbar .search-control {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            color: #fff;
            border-radius: 28px;
            padding: 8px 14px;
            width: 100%;
            max-width: 380px;
        }

        .navbar .search-control::placeholder {
            color: rgba(255, 255, 255, 0.75) !important;
            opacity: 1;
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
            color: #182848;
        }

        /* --- BUTTON CREATE NEW JURUSAN --- */
        .btn-create {
            background: linear-gradient(90deg, #cf6372 0%, #a14467 100%);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 8px 18px;
            transition: all 0.3s ease;
        }
        .btn-create:hover { 
            transform: translateY(-2px); 
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(207, 99, 114, 0.4);
        }

        /* --- TABLE CONTAINER GLASSMORPHISM --- */
        .main-title {
            font-weight: 800;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .table-responsive-wrapper {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
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
            border-bottom: 2px solid rgba(255, 255, 255, 0.15);
            background-color: transparent;
        }

        .table tbody td {
            vertical-align: middle;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            color: #ffffff !important;
            background-color: transparent;
        }
        
        .table-hover tbody tr:hover td {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.07) !important;
        }

        /* Aksi Buttons */
        .btn-table-edit {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
            border-radius: 20px;
            padding: 5px 15px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-table-edit:hover {
            background: #ffffff;
            color: #182848;
        }

        .btn-table-delete {
            background: rgba(255, 75, 92, 0.15);
            border: 1px solid rgba(255, 75, 92, 0.35);
            color: #ffb3bd;
            border-radius: 20px;
            padding: 5px 15px;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-table-delete:hover {
            background: #ff4b5c;
            color: #ffffff;
        }

        /* --- STICKY FOOTER --- */
        footer {
            flex-shrink: 0;
            background: rgba(18, 24, 38, 0.85);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
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
                            <input class="form-control search-control" name="q" type="search" placeholder="Cari jurusan..." aria-label="Search">
                            <button class="btn btn-search ms-2" type="submit">Search</button>
                        </form>

                        <div style="width: 1px; height: 25px; background: rgba(255,255,255,0.2);"></div>

                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="siakadMenu" role="button" data-bs-toggle="dropdown">
                                Menu SIAKAD
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="siakadMenu">
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Dosen</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">Mata Kuliah</a></li>
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
                    <h1 class="main-title mb-1">Daftar Jurusan</h1>
                    <p class="text-white-50 mb-0">Kelola informasi seluruh program studi data jurusan kampus.</p>
                </div>
                <div>
                    <a href="{{ action([App\Http\Controllers\JurusanController::class, 'create']) }}" class="btn btn-create btn-lg">
                        + Tambah Jurusan
                    </a>
                </div>
            </div>

            <div class="table-responsive-wrapper">
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="8%">No</th>
                                <th>Nama Jurusan</th>
                                <th>Kode Jurusan</th>
                                <th>Tanggal Pembuatan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jurusan as $j)
                            <tr>
                                <td class="fw-bold">{{ $j->id }}</td>
                                <td class="fw-semibold">{{ $j->nama_jurusan }}</td>
                                <td><span class="badge bg-white bg-opacity-25 text-white px-3 py-2 rounded-pill">{{ $j->kode_jurusan }}</span></td>
                                <td>{{ $j->created_at }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ action([App\Http\Controllers\JurusanController::class, 'edit'], [$j->id]) }}">
                                            <input type="button" class="btn btn-table-edit" value="Edit">
                                        </a>

                                        <form action="{{ action([App\Http\Controllers\JurusanController::class, 'destroy'], [$j->id]) }}" method="post" class="m-0">
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