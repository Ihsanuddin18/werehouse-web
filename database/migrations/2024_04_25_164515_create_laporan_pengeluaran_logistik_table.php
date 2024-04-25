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
        Schema::create('laporan_pengeluaran_logistik', function (Blueprint $table) {
            $table->id('id_pengeluaran');
            $table->string('nama_penerima');
            $table->date('tgl_pengeluaran');
            $table->string('keterangan_pengeluaran');
            $table->string('jenis_logistik');
            $table->integer('jumlah_pengeluaran');
            $table->string('satuan_pengeluaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pengeluaran_logistik');
    }
};
