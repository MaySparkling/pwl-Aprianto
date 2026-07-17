<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = KRS::with('mahasiswa');

        // Mahasiswa hanya dapat melihat KRS miliknya sendiri
        if (Auth::user()->role == 'mahasiswa') {

            $mahasiswa = Auth::user()->mahasiswa;

            if (!$mahasiswa) {
                return redirect()->route('krs.index')
                    ->with('error', 'Akun belum terhubung dengan data mahasiswa.');
            }

            $query->where('kode_mahasiswa', $mahasiswa->id);
        }

        return view('krs.index', [
            'krs' => $query->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('krs.index')
                ->with('error', 'Akun belum terhubung dengan data mahasiswa.');
        }

        return view('krs.create', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('krs.index')
                ->with('error', 'Akun belum terhubung dengan data mahasiswa.');
        }

        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required|in:ganjil,genap'
        ]);

        $krs = KRS::create([
            'kode_mahasiswa' => $mahasiswa->id,
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
            'status' => 'pending',
            'total_sks' => 0
        ]);

        return redirect()->route('krs.show', $krs->id)
            ->with('success', 'KRS berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $krs = KRS::with([
            'mahasiswa',
            'detail',
            'detail.kelas',
            'detail.kelas.dosen',
            'detail.kelas.mataKuliah'
        ])->findOrFail($id);

        // Mahasiswa hanya dapat melihat KRS miliknya sendiri
        if (Auth::user()->role == 'mahasiswa') {

            $mahasiswa = Auth::user()->mahasiswa;

            if (!$mahasiswa || $krs->kode_mahasiswa != $mahasiswa->id) {
                abort(403, 'Anda tidak memiliki akses ke KRS ini.');
            }
        }

        // Kelas yang belum dipilih dan belum penuh
        $sudahDipilih = $krs->detail->pluck('kelas_id');

        $kelasTersedia = Kelas::with([
                'dosen',
                'mataKuliah'
            ])
            ->where('tahun_ajaran', $krs->tahun_ajaran)
            ->where('semester', $krs->semester)
            ->whereNotIn('id', $sudahDipilih)
            ->whereColumn('jumlah_mahasiswa', '<', 'jumlah_max')
            ->get();

        return view('krs.show', [
            'krs' => $krs,
            'kelasTersedia' => $kelasTersedia
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KRS $kRS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KRS $kRS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $krs = KRS::findOrFail($id);

        $krs->delete();

        return redirect()->route('krs.index')
            ->with('success', 'Data KRS berhasil dihapus.');
    }
}