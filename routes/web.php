<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambahAkunAdminController;
use App\Http\Controllers\TambahAkunAnggotaController;


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
    Route::post('/profile/updateProfilePicture', [ProfileController::class, 'updateProfilePicture'])->name('profile.updateProfilePicture');
});

    
//Route Tambah Akun
    Route::get('/tambah-akun-admin', [TambahAkunAdminController::class, 'showTambahAkunAdmin'])->name('tambah_akun_admin');    
    Route::get('/tambah-akun-anggota', [TambahAkunAnggotaController::class, 'showTambahAkunAnggota'])->name('tambah_akun_anggota');    





require __DIR__.'/auth.php';
