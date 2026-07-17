<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\KRSDetail;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KRSDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('krsdetail.index', [
            'detail' => KRSDetail::with([
                'kelas.mataKuliah',
                'kelas.dosen',
                'krs.mahasiswa'
            ])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'krs_id' => 'required|exists:table_krs,id',
            'kelas_id' => 'required|exists:table_kelas,id',
        ]);

        $krs = KRS::findOrFail($request->krs_id);

        $this->authorizeOwner($krs);

        if (
            KRSDetail::where('krs_id', $request->krs_id)
                ->where('kelas_id', $request->kelas_id)
                ->exists()
        ) {
            return back()->with('error', 'Kelas sudah dipilih.');
        }

        $kelas = Kelas::findOrFail($request->kelas_id);

        if ($kelas->jumlah_mahasiswa >= $kelas->jumlah_max) {
            return back()->with('error', 'Kelas penuh.');
        }

        KRSDetail::create([
            'krs_id' => $request->krs_id,
            'kelas_id' => $request->kelas_id,
            'status' => 'pending',
        ]);

        $kelas->increment('jumlah_mahasiswa');

        $this->updateTotalSKS($request->krs_id);
        $this->updateStatusKRS($request->krs_id);

        return back()->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KRSDetail $kRSDetail)
    {
        return view('krsdetail.show', [
            'detail' => $kRSDetail->load([
                'kelas.mataKuliah',
                'kelas.dosen',
                'krs.mahasiswa'
            ])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KRSDetail $kRSDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KRSDetail $kRSDetail)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,declined'
        ]);

        $this->applyStatus($kRSDetail, $request->status);

        $this->updateTotalSKS($kRSDetail->krs_id);
        $this->updateStatusKRS($kRSDetail->krs_id);

        return back()->with('success', 'Status berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KRSDetail $kRSDetail)
    {
        $this->authorizeOwner($kRSDetail->krs);

        $krsId = $kRSDetail->krs_id;
        $kelas = $kRSDetail->kelas;
        $wasDeclined = $kRSDetail->status === 'declined';

        $kRSDetail->delete();

        if (!$wasDeclined) {
            $kelas->decrement('jumlah_mahasiswa');
        }

        $this->updateTotalSKS($krsId);
        $this->updateStatusKRS($krsId);

        return back()->with('success', 'Mata kuliah berhasil dihapus.');
    }

    /**
     * Mengubah status KRS Detail.
     */
    private function applyStatus(KRSDetail $detail, string $status)
    {
        $wasDeclined = $detail->status === 'declined';
        $willBeDeclined = $status === 'declined';

        if ($wasDeclined && !$willBeDeclined) {
            $detail->kelas->increment('jumlah_mahasiswa');
        } elseif (!$wasDeclined && $willBeDeclined) {
            $detail->kelas->decrement('jumlah_mahasiswa');
        }

        $detail->update([
            'status' => $status
        ]);
    }

    /**
     * Menghitung ulang total SKS.
     */
    private function updateTotalSKS($krsId)
    {
        $krs = KRS::with('detail.kelas.mataKuliah')->findOrFail($krsId);

        $total = 0;

        foreach ($krs->detail as $detail) {
            $total += $detail->kelas->mataKuliah->SKS;
        }

        $krs->update([
            'total_sks' => $total
        ]);
    }

    /**
     * Mengubah status KRS.
     */
    private function updateStatusKRS($krsId)
    {
        $krs = KRS::with('detail')->findOrFail($krsId);

        $total = $krs->detail->count();

        if ($total == 0) {
            $status = 'pending';
        } else {

            $approved = $krs->detail->where('status', 'approved')->count();
            $pending = $krs->detail->where('status', 'pending')->count();
            $declined = $krs->detail->where('status', 'declined')->count();

            if ($pending > 0) {
                $status = 'pending';
            } elseif ($approved == $total) {
                $status = 'approved';
            } elseif ($declined == $total) {
                $status = 'declined';
            } else {
                $status = 'partial';
            }
        }

        $krs->update([
            'status' => $status
        ]);
    }

    /**
     * Memastikan mahasiswa hanya dapat mengubah KRS miliknya sendiri.
     */
    private function authorizeOwner(KRS $krs)
    {
        if (Auth::user()->role === 'mahasiswa') {

            $mahasiswa = Auth::user()->mahasiswa;

            if (!$mahasiswa || $krs->kode_mahasiswa != $mahasiswa->id) {
                abort(403, 'Anda tidak memiliki akses ke KRS ini.');
            }
        }
    }
}