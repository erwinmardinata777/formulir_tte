<!-- resources/views/permohonan/form.blade.php -->
@extends('layouts.app')

@section('title', 'Form Permohonan TTE - Kabupaten Sumbawa')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <div class="header-gradient d-inline-block px-4 py-2 rounded-pill mb-3">
                    <i class="fas fa-certificate me-2"></i>
                    <strong>Kabupaten Sumbawa</strong>
                </div>
                <h2 class="text-white mb-2">Formulir Permohonan TTE</h2>
                <p class="text-white-50">Tanda Tangan Elektronik untuk ASN Kabupaten Sumbawa</p>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="card">
                <div class="card-header header-gradient text-center">
                    <h4 class="mb-0">
                        <i class="fas fa-user-plus me-2"></i>
                        Data Pemohon TTE
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nama_lengkap" class="form-label">
                                    <i class="fas fa-user text-primary me-1"></i>
                                    Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                       id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                                @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tempat_lahir" class="form-label">
                                    <i class="fas fa-map-marker-alt text-primary me-1"></i>
                                    Tempat Lahir <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                       id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_lahir" class="form-label">
                                    <i class="fas fa-calendar text-primary me-1"></i>
                                    Tanggal Lahir <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                       id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">
                                    <i class="fas fa-id-card text-primary me-1"></i>
                                    NIK <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                                       id="nik" name="nik" value="{{ old('nik') }}" maxlength="16" required>
                                @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nip" class="form-label">
                                    <i class="fas fa-id-badge text-primary me-1"></i>
                                    NIP <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                                    id="nip" name="nip" value="{{ old('nip') }}" maxlength="18" required>
                                @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>                            
                            <div class="col-md-6 mb-3">
                                <label for="jenis_kelamin" class="form-label">
                                    <i class="fas fa-venus-mars text-primary me-1"></i>
                                    Jenis Kelamin <span class="text-danger">*</span>
                                </label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                                        id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nomor_telepon" class="form-label">
                                    <i class="fas fa-phone text-primary me-1"></i>
                                    Nomor Telepon/WA <span class="text-danger">*</span>
                                </label>
                                <input type="tel" class="form-control @error('nomor_telepon') is-invalid @enderror" 
                                       id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required>
                                @error('nomor_telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope text-primary me-1"></i>
                                    Email Instansi <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="nama@sumbawakab.go.id" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Email harus menggunakan domain @sumbawakab.go.id</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="jabatan" class="form-label">
                                    <i class="fas fa-briefcase text-primary me-1"></i>
                                    Jabatan <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" 
                                       id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>
                                @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="golongan" class="form-label">
                                    <i class="fas fa-star text-primary me-1"></i>
                                    Golongan <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('golongan') is-invalid @enderror" 
                                       id="golongan" name="golongan" value="{{ old('golongan') }}" 
                                       placeholder="Contoh: III/a" required>
                                @error('golongan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="opds_id" class="form-label">
                                <i class="fas fa-building text-primary me-1"></i>
                                Instansi/OPD <span class="text-danger">*</span>
                            </label>
                            <select class="form-control @error('opds_id') is-invalid @enderror" 
                                    id="opds_id" name="opds_id" required>
                                <option value="">Pilih Instansi/OPD</option>
                                @foreach($opds as $opd)
                                <option value="{{ $opd->id }}" {{ old('opds_id') == $opd->id ? 'selected' : '' }}>
                                    {{ $opd->nama_opd }}
                                </option>
                                @endforeach
                            </select>
                            @error('opds_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="foto_ktp" class="form-label">
                                <i class="fas fa-camera text-primary me-1"></i>
                                Foto KTP <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control @error('foto_ktp') is-invalid @enderror" 
                                   id="foto_ktp" name="foto_ktp" accept="image/*" required>
                            @error('foto_ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Format: JPG, JPEG, PNG. Maksimal 2MB</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" id="btn-submit" class="btn btn-primary btn-lg">
                                <span class="spinner-border spinner-border-sm d-none me-2" role="status" aria-hidden="true"></span>
                                <i class="fas fa-paper-plane me-2"></i>
                                Submit Permohonan TTE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Batasi input angka di NIK
    document.getElementById('nik').addEventListener('input', function (e) {
        this.value = this.value.replace(/\D/g, '').substring(0, 16);
    });

    // Batasi input angka di NIP (18 digit)
    document.getElementById('nip').addEventListener('input', function (e) {
        this.value = this.value.replace(/\D/g, '').substring(0, 18);
    });

    // Validasi ukuran file (max 15MB)
    document.getElementById('foto_ktp').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file && file.size > 15 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 15MB.');
            this.value = '';
        }
    });

    // Disable tombol submit + tampilkan loading saat submit
    document.querySelector('form').addEventListener('submit', function () {
        const btn = document.getElementById('btn-submit');
        const spinner = btn.querySelector('.spinner-border');
        const icon = btn.querySelector('i');

        btn.disabled = true;
        spinner.classList.remove('d-none');
        icon.classList.add('d-none');
        btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status"></span> Mengirim...`;
    });
</script>
@endpush
