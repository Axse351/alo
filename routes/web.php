<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapitulasiController;
use App\Models\Rekapitulasi;
use App\Http\Controllers\AuthController;




Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $totalRekap = Rekapitulasi::count();
        return view('app', compact('totalRekap')); // Ganti dengan view utama
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Pastikan route ini ditulis SEBELUM `Route::resource()`
Route::get('rekapitulasi/export', [RekapitulasiController::class, 'export'])->name('rekapitulasi.export');
Route::post('rekapitulasi/import', [RekapitulasiController::class, 'import'])->name('rekapitulasi.import');

Route::resource('rekapitulasi', RekapitulasiController::class);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
