<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CetakBarcodeLabelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\InlogisticController;
use App\Http\Controllers\OutlogisticController;





Route::get('/', function () { return view('welcome');});
    Route::get('/about', [AboutController::class, 'showAbout'])->name('about');   
    Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');   
    Route::post('/submit-form', [ContactController::class, 'submitForm'])->name('submit.form');


Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
    Route::get('post',[HomeController::class,'post'])->middleware(['auth','anggota']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/{id}/biography', [ProfileController::class, 'updateBiography'])->name('profile.updateBiography');
    Route::delete('/profile/{id}/biography', [ProfileController::class, 'destroyBiography'])->name('profile.destroyBiography');
    });


Route::controller(SupplierController::class)->prefix('suppliers')->group(function () {
    Route::get('', 'index')->name('suppliers');
    Route::get('create', 'create')->name('suppliers.create');
    Route::post('store', 'store')->name('suppliers.store');
    Route::get('show/{id}', 'show')->name('suppliers.show');
    Route::get('edit/{id}', 'edit')->name('suppliers.edit');
    Route::put('edit/{id}', 'update')->name('suppliers.update');
    Route::delete('destroy/{id}', 'destroy')->name('suppliers.destroy');
    });


Route::controller(LogisticController::class)->prefix('logistics')->group(function () {
    Route::get('', 'index')->name('logistics');
    Route::get('create', 'create')->name('logistics.create');
    Route::post('store', 'store')->name('logistics.store');
    Route::get('show/{id}', 'show')->name('logistics.show');
    Route::get('edit/{id}', 'edit')->name('logistics.edit');
    Route::put('edit/{id}', 'update')->name('logistics.update');
    Route::delete('destroy/{id}', 'destroy')->name('logistics.destroy');
    }); 


Route::controller(InlogisticController::class)->prefix('inlogistics')->group(function () {
    Route::get('', 'index')->name('inlogistics');
    Route::get('create', 'create')->name('inlogistics.create');
    Route::post('store', 'store')->name('inlogistics.store');
    Route::get('show/{id}', 'show')->name('inlogistics.show');
    Route::get('edit/{id}', 'edit')->name('inlogistics.edit');
    Route::put('edit/{id}', 'update')->name('inlogistics.update');
    Route::delete('destroy/{id}', 'destroy')->name('inlogistics.destroy');
    }); 


Route::controller(OutlogisticController::class)->prefix('outlogistics')->group(function () {
    Route::get('', 'index')->name('outlogistics');
    Route::get('create', 'create')->name('outlogistics.create');
    Route::post('store', 'store')->name('outlogistics.store');
    Route::get('show/{id}', 'show')->name('outlogistics.show');
    Route::get('edit/{id}', 'edit')->name('outlogistics.edit');
    Route::put('edit/{id}', 'update')->name('outlogistics.update');
    Route::delete('destroy/{id}', 'destroy')->name('outlogistics.destroy');
    }); 
















    
//Route Cetak Barcode Label
    Route::get('/cetak-barcode-label', [CetakBarcodeLabelController::class, 'showCetakBarcodeLabel'])->name('cetak_barcode_label');   


require __DIR__.'/auth.php';
