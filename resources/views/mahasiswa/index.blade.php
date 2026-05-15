<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Table Mahasiswa</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <a class="navbar-brand" href="#">
    <img src="{{ asset('images/ITB-SS.jpg') }}" alt="gambar" width="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Mahasiswa</a><li>
            <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Dosen</a><li>
            <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">Jurusan</a><li>
            <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">Mata Kuliah</a><li>
          </ul>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'create']) }}">
    <input type="button" class="btn btn-primary btn-lg" value="Create">
    </a>

    <br>
    <br>

    

    <table class="table table-dark table-hover" class="table table-hover" >
        <thead>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NIM</th>
            <th>NIDN</th>
            <th>Tempat/Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Tanggal Pembuatan</th>
            <th></th>
        </thead>

        <tbody>
            @foreach ($mahasiswa as $m)
            <tr>
                <td>{{$m->id}}</td> 
                <td>{{$m->fullname}}</td>
                <td>{{$m->NIM}}</td>
                <td>{{$m->NIDN}}</td>
                <td>{{$m->tempat_lahir}}, {{$m->tanggal_lahir}}</td>
                <td>{{$m->alamat}}</td>
                <td>{{$m->created_at}}</td>
                <td>
                    <a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'edit'], [$m->id]) }}">
                    <input type="button" class="btn btn-primary btn-lg" value="Edit">
                    </a>
                    <form class="form" action="{{ action([App\Http\Controllers\MahasiswaController::class, 'destroy'], [$m->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-secondary btn-lg" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</html>