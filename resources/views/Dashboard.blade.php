<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Kampus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #f5f5f5;
        }

        .kampus-img{
            width: 100%;
            height: 500px;
            object-fit: contain;
            border-radius: 10px;
        }

        footer{
            background-color: #212529;
            color: white;
            margin-top: 50px;
            padding: 40px 0;
        }

        .footer-text{
            color: #dcdcdc;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/ITB-SS.jpg') }}" width="75">
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"
            id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>

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
                            href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">
                                Mahasiswa
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                            href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">
                                Dosen
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                            href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">
                                Jurusan
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                            href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">
                                Mata Kuliah
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>

            <form class="d-flex">
                <input class="form-control me-2"
                    type="search"
                    placeholder="Search">

                <button class="btn btn-success"
                    type="submit">
                    Search
                </button>
            </form>

        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">

    <div class="row g-4">

        <div class="col-md-12">
            <img src="{{ asset('images/Website-PMB-26-27.jpg') }}"
                class="kampus-img">
        </div>

        <div class="col-md-12">
            <img src="{{ asset('images/Gedung-ITBSS-scaled.jpg') }}"
                class="kampus-img">
        </div>

    </div>

    <!-- CARD -->
    <div class="card shadow border-0 mt-5">
        <div class="card-body p-4">

            <h3>Campus Location</h3>

            <p class="mt-3">
               <a href="https://www.google.com/maps/place/Institut+Teknologi+%26+Bisnis+Sabda+Setia/@-0.0652418,109.3197479,1086m/data=!3m2!1e3!4b1!4m6!3m5!1s0x2e1d5990c1ed4e5f:0x895c21a5be3c6939!8m2!3d-0.0652418!4d109.3197479!16s%2Fg%2F11nx0k3l04?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D"target="_blank"class="text-decoration-none">
                Jl. Purnama 2, Kecamatan Pontianak Selatan,
                Kota Pontianak, Kalimantan Barat 78121
            </p>

        </div>
    </div>

</div>

<!-- FOOTER -->
<footer>

    <div class="container text-center">

        <img src="https://itbss.ac.id/wp-content/uploads/2021/12/Logo-White.png"
            width="250"
            class="mb-3">

        <p class="footer-text">
            Copyright © 2021 Yayasan Gereja Protestan Kampung Bali.
            All Rights Reserved.
        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>