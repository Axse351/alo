<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapitulasiController;
use App\Models\Rekapitulasi;

Route::get('/', function () {
    $totalRekap = Rekapitulasi::count();
    return view('app', compact('totalRekap'));
});

// Pastikan route ini ditulis SEBELUM `Route::resource()`
Route::get('rekapitulasi/export', [RekapitulasiController::class, 'export'])->name('rekapitulasi.export');
Route::post('rekapitulasi/import', [RekapitulasiController::class, 'import'])->name('rekapitulasi.import');

Route::resource('rekapitulasi', RekapitulasiController::class);
