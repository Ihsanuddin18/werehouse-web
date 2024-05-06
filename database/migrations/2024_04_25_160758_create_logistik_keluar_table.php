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
        Schema::create('logistik_keluar', function (Blueprint $table) {
            $table->id('kode_logistik');
            $table->string('nama_logistik');
            $table->string('nama_penerima');
            $table->integer('nik_kk_penerima');
            $table->string('alamat_penerima');
            $table->date('tanggal_keluar');
            $table->string('keterangan_keluar');
            $table->integer('jumlah_keluar');
            $table->string('satuan_keluar');
            $table->string('dokumentasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistik_keluar');
    }
};
