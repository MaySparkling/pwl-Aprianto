<html>
        <form action="{{ action([App\Http\Controllers\DosenController::class,'store']) }}" method="post">
            @csrf
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="fullname" size="30"></td>
            </tr>
             <tr>
                <td>Nomor Induk Pengajar</td>
                <td>:</td>
                <td><input type="text" name="NIP" size="30"></td>
            </tr>
             <tr>
                <td>Nomor Induk Dosen Nasional</td>
                <td>:</td>
                <td><input type="text" name="NIDN" size="30"></td>
            </tr>
            <tr>
                <td>Pendidikan Terakhir</td>
                <td>:</td>
                <td><input type="text" name="pendidikan_terakhir" size="30"></td>
            </tr>
            <tr>
                <td>Jurusan Id</td>
                <td>:</td>
                <td><input type="text" name="NIDN" size="30"></td>
            </tr>
             <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tempat_lahir" size="30"></td>
            </tr>
             <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tanggal_lahir" size="30"></td>
            </tr>
             <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" rows="4" cols="30"></textarea></td>
            </tr>
        </table>
        <button type="submit">Add</button>
        <button type="reset">Clear</button>
    </form>
</html>