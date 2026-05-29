<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <title>Mata Kuliah</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body{
            background-color: #f5f5f5;
        }

        .table-container{
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>

</head>

<body>

    <!-- JUDUL -->
    <h1 class="text-center mt-4">
        Table Mata Kuliah
    </h1>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">

        <div class="container-fluid">

            <!-- LOGO -->
            <a class="navbar-brand"
                href="{{ url('/') }}">

                <img src="{{ asset('images/ITB-SS.jpg') }}"
                    alt="gambar"
                    width="50">

            </a>

            <!-- TOGGLER -->
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse"
                id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- HOME -->
                    <li class="nav-item">

                        <a class="nav-link active"
                            href="{{ url('/') }}">

                            Home

                        </a>

                    </li>

                    <!-- DROPDOWN -->
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

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
                <form class="d-flex"
                    role="search">

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

    <!-- CONTENT -->
    <div class="container mt-4">

        <div class="table-container">

            <!-- BUTTON CREATE -->
            <a href="{{ action([App\Http\Controllers\MatakuliahController::class, 'create']) }}">

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
                        <th>Jurusan ID</th>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th>SKS</th>
                        <th>Dosen ID</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($mata_kuliah as $k)

                    <tr>

                        <td>{{ $k->id }}</td>
                        <td>{{ $k->jurusan_id }}</td>
                        <td>{{ $k->kode_mk }}</td>
                        <td>{{ $k->nama_mk }}</td>
                        <td>{{ $k->sks }}</td>
                        <td>{{ $k->dosen_id }}</td>
                        <td>{{ $k->created_at }}</td>

                        <td>

                            <!-- EDIT -->
                            <a href="{{ action([App\Http\Controllers\MatakuliahController::class, 'edit'], [$k->id]) }}">

                                <input type="button"
                                    class="btn btn-primary mb-2"
                                    value="Edit">

                            </a>

                            <!-- DELETE -->
                            <form action="{{ action([App\Http\Controllers\MatakuliahController::class, 'destroy'], [$k->id]) }}"
                                method="post">

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

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>