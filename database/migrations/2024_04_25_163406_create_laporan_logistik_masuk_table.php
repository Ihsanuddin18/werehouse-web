<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_logistik_masuk', function (Blueprint $table) {
            $table->id('kode_logistik');
            $table->string('nama_logistik');
            $table->string('nama_supplier');
            $table->integer('jumlah_masuk');
            $table->string('satuan_masuk');
            $table->date('expayer');
            $table->date('tanggal_masuk');
            $table->string('dokumentasi_masuk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_logistik_masuk');
    }
};
