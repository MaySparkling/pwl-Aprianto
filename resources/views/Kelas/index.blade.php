<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Kelas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Kelas</h2>

    <a href="{{ route('kelas.create') }}"
       class="btn btn-primary mb-3">

        Tambah Kelas
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Kode Kelas</th>
                <th>Nama Dosen</th>
                <th>Nama Mata Kuliah</th>
                <th>Ruang Kelas</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Tahun Ajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach($kelas as $c)

            <tr>
                <td>{{ $c->kode_kelas }}</td>

                <td>{{ $c->kode_dosen }}</td>

                <td>{{ $c->kode_mata_kuliah }}</td>

                <td>{{ $c->ruang_kelas }}</td>

                <td>{{ ucfirst($c->hari) }}</td>

                <td>{{ $c->jam }}</td>

                <td>{{ $c->tahun_ajaran }}</td>

                <td>

                    <form action="{{ route('kelas.destroy', $c->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm">

                            Hapus Kelas
                        </button>

                    </form>

                </td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>