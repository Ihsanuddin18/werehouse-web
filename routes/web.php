<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambahAkunAdminController;
use App\Http\Controllers\TambahAkunAnggotaController;
use App\Http\Controllers\DataLogistikController;
use App\Http\Controllers\TambahDataController;
use App\Http\Controllers\DataSupplierController;
use App\Http\Controllers\TambahSupplierController;
use App\Http\Controllers\LogistikMasukController;
use App\Http\Controllers\LogistikkeluarController;


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


//Route Data Supplier
    Route::get('/data-supplier', [DataSupplierController::class, 'showDataSupplier'])->name('data_supplier');
    Route::get('/tambah-supplier', [TambahSupplierController::class, 'showTambahSupplier'])->name('tambah_supplier');


//Route Logistik masuk dan keluar
    Route::get('/logistik-masuk', [LogistikMasukController::class, 'showLogistikMasuk'])->name('logistik_masuk');
    Route::get('/logistik-keluar', [LogistikKeluarController::class, 'showLogistikKeluar'])->name('logistik_keluar');



require __DIR__.'/auth.php';
