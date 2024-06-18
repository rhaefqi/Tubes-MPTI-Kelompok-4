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
        Schema::create('absensi_gurus', function (Blueprint $table) {
            $table->char('nip', 18);
            $table->foreign('nip')->references('nip')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal')->nullable();
            $table->time('jam')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_gurus');
    }
};
