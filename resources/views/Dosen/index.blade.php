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

    
    <a href="{{ action([App\Http\Controllers\DosenController::class, 'create']) }}">
    <input type="button" class="btn btn-primary btn-lg" value="Create">
    </a>

    <br>
    <br>

    

    <table class="table table-dark table-hover" class="table table-hover" >
        <thead>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NIP</th>
            <th>NIDN</th>
            <th>Pendidikan Terakhir</th>
            <th>Jurusan Id</th>
            <th>Tempat/Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Tanggal Pembuatan</th>
            <th></th>
        </thead>

        <tbody>
            @foreach ($dosen as $d)
            <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->fullname}}</td>
            <td>{{$d->NIP}}</td>
            <td>{{$d->NIDN}}</td>
            <td>{{$d->pendidikan_terakhir}}</td>
            <td>{{$d->jurusan_id}}</td>
            <td>{{$d->tempat_lahir}},{{$d->tanggal_lahir}}</td>
            <td>{{$d->alamat}}</td>
                <td>{{$d->created_at}}</td>
                <td>
                    <a href="{{ action([App\Http\Controllers\DosenController::class, 'edit'], [$d->id]) }}">
                    <input type="button" class="btn btn-primary btn-lg" value="Edit">
                    </a>
                    <form class="form" action="{{ action([App\Http\Controllers\DosenController::class, 'destroy'], [$d->id]) }}" method="post">
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

<body bgcolor="grey" text="white">
    <table border=1>
        <thead>
            
        </thead>
        @foreach ($dosen as $d)
        <tr>
           
        </tr>
        @endforeach
    </table>
</body>