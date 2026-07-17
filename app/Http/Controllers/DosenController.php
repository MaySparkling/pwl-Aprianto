<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dosen;
use App\Models\jurusan;
use App\Models\User;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dosen.index', [
            'dosen' => dosen::with('jurusan')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dosen.create', [
            'jurusan' => jurusan::all(),
            'users'   => $this->availableUsers(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname'            => 'required|max:255',
            'NIP'                 => 'required|unique:dosen,NIP',
            'NIDN'                => 'required|unique:dosen,NIDN',
            'pendidikan_terakhir' => 'required',
            'jurusan_id'          => 'required|exists:jurusan,id',
            'tempat_lahir'        => 'required',
            'tanggal_lahir'       => 'required|date',
            'alamat'              => 'required',
            'user_id'             => 'nullable|exists:users,id|unique:dosen,user_id',
        ]);

        dosen::create($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('Dosen.show', [
            'dosen' => dosen::with('jurusan')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dosen = dosen::findOrFail($id);

        return view('Dosen.edit', [
            'dosen' => $dosen,
            'jurusan' => jurusan::all(),
            'users' => $this->availableUsers($dosen->user_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname'            => 'required|max:255',
            'NIP'                 => "required|unique:dosen,NIP,$id",
            'NIDN'                => "required|unique:dosen,NIDN,$id",
            'pendidikan_terakhir' => 'required',
            'jurusan_id'          => 'required|exists:jurusan,id',
            'tempat_lahir'        => 'required',
            'tanggal_lahir'       => 'required|date',
            'alamat'              => 'required',
            'user_id'             => "nullable|exists:users,id|unique:dosen,user_id,$id",
        ]);

        dosen::findOrFail($id)->update($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        dosen::findOrFail($id)->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }

    /**
     * Akun dengan role "dosen" yang belum ditautkan ke data Dosen manapun
     */
    private function availableUsers($currentUserId = null)
    {
        return User::where('role', 'dosen')
            ->where(function ($q) use ($currentUserId) {
                $q->whereDoesntHave('dosen'); 
                if ($currentUserId) {
                    $q->orWhere('id', $currentUserId);
                }
            })
            ->get();
    }
}