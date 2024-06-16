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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
