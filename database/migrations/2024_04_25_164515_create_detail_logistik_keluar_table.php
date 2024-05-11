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
            $table->string('kode_logistik_keluar');
            $table->integer('kode_data_logistik');
            $table->timestamps();

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
