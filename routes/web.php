<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambahAnggotaController;
use App\Http\Controllers\DataSupplierController;
use App\Http\Controllers\TambahSupplierController;
use App\Http\Controllers\LogistikMasukController;
use App\Http\Controllers\LogistikKeluarController;
use App\Http\Controllers\TambahLogistikMasukController;
use App\Http\Controllers\TambahLogistikKeluarController;
use App\Http\Controllers\LokasiPengirimanController;
use App\Http\Controllers\CetakBarcodeLabelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;



// landing pages 
Route::get('/', function () { return view('welcome');});
    Route::get('/about', [AboutController::class, 'showAbout'])->name('about');   
    Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');   
    Route::post('/submit-form', [ContactController::class, 'submitForm'])->name('submit.form');

// dashboard admin/user
Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
    Route::get('post',[HomeController::class,'post'])->middleware(['auth','anggota']);

// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/{id}/biography', [ProfileController::class, 'updateBiography'])->name('profile.updateBiography');
    Route::delete('/profile/{id}/biography', [ProfileController::class, 'destroyBiography'])->name('profile.destroyBiography');
    });



//COBA CRUD PRODUCTSSSSS
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('', 'index')->name('products');
    Route::get('create', 'create')->name('products.create');
    Route::post('store', 'store')->name('products.store');
    Route::get('show/{id}', 'show')->name('products.show');
    Route::get('edit/{id}', 'edit')->name('products.edit');
    Route::put('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });






//SUPPLIERSS NI BOS!!!
Route::controller(SupplierController::class)->prefix('suppliers')->group(function () {
    Route::get('', 'index')->name('suppliers');
    Route::get('create', 'create')->name('suppliers.create');
    Route::post('store', 'store')->name('suppliers.store');
    Route::get('show/{id}', 'show')->name('suppliers.show');
    Route::get('edit/{id}', 'edit')->name('suppliers.edit');
    Route::put('edit/{id}', 'update')->name('suppliers.update');
    Route::delete('destroy/{id}', 'destroy')->name('suppliers.destroy');
    });
















// Route Tambah Anggota
Route::get('/tambah-anggota', [TambahAnggotaController::class, 'index'])->name('tambah_anggota');
Route::get('/tambah-anggota', [TambahAnggotaController::class, 'showTambahAnggota'])->name('tambah_anggota'); 

    // Route untuk menyimpan data anggota baru
    Route::post('/tambah-anggota', [TambahAnggotaController::class, 'store'])->name('tambah_anggota.store');

    // Route untuk menghapus anggota
    Route::delete('/tambah-anggota/{id}', [TambahAnggotaController::class, 'destroy'])->name('tambah_anggota.destroy');


//Route Logistik Masuk 
Route::get('/logistik_masuk', [LogistikMasukController::class, 'index'])->name('logistik_masuk.index');
Route::get('/logistik-masuk', [LogistikMasukController::class, 'showLogistikMasuk'])->name('logistik_masuk'); 
    Route::get('/logistik_masuk/{id}/edit', [LogistikMasukController::class, 'edit'])->name('logistik_masuk.edit');
    Route::put('/logistik_masuk/{id}', [LogistikMasukController::class, 'update'])->name('logistik_masuk.update');
    Route::delete('/logistik_masuk/{id}', [LogistikMasukController::class, 'destroy'])->name('logistik_masuk.destroy');
    Route::get('/logistik_masuk/print', [LogistikMasukController::class, 'printPdf'])->name('logistik_masuk.printPdf');
    Route::get('/tambah-logistik-masuk', [TambahLogistikMasukController::class, 'showTambahLogistikMasuk'])->name('tambah_logistik_masuk');


//Route Logistik Keluar
Route::get('/logistik_keluar', [LogistikKeluarController::class, 'index'])->name('logistik_keluar.index');
Route::get('/logistik-keluar', [LogistikKeluarController::class, 'showLogistikKeluar'])->name('logistik_keluar'); 
    Route::get('/logistik_keluar/{id}/edit', [LogistikKeluarController::class, 'edit'])->name('logistik_keluar.edit');
    Route::put('/logistik_keluar/{id}', [LogistikKeluarController::class, 'update'])->name('logistik_keluar.update');
    Route::delete('/logistik_keluar/{id}', [LogistikKeluarController::class, 'destroy'])->name('logistik_keluar.destroy');
    Route::get('/logistik_keluar/print', [LogistikKeluarController::class, 'printPdf'])->name('logistik_keluar.printPdf');
    Route::get('/tambah-logistik-keluar', [TambahLogistikKeluarController::class, 'showTambahLogistikKeluar'])->name('tambah_logistik_keluar'); 


//Route Lokasi Pengiriman
    Route::get('/lokasi-pengiriman', [LokasiPengirimanController::class, 'showLokasiPengiriman'])->name('lokasi_pengiriman');
    
    
//Route Cetak Barcode Label
    Route::get('/cetak-barcode-label', [CetakBarcodeLabelController::class, 'showCetakBarcodeLabel'])->name('cetak_barcode_label');   


require __DIR__.'/auth.php';
