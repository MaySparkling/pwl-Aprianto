<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIAKAD - Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* --- BACKGROUND GRADASI WARNA VOLKANIK SESUAI HALAMAN CREATE KELAS --- */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            /* Menggunakan racikan gradasi murni tanpa animasi pudar agar warnanya tetap stand out */
            background: linear-gradient(135deg, #3a0303 0%, #b21f1f 25%, #f15b22 65%, #fbb03b 100%);
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

        /* --- NAVBAR GLASSMORPHISM MENYESUAIKAN TEMA COAL & FIRE --- */
        .navbar {
            background: rgba(26, 5, 0, 0.4) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
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
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: #fbb03b !important; /* Sorotan Kuning Emas Cerah */
        }

        .dropdown-menu {
            background: rgba(41, 10, 5, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
        }

        .dropdown-item {
            color: rgba(255, 255, 255, 0.9);
        }

        .dropdown-item:hover {
            background: rgba(241, 91, 34, 0.3);
            color: #ffffff;
        }

        /* Search Control Bar */
        .navbar .search-control {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            border-radius: 28px;
            padding: 8px 14px;
            width: 100%;
            max-width: 380px;
        }

        .navbar .search-control::placeholder {
            color: #ffffff !important; /* Diubah menjadi putih pekat */
        }

        .btn-search {
            border-radius: 28px;
            padding: 7px 14px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #ffffff;
            background: transparent;
        }

        .btn-search:hover {
            background: #ffffff;
            color: #f15b22;
        }

        /* --- BUTTON CREATE --- */
        .btn-create {
            background: linear-gradient(90deg, #fbb03b, #f15b22);
            border: 1px solid rgba(255, 255, 255, 0.2);
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
            box-shadow: 0 4px 15px rgba(241, 91, 34, 0.5);
        }

        /* --- TABLE RESPONSIVE WRAPPER (DARK GLASSMORPHISM) --- */
        .main-title {
            font-weight: 800;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .table-responsive-wrapper {
            background: rgba(255, 255, 255, 0.08); /* Sedikit disesuaikan dengan form create */
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
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

        /* Custom Badge Komponen (Kuning Terang) */
        .badge-custom {
            background: rgba(253, 203, 110, 0.2);
            border: 1px solid rgba(253, 203, 110, 0.5);
            color: #ffeaa7;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Badge Ruangan (Oranye Hangat) */
        .badge-room {
            background: rgba(241, 91, 34, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #ffffff;
            padding: 5px 12px;
            border-radius: 6px;
            font-weight: 600;
        }

        /* Tombol Aksi Hapus */
        .btn-table-delete {
            background: rgba(255, 76, 76, 0.25);
            border: 1px solid rgba(255, 76, 76, 0.5);
            color: #ffcccc;
            border-radius: 20px;
            padding: 5px 15px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-table-delete:hover {
            background: #ff4c4c;
            color: #ffffff;
            border-color: #ff4c4c;
            box-shadow: 0 4px 12px rgba(255, 76, 76, 0.4);
        }

        /* --- FOOTER --- */
        footer {
            flex-shrink: 0;
            background: rgba(26, 5, 0, 0.85);
            backdrop-filter: blur(5px);
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

    <div class="content-grow">
        
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-3" href="/">
                    <div class="logo-wrapper">
                        <img src="{{ asset('images/ITB-SS.jpg') }}" alt="Logo ITBSS" />
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
                            <input class="form-control search-control" name="q" type="search" placeholder="Cari kelas aktif..." aria-label="Search" />
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
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">Mata Kuliah</a></li>
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
                    <h1 class="main-title mb-1">Tabel Kelas</h1>
                    <p class="text-white mb-0">Kelola jadwal perkuliahan, alokasi ruangan, dan tahun ajaran aktif.</p>
                </div>
                <div>
                    <a href="{{ action([App\Http\Controllers\KelasController::class, 'create']) }}" class="btn btn-create btn-lg">
                        + Tambah Kelas
                    </a>
                </div>
            </div>

            <div class="table-responsive-wrapper">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="12%">Kode Kelas</th>
                                <th width="18%">Nama Dosen</th>
                                <th width="20%">Nama Mata Kuliah</th>
                                <th width="12%">Ruang Kelas</th>
                                <th width="10%">Hari</th>
                                <th width="10%">Jam</th>
                                <th width="13%">Tahun Ajaran</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelas as $c)
                            <tr>
                                <td class="fw-bold text-white">{{ $c->id }}</td>
                                <td><span class="badge-custom">{{ $c->kode_kelas }}</span></td>
                                <td class="fw-semibold text-white">{{ $c->dosen->Fullname }}</td>
                                <td style="color: #ffeaa7 !important;" class="fw-bold">{{ $c->mata_kuliah->Nama_Mata_Kuliah }}</td>
                                <td><span class="badge-room">{{ $c->ruang_kelas }}</span></td>
                                <td class="text-white">{{ ucfirst($c->hari) }}</td>
                                <td class="text-white">{{ $c->jam }}</td>
                                <td><span class="text-white">{{ $c->tahun_ajaran }}</span></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ route('kelas.destroy', $c->id) }}" method="POST" class="m-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-table-delete">Hapus Kelas</button>
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
                <img src="{{ asset('images/Logo-ITBSS.png') }}" alt="Logo ITBSS Footer" />
            </div>
            <p class="mb-0 small text-white">
                Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia. All rights reserved - Aprianto.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>