<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Route tampilan landing-pages 
Route::get('/', function () {
    return view('welcome');
});


// Route tampilan dashboard 
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

require __DIR__.'/auth.php';
