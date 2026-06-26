<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Kampus ITBSS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .kampus-img{
            width:100%;
            height:500px;
            object-fit:cover;
            border-radius:10px;
        }

        footer{
            background:#212529;
            color:white;
            margin-top:60px;
            padding:40px 0;
        }

        .footer-text{
            color:#d6d6d6;
        }

        .welcome-card{
            background:linear-gradient(90deg,#0d6efd,#0b5ed7);
            color:white;
            border-radius:10px;
        }
    </style>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/ITB-SS.jpg') }}" width="70">
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link active"
                       href="{{ route('dashboard') }}">
                        Home
                    </a>
                </li>

                @if($user->role != 'guest')

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">

                        Menu

                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="{{ action([App\Http\Controllers\MahasiswaController::class,'index']) }}">
                                Mahasiswa
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ action([App\Http\Controllers\DosenController::class,'index']) }}">
                                Dosen
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ action([App\Http\Controllers\JurusanController::class,'index']) }}">
                                Jurusan
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ action([App\Http\Controllers\MatakuliahController::class,'index']) }}">
                                Mata Kuliah
                            </a>
                        </li>

                    </ul>

                </li>

                @endif

                @if($user->role == 'mahasiswa')

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ action([App\Http\Controllers\KelasController::class,'index']) }}">
                        Kelas
                    </a>
                </li>

                @endif

            </ul>

            <span class="navbar-text">

                Selamat Datang,
                <strong>{{ $user->name }}</strong>

                ({{ ucfirst($user->role) }})

            </span>

        </div>

    </div>
</nav>

<div class="container mt-4">

    <!-- Welcome -->
    <div class="card welcome-card shadow border-0 mb-4">
        <div class="card-body">

            <h2>Selamat Datang, {{ $user->name }}</h2>

            <p class="mb-0">
                Sistem Informasi Akademik Institut Teknologi & Bisnis Sabda Setia
            </p>

        </div>
    </div>

    <!-- Banner -->

    <div class="row">

        <div class="col-md-12 mb-4">

            <img src="{{ asset('images/Website-PMB-26-27.jpg') }}"
                 class="kampus-img">

        </div>

        <div class="col-md-12">

            <img src="{{ asset('images/Gedung-ITBSS-scaled.jpg') }}"
                 class="kampus-img">

        </div>

    </div>

    <!-- Campus -->

    <div class="card shadow border-0 mt-5">

        <div class="card-body">

            <h3>Campus Location</h3>

            <p>

                <a href="https://www.google.com/maps/place/Institut+Teknologi+%26+Bisnis+Sabda+Setia/"
                   target="_blank"
                   class="text-decoration-none">

                    Jl. Purnama II,
                    Pontianak Selatan,
                    Kota Pontianak,
                    Kalimantan Barat

                </a>

            </p>

        </div>

    </div>

</div>

<footer>

    <div class="container text-center">

        <img src="{{ asset('images/logo-white.png') }}"
             width="220">

        <p class="footer-text mt-3">

            Copyright © 2026
            Institut Teknologi & Bisnis Sabda Setia

        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>