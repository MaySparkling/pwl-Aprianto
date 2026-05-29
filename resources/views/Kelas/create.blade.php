<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kelas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Tambah Kelas</h2>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kode Kelas</label>
            <input type="text"
                   name="kode_kelas"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Mata Kuliah</label>

            <select name="kode_mata_kuliah"
                    class="form-select">

                <option value="">-- Pilih Mata Kuliah --</option>

                @foreach($mata_kuliah as $id => $nama)
                    <option value="{{ $id }}">
                        {{ $nama }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Dosen</label>

            <select name="kode_dosen"
                    class="form-select">

                <option value="">-- Pilih Dosen --</option>

                @foreach($dosen as $id => $nama)
                    <option value="{{ $id }}">
                        {{ $nama }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Hari</label>

            <select name="hari"
                    class="form-select">

                <option value="senin">Senin</option>
                <option value="selasa">Selasa</option>
                <option value="rabu">Rabu</option>
                <option value="kamis">Kamis</option>
                <option value="jumat">Jumat</option>

            </select>
        </div>

        <div class="mb-3">
            <label>Jam</label>

            <select name="jam"
                    class="form-select">

                <option value="07:00 - 08:40">07:00 - 08:40</option>
                <option value="08:50 - 11:30">08:50 - 11:30</option>
                <option value="12:30 - 14:10">12:30 - 14:10</option>
                <option value="17:00 - 18:40">17:00 - 18:40</option>
                <option value="19:00 - 20:40">19:00 - 20:40</option>

            </select>
        </div>

        <div class="mb-3">
            <label>Tahun Ajaran</label>

            <input type="text"
                   name="tahun_ajaran"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Ruang Kelas</label>

            <input type="text"
                   name="ruang_kelas"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Jumlah Max</label>

            <input type="number"
                   name="jumlah_max"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Semester</label>

            <br>

            <input type="radio"
                   name="semester"
                   value="ganjil">

            Ganjil

            <br>

            <input type="radio"
                   name="semester"
                   value="genap">

            Genap
        </div>

        <button type="submit"
                class="btn btn-primary">
            Simpan
        </button>

    </form>

</div>

</body>
</html>