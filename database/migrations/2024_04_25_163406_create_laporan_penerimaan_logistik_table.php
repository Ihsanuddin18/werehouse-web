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
        Schema::create('laporan_penerimaan_logistik', function (Blueprint $table) {
            $table->id('id_penerimaan');
            $table->string('bantuan_dari');
            $table->date('tgl_penerimaan');
            $table->string('jenis_penerimaan');
            $table->integer('jumlah_penerimaan');
            $table->string('satuan_penerimaan');
            $table->date('expayer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penerimaan_logistik');
    }
};
