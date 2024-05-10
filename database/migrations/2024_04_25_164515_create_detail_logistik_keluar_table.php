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
        Schema::create('detail_logistik_keluar', function (Blueprint $table) {
            $table->id('kode_detail_logistik_keluar');
            $table->unsignedBigInteger('kode_logistik_keluar');
            $table->unsignedBigInteger('kode_data_logistik');
            $table->timestamps();

            // Menambahkan kunci asing untuk kode_logistik_keluar
            $table->foreign('kode_logistik_keluar')->references('id')->on('logistik_kelaur');
            
            // Menambahkan kunci asing untuk kode_data_logistik
            $table->foreign('kode_data_logistik')->references('id')->on('data_logistik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_logistik_keluar');
    }
};
