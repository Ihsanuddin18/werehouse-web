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
        Schema::create('penerima_bantuan', function (Blueprint $table) {
            $table->id('id_penerima');
            $table->string('nama_penerima');
            $table->integer('nik_kk');
            $table->string('alamat_penerima');
            $table->string('keterangan_penerima');
            $table->string('jenis_bantuan');
            $table->binary('dokumentasi_bantuan');
            $table->date('tgl_penerima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bantuan');
    }
};
