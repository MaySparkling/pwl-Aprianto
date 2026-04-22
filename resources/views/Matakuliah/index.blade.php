<body bgcolor="grey" text="white">
    <table border=1>
        <thead>
            <th>No</th>
            <th>Jurusan Id</th>
            <th>Kode MK</th>
            <th>Nama Mk</th>
            <th>Sks</th>
            <th>Dosen Id</th>
            <th>Tanggal Pembuatan</th>
        </thead>
        @foreach ($matakuliah as $k)
        <tr>
            <td>{{$k->id}}</td>
            <td>{{$k->jurusan_id}}</td>
            <td>{{$k->kode_mk}}</td>
            <td>{{$k->nama_mk}}</td>
            <td>{{$k->sks}}</td>
            <td>{{$k->dosen_id}}</td>
            <td>{{$k->created_at}}</td>
        </tr>
        @endforeach
    </table>
</body>