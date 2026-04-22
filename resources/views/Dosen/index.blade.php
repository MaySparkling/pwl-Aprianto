<body bgcolor="grey" text="white">
    <table border=1>
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
        </thead>
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
        </tr>
        @endforeach
    </table>
</body>