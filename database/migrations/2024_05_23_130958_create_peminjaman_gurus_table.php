<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman_gurus', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nip', 18);
            $table->foreign('nip')->references('nip')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('jumlah_dipinjam');
            $table->enum('status', ['dipinjam', 'dikembalikan', 'lewat_tenggat']);
            $table->date('tanggal_pinjam')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->timestamps();
        });
        DB::unprepared('
            CREATE TRIGGER log_peminjaman_gurus_insert AFTER INSERT ON `peminjaman_gurus` FOR EACH ROW
            BEGIN
                INSERT INTO log_peminjaman VALUES (NEW.nip, NEW.buku_id, NEW.jumlah_dipinjam, NEW.status, "INSERT", CURRENT_TIMESTAMP());
            END
        ');
        
        DB::unprepared('
            CREATE TRIGGER log_peminjaman_gurus_update AFTER UPDATE ON `peminjaman_gurus` FOR EACH ROW
            BEGIN
                INSERT INTO log_peminjaman VALUES (NEW.nip, NEW.buku_id, NEW.jumlah_dipinjam, NEW.status, "UPDATE", CURRENT_TIMESTAMP());
            END
        ');
        
        DB::unprepared('
            CREATE TRIGGER log_peminjaman_gurus_delete AFTER DELETE ON `peminjaman_gurus` FOR EACH ROW
            BEGIN
                INSERT INTO log_peminjaman VALUES (OLD.nip, OLD.buku_id, OLD.jumlah_dipinjam, OLD.status, "DELETE", CURRENT_TIMESTAMP());
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_gurus');
    }
};
