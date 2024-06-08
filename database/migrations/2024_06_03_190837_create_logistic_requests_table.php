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
        Schema::create('logistic_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_logistik')->constrained('logistics')->onDelete('cascade');
            $table->foreignId('id_inlogistik')->constrained('inlogistics')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->integer('jumlah_logistik_request');
            $table->date('tanggal_kejadian_request');
            $table->string('nama_penerima_request');
            $table->string('nik_kk_request');
            $table->string('alamat_penerima_request');
            $table->string('keterangan_request');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistic_requests');
    }
};
