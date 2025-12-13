@extends('layouts.admin')

@section('title', 'Data Permohonan')

@section('content')
<div class="container-fluid py-4">
    <!-- ... Kode sebelumnya tetap sama ... -->
    
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
                    <!-- Filter Form -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="GET" action="{{ route('admin.permohonan') }}" class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Cari Nama</label>
                                    <input type="text" name="nama" class="form-control" 
                                           placeholder="Masukkan nama..." 
                                           value="{{ request('nama') }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Filter OPD</label>
                                    <select name="opds_id" class="form-select select2-opd" id="select-opd">
                                        <option value="">-- Semua OPD --</option>
                                        @foreach($opds as $opd)
                                            <option value="{{ $opd->id }}" 
                                                {{ request('opds_id') == $opd->id ? 'selected' : '' }}>
                                                {{ $opd->nama_opd }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Filter Perangkat Daerah</label>
                                    <select name="perangkat_daerah" class="form-select select2-pd" id="select-pd">
                                        <option value="">-- Semua Perangkat Daerah --</option>
                                        @foreach($perangkatDaerahs as $pd)
                                            <option value="{{ $pd }}" 
                                                {{ request('perangkat_daerah') == $pd ? 'selected' : '' }}>
                                                {{ $pd }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Filter Status</label>
                                    <select name="status_permohonan" class="form-select select2-status" id="select-status">
                                        <option value="">-- Semua Status --</option>
                                        <option value="pending" {{ request('status_permohonan')=='pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="diproses" {{ request('status_permohonan')=='diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="selesai" {{ request('status_permohonan')=='selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="ditolak" {{ request('status_permohonan')=='ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="fas fa-filter me-1"></i> Filter
                                    </button>
                                    <a href="{{ route('admin.permohonan') }}" class="btn btn-secondary">
                                        <i class="fas fa-sync me-1"></i> Reset
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-wrapper">
                        <div class="table-responsive-wrapper">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Data Pemohon</th>
                                        <th>Kontak</th>
                                        <th>Instansi & Jabatan</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th style="min-width: 100px;">Aksi</th>
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
                                                @if($item->nip)
                                                    NIP: {{ $item->nip }}<br>
                                                @endif
                                                {{ ucfirst($item->jenis_kelamin) }}
                                            </small>
                                        </td>
                                        <td>
                                            <small>
                                                <i class="fas fa-phone text-primary"></i> {{ $item->nomor_telepon }}<br>
                                                @if($item->email)
                                                    <i class="fas fa-envelope text-primary"></i> {{ $item->email }}
                                                @endif
                                            </small>
                                        </td>
                                        <td>
                                            @if($item->nipData)
                                                <strong>{{ $item->nipData->perangkat_daerah }}</strong><br>
                                            @else
                                                <strong>{{ $item->opd->nama_opd }}</strong><br>
                                            @endif
                                            <small class="text-muted">
                                                {{ $item->jabatan }}<br>
                                                @if($item->golongan)
                                                    Gol. {{ $item->golongan }}
                                                @endif
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
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" 
                                                        type="button" 
                                                        id="dropdownMenuButton{{ $item->id }}" 
                                                        data-bs-toggle="dropdown" 
                                                        aria-expanded="false">
                                                    <i class="fas fa-cog"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $item->id }}">
                                                    <li>
                                                        <form action="{{ route('admin.permohonan.status', $item) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="status_permohonan" value="pending">
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="fas fa-clock text-warning me-2"></i>Set Pending
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.permohonan.status', $item) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="status_permohonan" value="diproses">
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="fas fa-cog text-info me-2"></i>Set Diproses
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.permohonan.status', $item) }}" method="POST" class="d-inline">
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
                                                        <form action="{{ route('admin.permohonan.status', $item) }}" method="POST" class="d-inline">
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
                    </div>

                    
                    @if($permohonan->hasPages())
                    <div class="pagination-wrapper">
                        <div class="pagination-info">
                            Menampilkan <strong>{{ $permohonan->firstItem() }}</strong> - 
                            <strong>{{ $permohonan->lastItem() }}</strong> dari 
                            <strong>{{ $permohonan->total() }}</strong> data
                        </div>
                        <div>
                            {{ $permohonan->links() }}
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize Select2 untuk Filter OPD
        $('.select2-opd').select2({
            theme: 'bootstrap-5',
            placeholder: '-- Pilih OPD --',
            allowClear: true,
            width: '100%'
        });

        // Initialize Select2 untuk Filter Perangkat Daerah
        $('.select2-pd').select2({
            theme: 'bootstrap-5',
            placeholder: '-- Pilih Perangkat Daerah --',
            allowClear: true,
            width: '100%'
        });

        // Initialize Select2 untuk Filter Status
        $('.select2-status').select2({
            theme: 'bootstrap-5',
            placeholder: '-- Pilih Status --',
            allowClear: true,
            width: '100%',
            minimumResultsForSearch: Infinity // Disable search untuk status (karena pilihan sedikit)
        });
    });
</script>
@endpush
