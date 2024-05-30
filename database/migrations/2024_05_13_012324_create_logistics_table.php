<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('logistics', function (Blueprint $table) {
            $table->id();
            $table->string('kode_logistik');
            $table->string('nama_logistik');
            $table->string('satuan_logistik');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('logistics');
    }
};
