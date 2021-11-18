<?php

use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\YudisiumController as AdminYudisiumController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

Route::middleware(['auth'])
->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileControler::class, 'edit'])->name('profile.edit');

    Route::put('/profile/update', [ProfileControler::class, 'update'])->name('profile.update');

    Route::resource('prestasi-mahasiswa', PrestasiMahasiswaController::class);

});

Route::middleware(['mahasiswa','auth'])
->group(function() {
    Route::resource('yudisium', YudisiumController::class);
});

Route::middleware(['admin','auth'])
->group(function() {
    Route::resource('data-mahasiswa', MahasiswaController::class);
    Route::resource('data-alumni', AlumniController::class);
    Route::get('/data-yudisium', [AdminYudisiumController::class, 'index'])->name('data-yudisium.index');
    Route::get('/data-yudisium/{id}/pindah_ke_alumni', [AdminYudisiumController::class, 'to_alumni'])->name('data-yudisium.to-alumni');
});

require __DIR__.'/auth.php';
