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
            $table->string('request_nama_logistik_keluar');
            $table->integer('request_jumlah_logistik_keluar');
            $table->string('alamat_penerima_logistik');
            $table->string('keterangan_penerima_logistik');
            $table->date('tanggal_kejadian_bencana');
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
