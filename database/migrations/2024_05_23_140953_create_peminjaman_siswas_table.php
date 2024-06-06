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
        Schema::create('peminjaman_siswas', function (Blueprint $table) {
            $table->char('nisn', 10);
            $table->foreign('nisn')->references('nisn')->on('siswas')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('jumlah_dipinjam');
            $table->enum('status', ['dipinjam', 'dikembalikan', 'lewat tenggat']);
            $table->date('tanggal_pinjam')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_siswas');
    }
};
