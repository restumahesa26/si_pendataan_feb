<?php

use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\YudisiumController as AdminYudisiumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KejuaraanController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PrestasiMahasiswaController;
use App\Http\Controllers\ProfileControler;
use App\Http\Controllers\YudisiumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])
->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/berita', [DashboardController::class, 'berita'])->name('berita-mahasiswa');

    Route::get('/profile', [ProfileControler::class, 'edit'])->name('profile.edit');

    Route::put('/profile/update', [ProfileControler::class, 'update'])->name('profile.update');

    Route::resource('pelatihan', PelatihanController::class);

    Route::resource('kejuaraan', KejuaraanController::class);

    Route::resource('organisasi', OrganisasiController::class);

});

Route::middleware(['mahasiswa','auth'])
->group(function() {
    Route::resource('yudisium', YudisiumController::class);
});

Route::middleware(['admin','auth'])
->group(function() {
    Route::get('/data-mahasiswa/{id}/pindah_ke_alumni', [MahasiswaController::class, 'to_alumni'])->name('data-mahasiswa.to-alumni');
    Route::resource('data-mahasiswa', MahasiswaController::class);
    Route::resource('data-berita', BeritaController::class);
    Route::resource('data-alumni', AlumniController::class);
    Route::get('/data-yudisium', [AdminYudisiumController::class, 'index'])->name('data-yudisium.index');
    Route::get('/data-yudisium/{id}/pindah_ke_alumni', [AdminYudisiumController::class, 'to_alumni'])->name('data-yudisium.to-alumni');
    Route::get('/data-pelatihan', [PrestasiController::class, 'pelatihan_index'])->name('data-pelatihan.index');
    Route::get('/data-kejuaraan', [PrestasiController::class, 'kejuaraan_index'])->name('data-kejuaraan.index');
    Route::get('/data-organisasi', [PrestasiController::class, 'organisasi_index'])->name('data-organisasi.index');

    Route::delete('/data-pelatihan/destroy/{id}', [PrestasiController::class, 'pelatihan_destroy'])->name('data-pelatihan.destroy');

    Route::delete('/data-kejuaraan/destroy/{id}', [PrestasiController::class, 'kejuaraan_destroy'])->name('data-kejuaraan.destroy');

    Route::delete('/data-organisasi/destroy/{id}', [PrestasiController::class, 'organisasi_destroy'])->name('data-organisasi.destroy');

    Route::get('/data-pelatihan/cetak', [PrestasiController::class, 'pelatihan_cetak'])->name('data-pelatihan.cetak');
    Route::get('/data-kejuaraan/cetak', [PrestasiController::class, 'kejuaraan_cetak'])->name('data-kejuaraan.cetak');
    Route::get('/data-organisasi/cetak', [PrestasiController::class, 'organisasi_cetak'])->name('data-organisasi.cetak');

    Route::get('/data-yudisium/cetak-excel', [AdminYudisiumController::class, 'export_excel'])->name('data-yudisium.cetak-excel');

    Route::get('/data-yudisium/hapus-semua-data', [AdminYudisiumController::class, 'delete_all_data'])->name('data-yudisium.hapus-semua-data');

    Route::delete('/data-yudisium/hapus-data-{id}', [AdminYudisiumController::class, 'destroy'])->name('data-yudisium.destroy');
});

require __DIR__.'/auth.php';
