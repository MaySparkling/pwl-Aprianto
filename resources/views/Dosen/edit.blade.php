<html>
        <form action="{{ action([App\Http\Controllers\DosenController::class, 'update'], [$dosen->id]) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <table>
            @csrf
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="fullname" value="{{$dosen->fullname}}" size="30"></td>
            </tr>
             <tr>
                <td>Nomor Induk Pengajar</td>
                <td>:</td>
                <td><input type="text" name="NIP" value="{{$dosen->NIP}}" size="30"></td>
            </tr>
             <tr>
                <td>Nomor Induk Dosen Nasional</td>
                <td>:</td>
                <td><input type="text" name="NIDN" value="{{$dosen->NIDN}}" size="30"></td>
            </tr>
            <tr>
                <td>Pendidikan Terakhir</td>
                <td>:</td>
                <td><input type="text" name="pendidikan_terakhir" value="{{$dosen->NIDN}}" size="30"></td>
            </tr>
            <tr>
                <td>Jurusan Id</td>
                <td>:</td>
                <td><input type="text" name="jurusan_id" value="{{$dosen->NIDN}}" size="30"></td>
            </tr>
             <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tempat_lahir" value="{{$dosen->tempat_lahir}}" size="30"></td>
            </tr>
             <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tanggal_lahir" value="{{$dosen->tanggal_lahir}}" size="30"></td>
            </tr>
             <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="Alamat" rows="4" cols="30">{{$dosen->alamat}}</textarea></td>
            </tr>
        </table>
        <button type="submit">Add</button>
        <button type="reset">Clear</button>
    </form>
    </body>
</html>