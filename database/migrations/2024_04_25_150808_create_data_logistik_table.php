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
        Schema::create('data_logistik', function (Blueprint $table) {
            $table->id('id_logistik');
            $table->string('nama_logistik');
            $table->string('bantuan_dari');
            $table->integer('stok_masuk');
            $table->integer('stok_keluar');
            $table->integer('sisa_logistik');
            $table->string('satuan_logistik');
            $table->date('expayer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_logistik');
    }
};