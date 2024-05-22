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
            $table->foreignId('id_logistik')->constrained('logistics')->onDelete('cascade');
            $table->foreignId('id_supplier')->constrained('suppliers')->onDelete('cascade');
            $table->integer('jumlah_logistik_masuk');
            $table->date('tanggal_masuk');
            $table->date('expayer_logistik');
            $table->string('keterangan_masuk');
            $table->string('dokumentasi_masuk');
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