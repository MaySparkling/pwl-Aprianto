<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController
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
        $data = $request->except('_token');

        Mahasiswa::create($data);

        return redirect()->action([MahasiswaController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Mahasiswa::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('mahasiswa.edit', [
            'mahasiswa' => Mahasiswa::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        Mahasiswa::find($id)->update($data);

        return redirect()->action([MahasiswaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();//

        return redirect()->action([MahasiswaController::class, 'index']);
    }
}
