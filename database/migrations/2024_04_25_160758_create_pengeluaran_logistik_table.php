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
        Schema::create('pengeluaran_logistik', function (Blueprint $table) {
            $table->id('id_keluar');
            $table->string('nama_penerima');
            $table->integer('nik_kk_penerima');
            $table->date('tgl_keluar');
            $table->string('keterangan_keluar');
            $table->string('jenis_logistik');
            $table->integer('jumlah_keluar');
            $table->integer('satuan_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran_logistik');
    }
};
