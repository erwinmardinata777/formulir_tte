<?php
// app/Http/Controllers/PermohonanTteController.php
namespace App\Http\Controllers;

use App\Models\PermohonanTte;
use App\Models\Opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PermohonanTteController extends Controller
{
    public function index()
    {
        $opds = Opd::where('status', 'aktif')->get();
        return view('permohonan.form', compact('opds'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|size:16|unique:permohonan_ttes,nik',
            'nip' => 'required|string|max:18|unique:permohonan_ttes,nip',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'nullable|email',
            'jabatan' => 'required|string|max:255',
            'golongan' => 'required|string|max:50',
            'opds_id' => 'required|exists:opds,id',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:15360' // 15 MB
        ], [
            'email.ends_with' => 'Email harus menggunakan domain @sumbawakab.go.id',
            'nik.size' => 'NIK harus terdiri dari 16 digit',
            'nik.unique' => 'NIK sudah terdaftar sebelumnya',
            'nip.required' => 'NIP wajib diisi',
            'nip.unique' => 'NIP sudah terdaftar sebelumnya',
            'foto_ktp.max' => 'Ukuran file maksimal 15MB'
        ]);

        // Upload foto KTP
        $fotoKtp = $request->file('foto_ktp');
        $fotoKtpPath = $fotoKtp->store('foto_ktp', 'public');

        $validated['foto_ktp'] = $fotoKtpPath;
        $validated['tanggal_permohonan'] = now()->toDateString();

        PermohonanTte::create($validated);

        return redirect()->back()->with('success', 'Permohonan TTE berhasil disubmit! Silakan tunggu konfirmasi lebih lanjut.');
    }
}
