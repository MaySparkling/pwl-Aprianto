<html>
        <form action="{{ action([App\Http\Controllers\JurusanController::class,'store']) }}" method="post">
            @csrf
        <table>
            <tr>
                <td>Nama Jurusan</td>
                <td>:</td>
                <td><input type="text" name="nama_jurusan" size="30"></td>
            </tr>
             <tr>
                <td>Kode Jurusan</td>
                <td>:</td>
                <td><input type="text" name="kode_jurusan" size="30"></td>
            </tr>
        </table>
        <button type="submit">Add</button>
        <button type="reset">Clear</button>
    </form>
</html>