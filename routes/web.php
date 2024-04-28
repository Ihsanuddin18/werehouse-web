<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambahAkunAdminController;
use App\Http\Controllers\TambahAkunAnggotaController;
use App\Http\Controllers\DataLogistikController;
use App\Http\Controllers\TambahDataController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Route landing-pages 
Route::get('/', function () {
    return view('welcome');
});


// Route dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Route Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/{id}/biography', [ProfileController::class, 'updateBiography'])->name('profile.updateBiography');
    Route::delete('/profile/{id}/biography', [ProfileController::class, 'destroyBiography'])->name('profile.destroyBiography');
    
});


//Route Tambah Akun
    Route::get('/tambah-akun-admin', [TambahAkunAdminController::class, 'showTambahAkunAdmin'])->name('tambah_akun_admin');    
    Route::get('/tambah-akun-anggota', [TambahAkunAnggotaController::class, 'showTambahAkunAnggota'])->name('tambah_akun_anggota');    


//Route Data Logistik
    Route::get('/data-logistik', [DataLogistikController::class, 'showDataLogistik'])->name('data_logistik');
    Route::get('/tambah-data', [TambahDataController::class, 'showTambahData'])->name('tambah_data');



require __DIR__.'/auth.php';
