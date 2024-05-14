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
        Schema::create('inlogistics', function (Blueprint $table) {
            $table->id();
            $table->string('nama_logistik_masuk');
            $table->string('satuan_logistik_masuk');
            $table->integer('jumlah_logistik_masuk');
            $table->string('nama_supplier');
            $table->date('tanggal_masuk');
            $table->date('expayer_logistik');
            $table->string('keterangan_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inlogistics');
    }
};
