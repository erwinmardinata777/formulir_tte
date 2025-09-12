<!-- resources/views/admin/permohonan.blade.php -->
@extends('layouts.admin')

@section('title', 'Data Permohonan')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-white">
                    <i class="fas fa-file-alt me-2"></i>Data Permohonan TTE
                </h2>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-list me-2"></i>
                        Daftar Permohonan ({{ $permohonan->total() }} total)
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Data Pemohon</th>
                                    <th>Kontak</th>
                                    <th>Instansi & Jabatan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permohonan as $index => $item)
                                <tr>
                                    <td>{{ $permohonan->firstItem() + $index }}</td>
                                    <td>
                                        <strong>{{ $item->nama_lengkap }}</strong><br>
                                        <small class="text-muted">
                                            {{ $item->tempat_lahir }}, {{ $item->tanggal_lahir->format('d/m/Y') }}<br>
                                            NIK: {{ $item->nik }}<br>
                                            {{ ucfirst($item->jenis_kelamin) }}
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            <i class="fas fa-phone text-primary"></i> {{ $item->nomor_telepon }}<br>
                                            <i class="fas fa-envelope text-primary"></i> {{ $item->email }}
                                        </small>
                                    </td>
                                    <td>
                                        <strong>{{ $item->opd->nama_opd }}</strong><br>
                                        <small class="text-muted">
                                            {{ $item->jabatan }}<br>
                                            Gol. {{ $item->golongan }}
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            {{ $item->tanggal_permohonan->format('d/m/Y') }}<br>
                                            <span class="text-muted">{{ $item->created_at->format('H:i') }}</span>
                                        </small>
                                    </td>
                                    <td>
                                        <span class="status-badge status-{{ $item->status_permohonan }}">
                                            {{ ucfirst($item->status_permohonan) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" 
                                                    data-bs-toggle="dropdown">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form action="{{ route('admin.permohonan.status', $item) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status_permohonan" value="pending">
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="fas fa-clock text-warning me-2"></i>Set Pending
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.permohonan.status', $item) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status_permohonan" value="diproses">
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="fas fa-cog text-info me-2"></i>Set Diproses
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.permohonan.status', $item) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status_permohonan" value="selesai">
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="fas fa-check text-success me-2"></i>Set Selesai
                                                        </button>
                                                    </form>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('admin.permohonan.status', $item) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status_permohonan" value="ditolak">
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="fas fa-times text-danger me-2"></i>Set Ditolak
                                                        </button>
                                                    </form>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ Storage::url($item->foto_ktp) }}" target="_blank">
                                                        <i class="fas fa-eye me-2"></i>Lihat KTP
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Belum ada data permohonan</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($permohonan->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $permohonan->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
