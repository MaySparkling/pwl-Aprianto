<a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'create']) }}">
<input type="button" value="Create">
</a>

<table border=1>
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
                <input type="button" value="Edit">
                </a>
                <form class="form" action="{{ action([App\Http\Controllers\MahasiswaController::class, 'destroy'], [$m->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>