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
        Schema::create('penerimaan_logistik', function (Blueprint $table) {
            $table->id('id_penerimaan');
            $table->string('nama_logistik');
            $table->string('bantuan_dari');
            $table->date('tgl_terima');
            $table->integer('jumlah_terima');
            $table->string('satuan_terima');
            $table->date('expayer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_logistik');
    }
};
