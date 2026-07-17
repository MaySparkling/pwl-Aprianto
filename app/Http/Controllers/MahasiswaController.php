<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.index', [
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|max:255',
            'NIM' => 'required|unique:mahasiswa,NIM',
            'NISN' => 'required|unique:mahasiswa,NISN',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        Mahasiswa::create($request->only([
            'fullname',
            'NIM',
            'NISN',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat'
        ]));

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('mahasiswa.show', [
            'mahasiswa' => Mahasiswa::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('mahasiswa.edit', [
            'mahasiswa' => Mahasiswa::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|max:255',
            'NIM' => "required|unique:mahasiswa,NIM,$id",
            'NISN' => "required|unique:mahasiswa,NISN,$id",
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        $data = $request->only([
            'fullname',
            'NIM',
            'NISN',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat'
        ]);

        Mahasiswa::findOrFail($id)->update($data);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}