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
        Schema::create('logistik_masuk', function (Blueprint $table) {
            $table->id('kode_logistik_masuk');
            $table->foreign('id');
            $table->string('nama_logistik');
            $table->foreign('id_supplier');
            $table->date('tanggal_masuk');
            $table->integer('jumlah_terima');
            $table->string('satuan_terima');
            $table->date('expayer_logistik');
            $table->string('dokumentasi_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistik_masuk');
    }
};
