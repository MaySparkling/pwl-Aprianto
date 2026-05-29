<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();

        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // contoh dummy dropdown
        $mata_kuliah = [
            1 => 'Bisnis Digital',
            2 => 'Sistem Teknologi dan Informasi',
            3 => 'Kewirausahaan'
        ];

        $dosen = [
            1 => 'Kevin',
            2 => 'Jonathan',
            3 => 'Aprianto'
        ];

        return view('kelas.create', compact('mata_kuliah', 'dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required',
            'kode_mata_kuliah' => 'required',
            'kode_dosen' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'tahun_ajaran' => 'required',
            'ruang_kelas' => 'required',
            'jumlah_max' => 'required',
            'semester' => 'required'
        ]);

        Kelas::create($request->all());

        return redirect('/kelas')
            ->with('success', 'Data kelas berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return redirect('/kelas')
            ->with('success', 'Data kelas berhasil dihapus');
    }
}