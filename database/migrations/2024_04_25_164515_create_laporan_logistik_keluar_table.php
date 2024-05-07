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
        Schema::create('laporan_logistik_keluar', function (Blueprint $table) {
            $table->id('nama-logistik');
            $table->integer('jumlah_keluar');
            $table->string('satuan_keluar');
            $table->string('nama_penerima_bantuan');
            $table->integer('nik_kk');
            $table->string('alamat_penerima');
            $table->date('tanggal_keluar');
            $table->string('keterangan_bantuan');
            $table->string('dokumentasi_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_logistik_keluar');
    }
};
