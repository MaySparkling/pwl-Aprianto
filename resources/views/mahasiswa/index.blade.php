<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD - Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Mengatur halaman dengan flexbox agar footer nempel di bawah tanpa mengambang */
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

        /* Container utama akan mengambil sisa ruang kosong agar mendorong footer ke bawah */
        .content-grow {
            flex: 1 0 auto;
        }

        /* --- STYLING NAVBAR PREMIUM --- */
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

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            transition: all 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: #90caf9 !important;
        }

        .dropdown-menu {
            background: rgba(16, 28, 54, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
        }

        .dropdown-item {
            color: rgba(255, 255, 255, 0.85);
        }

        .dropdown-item:hover {
            background: rgba(144, 202, 249, 0.15);
            color: #90caf9;
        }

        /* Search in navbar */
        .navbar .search-control {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.08);
            color: #fff;
            border-radius: 28px;
            padding: 8px 14px;
            width: 100%;
            max-width: 380px;
        }
        .btn-search {
            border-radius: 28px;
            padding: 7px 14px;
            border: 1px solid rgba(144,202,249,0.35);
            color: #90caf9;
            background: transparent;
        }

        .btn-create {
            background: linear-gradient(90deg, #1e5bb0 0%, #0f3069 100%);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 8px 18px;
            transition: all 0.3s ease;
        }
        .btn-create:hover { transform: translateY(-2px); }

        /* --- TABLE CONTAINER & GLASSMORPHISM --- */
        .main-title {
            font-weight: 800;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .table-responsive-wrapper {
            background: rgba(16, 28, 54, 0.55);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }

        .table {
            color: #e2f0ff !important;
        }

        .table thead th {
            color: #90caf9;
            font-weight: 600;
            border-bottom: 2px solid rgba(255, 255, 255, 0.12);
        }

        .table tbody td {
            vertical-align: middle;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .btn-action-edit {
            background: rgba(144, 202, 249, 0.15);
            border: 1px solid #90caf9;
            color: #90caf9;
            border-radius: 20px;
            padding: 5px 15px;
        }

        .btn-action-edit:hover {
            background: #90caf9;
            color: #07172b;
        }

        .btn-action-delete {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid #ef4444;
            color: #ef4444;
            border-radius: 20px;
            padding: 5px 15px;
        }

        /* --- STICKY FOOTER STYLE --- */
        footer {
            flex-shrink: 0; /* Mencegah footer menyusut */
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

        /* Single-line override: pastikan teks tabel tetap putih dan tidak pudar/hilang.
           Ditempatkan di akhir style agar menimpa aturan lain yang mungkin menurunkan warna/opacity/mix-blend-mode. */
        .table.table-hover, .table.table-hover *, .table-responsive-wrapper .table, .table-responsive-wrapper .table * { color: #ffffff !important; opacity: 1 !important; -webkit-text-fill-color: #ffffff !important; mix-blend-mode: normal !important; filter: none !important; text-shadow: none !important; visibility: visible !important; }
        .table.table-hover a, .table-responsive-wrapper .table a, .table.table-hover a:hover { color: #ffffff !important; -webkit-text-fill-color: #ffffff !important; text-decoration: none !important; }
        .table.table-hover tbody tr:hover, .table.table-hover tbody tr:hover td, .table.table-hover tbody tr:hover td * { color: #ffffff !important; opacity: 1 !important; -webkit-text-fill-color: #ffffff !important; mix-blend-mode: normal !important; filter: none !important; visibility: visible !important; }
    </style>
</head>

<body>

    <div class="content-grow">
        
        <!-- NAVBAR (CTA removed from navbar; CTA kept in content) -->
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <!-- LEFT: logo + brand -->
                <a class="navbar-brand d-flex align-items-center gap-3" href="/">
                    <div class="logo-wrapper">
                        <img src="{{ asset('images/ITB-SS.jpg') }}" alt="Logo ITBSS">
                    </div>
                    <span class="brand-text">Institut Teknologi & Bisnis Sabda Setia</span>
                </a>

                <!-- MOBILE TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                  aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <!-- CENTER + RIGHT -->
                <div class="collapse navbar-collapse" id="mainNavbar">
                  <!-- CENTER: primary nav (mx-auto centers on wide screens) -->
                  <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="siakadMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu SIAKAD
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="siakadMenu">
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Data Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Data Dosen</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">Data Jurusan</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">Mata Kuliah</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}">Kelas</a></li>
                      </ul>
                    </li>
                  </ul>

                  <!-- RIGHT: search only -->
                  <div class="d-flex align-items-center gap-2">
                    <form class="d-flex me-2" role="search" action="#" method="get" style="min-width:220px;">
                      <input class="form-control search-control" name="q" type="search" placeholder="Cari nama/NIM..." aria-label="Search">
                      <button class="btn btn-search ms-2" type="submit">Search</button>
                    </form>
                  </div>
                </div>
            </div>
        </nav>

        <div class="container my-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                <div>
                    <h1 class="main-title mb-1">Daftar Mahasiswa</h1>
                    <p class="text-white-50 mb-0">Kelola dan lihat seluruh data mahasiswa aktif </p>
                </div>
                <div>
                    <!-- Prominent CTA inside the page content -->
                    <a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'create']) }}" class="btn btn-create btn-lg">
                        + Tambah Mahasiswa
                    </a>
                </div>
            </div>

            <div class="table-responsive-wrapper">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Lengkap</th>
                                <th>NIM</th>
                                <th>NISN</th>
                                <th>Tempat/Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Tanggal Pembuatan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $m)
                            <tr>
                                <td>{{ $m->id }}</td>
                                <td class="fw-semibold text-white">{{ $m->fullname }}</td>
                                <td><span class="badge bg-secondary text-white px-2 py-1">{{ $m->NIM }}</span></td>
                                <td>{{ $m->NISN ?? '-' }}</td>
                                <td>{{ $m->tempat_lahir }}, {{ $m->tanggal_lahir }}</td>
                                <td>{{ $m->alamat }}</td>
                                <td>{{ $m->created_at }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'edit'], [$m->id]) }}" class="btn btn-action-edit">Edit</a>
                                        <form action="{{ action([App\Http\Controllers\MahasiswaController::class, 'destroy'], [$m->id]) }}" method="post" class="m-0">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-action-delete">Delete</button>
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
                Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>