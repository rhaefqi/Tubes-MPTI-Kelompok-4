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
        Schema::create('log_peminjaman', function (Blueprint $table) {
            $table->char('nip', 18);
            $table->unsignedInteger('buku_id');
            $table->integer('jumlah_dipinjam');
            $table->enum('status', ['masa pinjam', 'dikembalikan', 'lewat tenggat']);
            $table->enum('action', ['INSERT','UPDATE', 'DELETE']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_peminjamen');
    }
};
