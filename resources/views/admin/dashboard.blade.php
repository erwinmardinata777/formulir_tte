<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-white"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h2>
                <div class="text-white-50">{{ now()->format('d M Y, H:i') }} WITA</div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-gradient-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">{{ $totalPermohonan }}</h4>
                            <p class="mb-0">Total Permohonan</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-file-alt fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-gradient-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">{{ $pending }}</h4>
                            <p class="mb-0">Pending</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-clock fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-gradient-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">{{ $diproses }}</h4>
                            <p class="mb-0">Diproses</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-cog fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card bg-gradient-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-1">{{ $selesai }}</h4>
                            <p class="mb-0">Selesai</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-check-circle fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Applications -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-list me-2"></i>Permohonan Terbaru</h5>
                    <a href="{{ route('admin.permohonan') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye me-1"></i>Lihat Semua
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Instansi</th>
                                    <th>Email</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permohonanTerbaru as $item)
                                <tr>
                                    <td>
                                        <strong>{{ $item->nama_lengkap }}</strong><br>
                                        <small class="text-muted">{{ $item->jabatan }}</small>
                                    </td>
                                    <td>{{ $item->opd->nama_opd }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $item->status_permohonan }}">
                                            {{ ucfirst($item->status_permohonan) }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada permohonan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
