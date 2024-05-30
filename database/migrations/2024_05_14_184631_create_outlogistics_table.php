<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('outlogistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_logistik')->constrained('logistics')->onDelete('cascade');
            $table->foreignId('id_inlogistik')->constrained('inlogistics')->onDelete('cascade');
            $table->integer('jumlah_logistik_keluar');
            $table->date('tanggal_keluar');
            $table->string('nama_penerima');
            $table->string('nik_kk_penerima');
            $table->string('alamat_penerima');
            $table->string('keterangan_keluar');
            $table->string('dokumentasi_keluar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outlogistics');
    }
};