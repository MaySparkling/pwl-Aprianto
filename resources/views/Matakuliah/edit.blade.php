<html>
        <form action="{{ action([App\Http\Controllers\MatakuliahController::class, 'update'], [$mata_kuliah->id]) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <table>
            @csrf
            <tr>
                <td>Jurusan Id</td>
                <td>:</td>
                <td><input type="text" name="jurusan_id" value="{{$mata_kuliah->jurusan_id}}" size="30"></td>
            </tr>
             <tr>
                <td>Kode MK</td>
                <td>:</td>
                <td><input type="text" name="kode_mk" value="{{$mata_kuliah->kode_mk}}" size="30"></td>
            </tr>
             <tr>
                <td>Nama MK</td>
                <td>:</td>
                <td><input type="text" name="nama_mk value="{{$mata_kuliah->nama_mk}}" size="30"></td>
            </tr>
            <tr>
                <td>Sks</td>
                <td>:</td>
                <td><input type="text" name="sks" value="{{$mata_kuliah->sks}}" size="30"></td>
            </tr>
            <tr>
                <td>Dosen Id</td>
                <td>:</td>
                <td><input type="text" name="dosen_id" value="{{$mata_kuliah->dosen_id}}" size="30"></td>
            </tr>
        </table>
        <button type="submit">Add</button>
        <button type="reset">Clear</button>
    </form>
    </body>
</html>