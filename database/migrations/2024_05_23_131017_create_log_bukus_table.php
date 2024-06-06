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
        Schema::create('log_bukus', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->char('no_seri', 12);
            $table->char('isbn', 13);
            $table->string('judul', 500);
            $table->string('penulis');
            $table->string('penerbit');
            $table->text('deskripsi');
            $table->integer('view')->default(0);
            $table->char('tahun_terbit', 4);
            $table->enum('kelas', ['MA', 'MTs', 'SD', 'Lainnya']);
            $table->string('kategori');
            $table->string('subjek');
            $table->integer('jumlah_tersedia');
            $table->string('diupload_oleh');
            $table->enum('action', ['INSERT','UPDATE', 'DELETE']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_bukus');
    }
};
