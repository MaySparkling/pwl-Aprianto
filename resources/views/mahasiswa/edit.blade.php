<html>
        <form action="{{ action([App\Http\Controllers\MahasiswaController::class, 'update'], [$mahasiswa->id]) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <table>
            @csrf
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="fullname" value="{{$mahasiswa->fullname}}" size="30"></td>
            </tr>
             <tr>
                <td>Nomor Induk Mahasiswa</td>
                <td>:</td>
                <td><input type="text" name="NIM" value="{{$mahasiswa->NIM}}" size="30"></td>
            </tr>
             <tr>
                <td>Nomor Induk Siswa Nasional</td>
                <td>:</td>
                <td><input type="text" name="NIDN" value="{{$mahasiswa->NIDN}}" size="30"></td>
            </tr>
             <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tempat_lahir" value="{{$mahasiswa->tempat_lahir}}" size="30"></td>
            </tr>
             <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tanggal_lahir" value="{{$mahasiswa->tanggal_lahir}}" size="30"></td>
            </tr>
             <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="Alamat" rows="4" cols="30">{{$mahasiswa->alamat}}</textarea></td>
            </tr>
        </table>
        <button type="submit">Add</button>
        <button type="reset">Clear</button>
    </form>
    </body>
</html>