<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with(['dosen', 'mataKuliah'])->get();

        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        $mata_kuliah = MataKuliah::all();

        return view('kelas.create', [
            'dosen' => $dosen,
            'mata_kuliah' => $mata_kuliah,
            'hari' => Kelas::ListHari(),
            'jam' => Kelas::ListJam(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required|unique:table_kelas,kode_kelas',
            'kode_mata_kuliah' => 'required|exists:table_mata_kuliah,id',
            'kode_dosen' => 'required|exists:table_dosen,id',
            'hari' => 'required',
            'jam' => 'required',
            'tahun_ajaran' => 'required',
            'ruang_kelas' => 'required',
            'jumlah_max' => 'required|integer|min:1',
            'semester' => 'required'
        ]);

        Kelas::create($request->except('_token'));

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus');
    }
}