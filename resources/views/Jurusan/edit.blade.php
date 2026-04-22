<html>
        <form action="{{ action([App\Http\Controllers\JurusanController::class, 'update'], [$jurusan->id]) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <table>
            @csrf
            <tr>
                <td>Nama Jurusan</td>
                <td>:</td>
                <td><input type="text" name="nama_jurusan" value="{{$jurusan->nama_jurusan}}" size="30"></td>
            </tr>
             <tr>
                <td>Nomor Induk Pengajar</td>
                <td>:</td>
                <td><input type="text" name="kode_jurusan" value="{{$jurusan->kode_jurusan}}" size="30"></td>
            </tr>
        </table>
        <button type="submit">Add</button>
        <button type="reset">Clear</button>
    </form>
    </body>
</html>