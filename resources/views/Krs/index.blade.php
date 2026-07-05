<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD - Data KRS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* --- BACKGROUND GRADASI WARNA SUNSET ANIME (RAMAH MATA) --- */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background: linear-gradient(135deg, #801a1a 0%, #b34724 35%, #d97d24 70%, #fadc60 100%);
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            color: #ffebe6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        .content-grow {
            flex: 1 0 auto;
            position: relative;
            z-index: 2;
        }

        /* --- NAVBAR GLASSMORPHISM --- */
        .navbar {
            background: rgba(40, 15, 15, 0.45) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            padding: 12px 0;
            /* Memastikan menu dropdown berada di lapisan paling atas */
            position: relative;
            z-index: 9999 !important;
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
            letter-spacing: 0.3px;
            color: #ffffff;
            text-shadow: 0 1px 4px rgba(0,0,0,0.4);
        }

        .nav-link-custom {
            color: rgba(255, 235, 230, 0.85) !important;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.3s;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            color: #fadc60 !important;
        }

        /* --- SOLUSI DROPDOWN KETIMPA (Z-INDEX & STYLING) --- */
        .dropdown-menu {
            background: rgba(45, 15, 15, 0.98) !important;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(250, 220, 96, 0.25);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            position: absolute !important;
            z-index: 99999 !important;
        }

        .dropdown-item {
            color: rgba(255, 235, 230, 0.9);
            font-weight: 500;
            padding: 10px 20px;
        }

        .dropdown-item:hover {
            background: rgba(250, 220, 96, 0.2);
            color: #fadc60;
        }

        /* --- LIVE SEARCH BAR BERSANDINGAN DENGAN MENU SIAKAD --- */
        .search-control-custom {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #ffffff !important;
            border-radius: 30px 0 0 30px;
            padding: 8px 18px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            width: 200px;
        }

        .search-control-custom:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: #fadc60;
            box-shadow: none;
        }

        .search-control-custom::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .btn-search-custom {
            background: #b34724;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-left: none;
            border-radius: 0 30px 30px 0;
            padding: 8px 18px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-search-custom:hover {
            background: #d97d24;
            color: #ffffff;
        }

        /* --- CONTAINER GLASSMORPHISM SENJA (REDUCE GLARE) --- */
        .table-container {
            background: rgba(45, 15, 15, 0.35);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 35px;
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        .main-title {
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .sub-title-text {
            color: rgba(255, 235, 230, 0.7) !important;
        }

        /* --- BUTTON CREATE --- */
        .btn-create-custom {
            background: linear-gradient(135deg, #d97d24 0%, #b34724 100%);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 10px 28px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(217, 125, 36, 0.3);
        }

        .btn-create-custom:hover {
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 6px 20px rgba(217, 125, 36, 0.5);
        }

        /* --- TABLE INTERFACE COMPONENT --- */
        .table-responsive {
            border-radius: 16px;
            overflow: visible; /* Diubah agar tidak memotong elemen di dalamnya */
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.15);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: rgba(131, 38, 38, 0.85) !important;
            color: #fadc60 !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.6px;
            padding: 16px;
            border: none;
            text-align: center;
        }

        .table tbody td {
            padding: 16px;
            vertical-align: middle;
            color: #ffebe6;
            font-weight: 500;
            font-size: 0.95rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            background: transparent !important;
            text-align: center;
        }

        .table-hover tbody tr:hover td {
            background: rgba(255, 255, 255, 0.08) !important;
            color: #fadc60;
        }

        /* --- ACTION BUTTONS INSIDE TABLE --- */
        .btn-action-edit {
            background: rgba(250, 220, 96, 0.15);
            color: #fadc60;
            border: 1px solid rgba(250, 220, 96, 0.3);
            font-weight: 600;
            border-radius: 20px;
            padding: 5px 16px;
            font-size: 0.85rem;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-action-edit:hover {
            background: #fadc60;
            color: #451010;
        }

        .btn-action-delete {
            background: rgba(255, 255, 255, 0.08);
            color: #ff8080;
            border: 1px solid rgba(255, 128, 128, 0.2);
            font-weight: 600;
            border-radius: 20px;
            padding: 5px 16px;
            font-size: 0.85rem;
            transition: all 0.2s;
        }

        .btn-action-delete:hover {
            background: #ff8080;
            color: #ffffff;
        }

        /* --- STICKY FOOTER --- */
        footer {
            flex-shrink: 0;
            background: rgba(30, 10, 10, 0.8);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 235, 230, 0.6);
            padding: 15px 0;
            width: 100%;
        }

        .footer-logo-container {
            display: flex;
            align-items: center;
            height: 38px;
        }

        .footer-logo-container img {
            height: 100%;
            width: auto;
            border-radius: 50%; /* Membuat logo bulat agar serasi dengan atas */
            background: #ffffff;
            padding: 2px;
        }
    </style>
</head>

<body>

    <div class="content-grow">

        <nav class="navbar navbar-expand-lg shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-3" href="{{ url('/') }}">
                    <div class="logo-wrapper">
                        <img src="{{ asset('images/ITB-SS.jpg') }}" alt="Logo ITBSS">
                    </div>
                    <span class="brand-text">Institut Teknologi & Bisnis Sabda Setia</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center gap-3">
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom active" href="{{ url('/') }}">Home</a>
                        </li>
                        
                        <li class="nav-item">
                            <form class="d-flex" role="search">
                                <input class="form-control search-control-custom" type="search" placeholder="Cari data KRS..." aria-label="Search">
                                <button class="btn btn-search-custom" type="submit">Search</button>
                            </form>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-link-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu SIAKAD
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Dosen</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">Jurusan</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">Mata Kuliah</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}">Kelas</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container my-5">
            
            <div class="table-container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <h1 class="main-title mb-1">Daftar Isian KRS</h1>
                        <p class="sub-title-text mb-0">Kelola informasi Kartu Rencana Studi Mahasiswa di sini.</p>
                    </div>
                    <div>
                        <a href="{{ action([App\Http\Controllers\KRSController::class, 'create']) }}">
                            <button type="button" class="btn btn-create-custom">
                                + Create New KRS
                            </button>
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="6%">No</th>
                                <th>Kode Mahasiswa</th>
                                <th>Tahun Ajaran</th>
                                <th width="12%">Semester</th>
                                <th width="15%">Total SKS</th>
                                <th>Jurusan ID</th>
                                <th width="18%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($krs as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->kode_mahasiswa }}</td>
                                <td>{{ $r->tahun_ajaran }}</td>
                                <td>{{ $r->semester }}</td>
                                <td>{{ $r->status }}</td>
                                <td>{{ $r->total_sks_id }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ action([App\Http\Controllers\KRSController::class, 'edit'], [$r->id]) }}" class="btn-action-edit">
                                            Edit
                                        </a>

                                        <form action="{{ action([App\Http\Controllers\KRSController::class, 'destroy'], [$r->id]) }}" method="post" class="m-0">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn-action-delete">
                                                Delete
                                            </button>
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
                <img src="{{ asset('images/ITB-SS.jpg') }}" alt="Logo ITBSS Footer">
            </div>
            <p class="mb-0 small text-light opacity-75">
                Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia. All rights reserved - Aprianto.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>