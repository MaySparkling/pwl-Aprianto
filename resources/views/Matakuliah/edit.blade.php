<html>
        <form action="{{ action([App\Http\Controllers\MatakuliahController::class, 'update'], [$matakuliah->id]) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <table>
            @csrf
            <tr>
                <td>Jurusan Id</td>
                <td>:</td>
                <td><input type="text" name="jurusan_id" value="{{$matakuliah->jurusan_id}}" size="30"></td>
            </tr>
             <tr>
                <td>Kode MK</td>
                <td>:</td>
                <td><input type="text" name="kode_mk" value="{{$matakuliah->kode_mk}}" size="30"></td>
            </tr>
             <tr>
                <td>Nama MK</td>
                <td>:</td>
                <td><input type="text" name="nama_mk value="{{$matakuliah->nama_mk}}" size="30"></td>
            </tr>
            <tr>
                <td>Sks</td>
                <td>:</td>
                <td><input type="text" name="sks" value="{{$matakuliah->sks}}" size="30"></td>
            </tr>
            <tr>
                <td>Dosen Id</td>
                <td>:</td>
                <td><input type="text" name="dosen_id" value="{{$matakuliah->dosen_id}}" size="30"></td>
            </tr>
        </table>
        <button type="submit">Add</button>
        <button type="reset">Clear</button>
    </form>
    </body>
</html>