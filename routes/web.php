<?php
// routes/web.php
use App\Http\Controllers\PermohonanTteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PermohonanTteController::class, 'index'])->name('permohonan.form');
Route::post('/permohonan', [PermohonanTteController::class, 'store'])->name('permohonan.store');

// Auth Routes dengan middleware guest
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/admin/login', [LoginController::class, 'login']);
});

// Logout route (harus authenticated)
Route::middleware('auth')->group(function () {
    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/permohonan', [AdminController::class, 'permohonan'])->name('admin.permohonan');
    Route::patch('/permohonan/{permohonan}/status', [AdminController::class, 'updateStatus'])->name('admin.permohonan.status');
});
