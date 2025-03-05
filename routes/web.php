<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapitulasiController;
use App\Models\Rekapitulasi;
use App\Http\Controllers\AuthController;




Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $totalRekap = Rekapitulasi::count();
        $dataPerBulan = Rekapitulasi::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as jumlah')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('jumlah', 'bulan')
            ->toArray();

        // Daftar bulan dalam format singkat
        $bulanLengkap = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        // Inisialisasi array jumlah pencatatan per bulan dengan nilai default 0
        $jumlahPerBulan = array_fill(0, 12, 0);

        foreach ($dataPerBulan as $bulan => $jumlah) {
            $jumlahPerBulan[$bulan - 1] = $jumlah; // Menyesuaikan indeks array
        }

        return view('app', compact('totalRekap', 'bulanLengkap', 'jumlahPerBulan'));
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
