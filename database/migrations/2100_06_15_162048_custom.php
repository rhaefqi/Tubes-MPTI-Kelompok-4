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
        DB::unprepared('
            DROP VIEW IF EXISTS view_absensi;
            CREATE VIEW view_absensi AS 
            SELECT
                a.nisn AS nisn_nip,
                s.nama,
                "siswa" AS status,
                a.tanggal,
                a.jam
            FROM absensi_siswas a 
            JOIN siswas s ON s.nisn = a.nisn
            UNION
            SELECT
                b.nip AS nisn_nip,
                g.nama,
                "guru" AS status,
                b.tanggal,
                b.jam
            FROM absensi_gurus b
            JOIN gurus g ON g.nip = b.nip
            ORDER BY tanggal
        ');

        DB::unprepared('
            DROP VIEW IF EXISTS view_guru_siswa;
            CREATE VIEW view_guru_siswa AS 
            SELECT
                a.nisn AS nisn_nip,
                a.nama,
                "siswa" AS status,
                a.tingkat,
                a.kelas,
                a.jenis_kelamin,
                a.user_id
            FROM siswas a
            UNION
            SELECT
                b.nip AS nisn_nip,
                b.nama,
                "guru" AS status,
                b.tingkat,
                NULL AS kelas,
                b.jenis_kelamin,
                b.user_id
            FROM gurus b WHERE NOT B.nip = "111111111111111111"
        ');

        DB::unprepared('
            DROP VIEW IF EXISTS view_peminjaman;
            CREATE VIEW view_peminjaman AS 
            SELECT
                p.nisn AS nisn_nip,
                p.buku_id,
                b.judul,
                s.nama,
                "siswa" AS tingkat,
                p.tanggal_pinjam,
                p.jumlah_dipinjam,
                p.status 
            FROM peminjaman_siswas p
            JOIN siswas s ON s.nisn = p.nisn
            JOIN bukus b ON b.id = p.buku_id
            WHERE NOT p.status = "dikembalikan"
            UNION
            SELECT
                p.nip AS nisn_nip,
                p.buku_id,
                b.judul,
                g.nama,
                "guru" AS tingkat,
                p.tanggal_pinjam,
                p.jumlah_dipinjam,
                p.status 
            FROM peminjaman_gurus p
            JOIN gurus g ON g.nip = p.nip
            JOIN bukus b ON b.id = p.buku_id
            WHERE NOT p.status = "dikembalikan"
            ORDER BY tanggal_pinjam
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
