<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambahAnggotaController;
use App\Http\Controllers\DataLogistikController;
use App\Http\Controllers\TambahDataController;
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
Route::get('/about', [AboutController::class, 'showAbout'])->name('about');   
Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');   


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


// Route Tambah Anggota
Route::get('/tambah-anggota', [TambahAnggotaController::class, 'index'])->name('tambah_anggota');
Route::get('/tambah-anggota', [TambahAnggotaController::class, 'showTambahAnggota'])->name('tambah_anggota'); 

    // Route untuk menyimpan data anggota baru
    Route::post('/tambah-anggota', [TambahAnggotaController::class, 'store'])->name('tambah_anggota.store');

    // Route untuk menghapus anggota
    Route::delete('/tambah-anggota/{id}', [TambahAnggotaController::class, 'destroy'])->name('tambah_anggota.destroy');



// Route untuk menampilkan DATA LOGISTIK
 Route::get('/data-logistik', [DataLogistikController::class, 'showDataLogistik'])->name('data_logistik');

 

    // Route untuk menampilkan halaman tambah data logistik
    Route::get('/tambah-data', [TambahDataController::class, 'showTambahData'])->name('tambah_data');

    // Route untuk menambahkan data logistik
    Route::post('/tambah-data', [TambahDataController::class, 'tambahDataLogistik'])->name('tambah_data_post');

    // Route untuk menampilkan halaman edit data logistik
    Route::get('/edit-data/{id}', [DataLogistikController::class, 'showEditDataLogistik'])->name('edit_data');

    // Route untuk menyimpan perubahan pada data logistik yang diedit
    Route::post('/edit-data/{id}', [DataLogistikController::class, 'editDataLogistik'])->name('edit_data_post');

    // Route untuk menghapus data logistik
    Route::post('/hapus-data/{id}', [DataLogistikController::class, 'hapusDataLogistik'])->name('hapus_data');

    // Route untuk menampilkan halaman scanner barcode
    Route::get('/scanner', [ScannerController::class, 'showScanner'])->name('scanner');

    // Route untuk melakukan proses scanning barcode dan menambahkan data logistik baru
    Route::post('/scanner', [ScannerController::class, 'scannerBarcode'])->name('scanner_post');

    // Route untuk mencetak/print sticker barcode label
    Route::get('/cetak-sticker/{id}', [DataLogistikController::class, 'cetakSticker'])->name('cetak_sticker');



//Route Data Supplier
Route::get('/data-supplier', [DataSupplierController::class, 'index'])->name('data-supplier.index');
Route::get('/data-supplier', [DataSupplierController::class, 'showDataSupplier'])->name('data_supplier'); 
    Route::get('/data-supplier/{id}/edit', [DataSupplierController::class, 'edit'])->name('data-supplier.edit');
    Route::put('/data-supplier/{id}', [DataSupplierController::class, 'update'])->name('data-supplier.update');
    Route::delete('/data-supplier/{id}', [DataSupplierController::class, 'destroy'])->name('data-supplier.destroy');
    Route::get('/tambah-supplier', [TambahSupplierController::class, 'showTambahSupplier'])->name('tambah_supplier');


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
