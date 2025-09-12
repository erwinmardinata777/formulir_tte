<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-5">
            <div class="text-center mb-4">
                <div class="header-gradient d-inline-block px-4 py-2 rounded-pill mb-3">
                    <i class="fas fa-shield-alt me-2"></i>
                    <strong>Admin Panel</strong>
                </div>
                <h3 class="text-white">Sistem TTE Kabupaten Sumbawa</h3>
            </div>

            <div class="card">
                <div class="card-header header-gradient text-center">
                    <h4 class="mb-0">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Login Administrator
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-user text-primary me-1"></i>
                                Email Address
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock text-primary me-1"></i>
                                Password
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('permohonan.form') }}" class="text-white text-decoration-none">
                    <i class="fas fa-arrow-left me-1"></i>
                    Kembali ke Form Permohonan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
