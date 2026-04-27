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

    
    <a href="{{ action([App\Http\Controllers\MatakuliahController::class, 'create']) }}">
    <input type="button" class="btn btn-primary btn-lg" value="Create">
    </a>

    <br>
    <br>

    

    <table class="table table-dark table-hover" class="table table-hover" >
        <thead>
            <th>No</th>
            <th>Jurusan Id</th>
            <th>Kode MK</th>
            <th>Nama Mk</th>
            <th>Sks</th>
            <th>Dosen Id</th>
            <th>Tanggal Pembuatan</th>
            <th></th>
        </thead>

        <tbody>
            @foreach ($mahasiswa as $m)
            <tr>
            <td>{{$k->id}}</td>
            <td>{{$k->jurusan_id}}</td>
            <td>{{$k->kode_mk}}</td>
            <td>{{$k->nama_mk}}</td>
            <td>{{$k->sks}}</td>
            <td>{{$k->dosen_id}}</td>
            <td>{{$k->created_at}}</td>
                <td>
                    <a href="{{ action([App\Http\Controllers\MatakuliahController::class, 'edit'], [$k->id]) }}">
                    <input type="button" class="btn btn-primary btn-lg" value="Edit">
                    </a>
                    <form class="form" action="{{ action([App\Http\Controllers\MatakuliahController::class, 'destroy'], [$k->id]) }}" method="post">
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