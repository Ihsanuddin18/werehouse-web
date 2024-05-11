<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistikMasukTable extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('logistik_masuk', function (Blueprint $table) {
            $table->id('kode_logistik_masuk');
            $table->string('supplier'); 
            $table->string('nama_logistik');
            $table->date('tanggal_masuk');
            $table->integer('jumlah_terima');
            $table->string('satuan_terima');
            $table->date('tanggal_kadaluarsa'); 
            $table->string('dokumentasi_masuk'); 
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistik_masuk');
    }
}
