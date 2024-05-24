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
        Schema::create('bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->char('no_seri', 12);
            $table->char('isbn', 13);
            $table->string('judul', 500);
            $table->string('penulis');
            $table->string('penerbit');
            $table->text('deskripsi');
            $table->integer('view')->default(0);
            $table->char('tahun_terbit', 4);
            $table->enum('kelas', ['MA', 'MTs', 'SD', 'Lainnya']);
            $table->string('sampul_buku');
            $table->string('kategori')->nullable();
            $table->foreign('kategori')->references('kategori')->on('kategori_bukus')->onDelete('restrict')->onUpdate('cascade');
            $table->string('subjek')->nullable();
            $table->foreign('subjek')->references('subjek')->on('subjek_bukus')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('jumlah_tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
