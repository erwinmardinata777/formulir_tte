<?php

namespace App\Http\Controllers;

use App\Models\PermohonanTte;
use App\Models\Opd;
use App\Models\Nip;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPermohonan = PermohonanTte::count();
        $pending = PermohonanTte::where('status_permohonan', 'pending')->count();
        $diproses = PermohonanTte::where('status_permohonan', 'diproses')->count();
        $selesai = PermohonanTte::where('status_permohonan', 'selesai')->count();

        $permohonanTerbaru = PermohonanTte::with(['opd', 'nipData'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalPermohonan', 
            'pending', 
            'diproses', 
            'selesai', 
            'permohonanTerbaru'
        ));
    }

    public function permohonan(Request $request)
    {
        $query = PermohonanTte::with(['opd', 'nipData']);

        // Filter berdasarkan Nama
        if ($request->filled('nama')) {
            $query->where('nama_lengkap', 'like', '%' . $request->nama . '%');
        }

        // Filter OPD
        if ($request->filled('opds_id')) {
            $query->where('opds_id', $request->opds_id);
        }

        // Filter Status
        if ($request->filled('status_permohonan')) {
            $query->where('status_permohonan', $request->status_permohonan);
        }

        // Filter Perangkat Daerah dari tabel Nips
        if ($request->filled('perangkat_daerah')) {
            $query->whereHas('nipData', function($q) use ($request) {
                $q->where('perangkat_daerah', 'like', '%' . $request->perangkat_daerah . '%');
            });
        }

        $permohonan = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        $opds = Opd::where('status', 'aktif')->orderBy('nama_opd')->get();
        
        // Ambil list perangkat daerah untuk filter
        $perangkatDaerahs = Nip::distinct()->pluck('perangkat_daerah');

        return view('admin.permohonan', compact('permohonan', 'opds', 'perangkatDaerahs'));
    }

    public function updateStatus(Request $request, PermohonanTte $permohonan)
    {
        $request->validate([
            'status_permohonan' => 'required|in:pending,diproses,selesai,ditolak'
        ]);

        $permohonan->update([
            'status_permohonan' => $request->status_permohonan
        ]);

        return redirect()->back()->with('success', 'Status permohonan berhasil diupdate!');
    }
}
