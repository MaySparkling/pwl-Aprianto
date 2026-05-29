<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .table-responsive {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

    <!-- JUDUL -->
    <h1 class="text-center mt-3">Table Mahasiswa</h1>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
        <div class="container-fluid">

            <!-- LOGO -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/ITB-SS.jpg') }}"
                    alt="gambar"
                    width="50">
            </a>

            <!-- TOGGLER -->
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">

                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse"
                id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- HOME -->
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            Home
                        </a>
                    </li>

                    <!-- DROPDOWN -->
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
                            <li>
                                <a class="dropdown-item"
                                    href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}">
                                    Kelas
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>

                <!-- SEARCH -->
                <form class="d-flex" role="search">

                    <input class="form-control me-2"
                        type="search"
                        placeholder="Search">

                    <button class="btn btn-outline-success"
                        type="submit">
                        Search
                    </button>

                </form>

            </div>
        </div>
    </nav>

    <!-- BUTTON CREATE -->
    <div class="container mt-4">

        <a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'create']) }}">
            <input type="button"
                class="btn btn-primary btn-lg"
                value="Create">
        </a>

        <br><br>

        <!-- TABLE -->
        <div class="table-responsive"><table class="table table-white table-hover">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>NIDN</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($mahasiswa as $m)

                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->fullname }}</td>
                    <td>{{ $m->NIM }}</td>
                    <td>{{ $m->NIDN }}</td>
                    <td>{{ $m->tempat_lahir }}, {{ $m->tanggal_lahir }}</td>
                    <td>{{ $m->alamat }}</td>
                    <td>{{ $m->created_at }}</td>

                    <td>

                        <!-- EDIT -->
                        <a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'edit'], [$m->id]) }}">
                            <input type="button"
                                class="btn btn-primary"
                                value="Edit">
                        </a>

                        <!-- DELETE -->
                        <form action="{{ action([App\Http\Controllers\MahasiswaController::class, 'destroy'], [$m->id]) }}"
                            method="post"
                            class="mt-2">

                            @csrf

                            <input type="hidden"
                                name="_method"
                                value="DELETE">

                            <input type="submit"
                                class="btn btn-secondary"
                                value="Delete">

                        </form>

                    </td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>