<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <form action="{{ action([App\Http\Controllers\KRSController::class, 'store']) }}"  method="post">
        @csrf
        <table class="table table-light table-striped">
            <tr>
                <td>Kode Mahasiswa</td>
                <td>:</td>
                <td><input type="text" name="kode_mahasiswa" size="30"></td>
            </tr>
             <tr>
                <td>Tahun Ajaran</td>
                <td>:</td>
                <td><input type="text" name="tahun_ajaran" size="30"></td>
            </tr>
             <tr>
                <td>Semester</td>
                <td>:</td>
                <td><input type="text" name="semester" size="30"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><input type="text" name="status" size="30"></td>
            </tr>
            <tr>
                <td>Total SKS</td>
                <td>:</td>
                <td><input type="text" name="total_sks" size="30"></td>
            </tr>
            <h3>Pilih Kelas yang Diambil (KRS Detail)</h3>
                <div id="kelas-container">
                <div class="kelas-row">
                    <label>Pilih Kelas:</label>
                    <select name="kelas_id[]" required>
                    <option value="">-- Pilih Kelas --</option>
                @foreach($daftar_kelas as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_matakuliah }}</option>
                @endforeach
            </select>
        </div>
    </div>
        </table>
        <button type="submit">Add</button>
        <button type="reset">Clear</button>
    </form>
</html>