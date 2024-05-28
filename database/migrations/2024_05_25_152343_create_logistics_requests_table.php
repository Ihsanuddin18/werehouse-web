<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('logistics_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->text('list_logistik');
            $table->string('lokasi_pengiriman');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistics_requests');
    }
};
