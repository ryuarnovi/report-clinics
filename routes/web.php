<?php

use Livewire\Volt\Volt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\RekapObatExport as AdminRekapObatExport;
use App\Livewire\Dokter\RekapObatExport as DokterRekapObatExport;
use Illuminate\Support\Facades\Route;

// Profile & Dashboard
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::view('/', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

// Group untuk admin
Route::middleware(['auth'])->group(function () {
    Volt::Route('/admin/barang-keluar', 'admin.barang-keluar')->name('admin.barang-keluar');
    Volt::Route('/admin/barang-masuk', 'admin.barang-masuk')->name('admin.barang-masuk');
    Volt::Route('/admin/obat-input', 'admin.obat-input')->name('admin.obat-input');
    Volt::Route('/admin/rekap-obat', 'admin.rekap-obat')->name('admin.rekap-obat');
    Volt::Route('/obat/{id}/edit', Edit::class)->name('obat.edit');

    // Export routes (CSV & PDF)
    Route::get('/admin/rekap-obat/export-csv', [AdminRekapObatExport::class, 'exportCsv'])->name('admin.rekap-obat.export-csv');
    Route::get('/admin/rekap-obat/export-pdf', [AdminRekapObatExport::class, 'exportPdf'])->name('admin.rekap-obat.export-pdf');
});

// Group untuk dokter
Route::middleware(['auth'])->group(function () {
    Volt::Route('/dokter/rekap-obat', 'dokter.rekap-obat')->name('dokter.rekap-obat');
    // Export CSV untuk dokter
    Route::get('/dokter/rekap-obat/export-csv', [DokterRekapObatExport::class, 'exportCsv'])->name('dokter.rekap-obat.export-csv');
    // Jika butuh PDF juga:
    Route::get('/dokter/rekap-obat/export-pdf', [DokterRekapObatExport::class, 'exportPdf'])->name('dokter.rekap-obat.export-pdf');
});

// Logout
Route::post('/logout', function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Auth routes (login, register, dsb)
require __DIR__.'/auth.php';

// Jetstream/dashboard (jika dipakai)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});