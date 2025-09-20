<?php

use Livewire\Volt\Volt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
// Dashboard / Home
Route::view('/', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

// Group untuk admin


Route::middleware(['auth'])->group(function () {
    Volt::Route('/admin/barang-keluar', 'admin.barang-keluar')->name('admin.barang-keluar');
    Volt::Route('/admin/barang-masuk', 'admin.barang-masuk')->name('admin.barang-masuk');
    Volt::route('/admin/obat-input', 'admin.obat-input')->name('admin.obat-input');
    Volt::Route('/admin/rekap-obat', 'admin.rekap-obat')->name('admin.rekap-obat');
});

// Group untuk dokter
Route::middleware(['auth'])->group(function () {
    Volt::Route('/dokter/rekap-obat', 'dokter.rekap-obat')->name('dokter.rekap-obat');
});

Route::post('/logout', function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Sidebar dan layout otomatis dipakai di masing-masing view
// Auth routes (login, register, dsb)
require __DIR__.'/auth.php';
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
