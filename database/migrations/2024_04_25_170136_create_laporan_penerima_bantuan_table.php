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
        Schema::create('laporan_penerima_bantuan', function (Blueprint $table) {
            $table->id('penerima_bantuan');
            $table->string('nama_penerima');
            $table->string('alamat_penerima');
            $table->string('nik_kk');
            $table->string('keterangan_bantuan');
            $table->string('jenis_bantuan');
            $table->integer('jumlah_bantuan');
            $table->string('satuan_keluar');
            $table->string('lokasi_bantuan');
            $table->binary('dokumentasi_bantuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penerima_bantuan');
    }
};
