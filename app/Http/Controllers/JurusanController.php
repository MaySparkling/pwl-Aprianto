<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Jurusan.index', [
            'jurusan' => jurusan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        jurusan::create($data);

        return redirect()->action([JurusanController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('Jurusan.show', [
            'jurusan' => jurusan::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('Jurusan.edit', [
            'jurusan' => jurusan::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        jurusan::findOrFail($id)->update($data);

        return redirect()->action([JurusanController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        jurusan::findOrFail($id)->delete();

        return redirect()->action([JurusanController::class, 'index']);
    }
}