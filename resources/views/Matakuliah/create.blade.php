<html>
        <form action="{{ action([App\Http\Controllers\MatakuliahController::class,'store']) }}" method="post">
            @csrf
        <table>
            <tr>
                <td>Jurusan Id</td>
                <td>:</td>
                <td><input type="text" name="jurusan_id" size="30"></td>
            </tr>
             <tr>
                <td>Kode MK</td>
                <td>:</td>
                <td><input type="text" name="kode_mk" size="30"></td>
            </tr>
             <tr>
                <td>Nama MK</td>
                <td>:</td>
                <td><input type="text" name="nama_mk" size="30"></td>
            </tr>
            <tr>
                <td>Sks</td>
                <td>:</td>
                <td><input type="text" name="sks" size="30"></td>
            </tr>
            <tr>
                <td>Dosen Id</td>
                <td>:</td>
                <td><input type="text" name="dosen_id" size="30"></td>
            </tr>
        </table>
        <button type="submit">Add</button>
        <button type="reset">Clear</button>
    </form>
</html>