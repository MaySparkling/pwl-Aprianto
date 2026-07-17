<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Jurusan;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('matakuliah.index', [
            'mata_kuliah' => Matakuliah::with(['jurusan', 'dosen'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create', [
            'jurusan' => Jurusan::all(),
            'dosen' => Dosen::all(),
        ]);
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id' => 'required|exists:jurusan,id',
            'kode_mk' => 'required|max:20|unique:mata_kuliah,kode_mk',
            'nama_mk' => 'required|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'dosen_id' => 'required|exists:dosen,id',
        ]);

        Matakuliah::create($request->only([
            'jurusan_id',
            'kode_mk',
            'nama_mk',
            'sks',
            'dosen_id'
        ]));

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('matakuliah.show', [
            'mata_kuliah' => Matakuliah::with(['jurusan', 'dosen'])
                ->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('matakuliah.edit', [
            'mata_kuliah' => Matakuliah::findOrFail($id),
            'jurusan' => Jurusan::all(),
            'dosen' => Dosen::all(),
        ]);
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jurusan_id' => 'required|exists:jurusan,id',
            'kode_mk' => "required|max:20|unique:mata_kuliah,kode_mk,$id",
            'nama_mk' => 'required|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'dosen_id' => 'required|exists:dosen,id',
        ]);

        Matakuliah::findOrFail($id)->update(
            $request->only([
                'jurusan_id',
                'kode_mk',
                'nama_mk',
                'sks',
                'dosen_id'
            ])
        );

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy($id)
    {
        Matakuliah::findOrFail($id)->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}