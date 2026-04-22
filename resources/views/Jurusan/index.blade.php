<body bgcolor="grey" text="white">
    <table border=1>
        <thead>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Kode Jurusan</th>
        </thead>
        @foreach ($jurusan as $j)
        <tr>
            <td>{{$j->id}}</td>
            <td>{{$j->nama_jurusan}}</td>
            <td>{{$j->kode_jurusan}}</td>
        </tr>
        @endforeach
    </table>
</body>