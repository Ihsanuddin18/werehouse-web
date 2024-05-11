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
        Schema::create('detail_logistik_masuk', function (Blueprint $table) {
            $table->id('kode_detail_logistik_masuk');
            $table->string('kode_data_logistik');
            $table->string('id_supplier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_logistik_masuk');
    }
};
