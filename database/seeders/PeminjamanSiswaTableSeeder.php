<?php

namespace Database\Seeders;

use App\Models\PeminjamanSiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeminjamanSiswa::create([
            'nisn' => '0042123456',
            'buku_id' => 3,
            'jumlah_dipinjam' => 1,
            'status' => 'dipinjam',
            'tanggal_pinjam' => '2024-11-22'
        ]);

        PeminjamanSiswa::create([
            'nisn' => '0042123456',
            'buku_id' => 2,
            'jumlah_dipinjam' => 1,
            'status' => 'dipinjam',
            'tanggal_pinjam' => '2024-11-21'
        ]);

        PeminjamanSiswa::create([
            'nisn' => '0042123456',
            'buku_id' => 2,
            'jumlah_dipinjam' => 1,
            'status' => 'dikembalikan',
            'tanggal_pinjam' => '2024-11-11',
            'tanggal_kembali' => '2024-11-13'
        ]);

        PeminjamanSiswa::create([
            'nisn' => '0042123456',
            'buku_id' => 1,
            'jumlah_dipinjam' => 1,
            'status' => 'lewat_tenggat',
            'tanggal_pinjam' => '2024-11-11',
            'tanggal_kembali' => '2024-11-17'
        ]);

        PeminjamanSiswa::create([
            'nisn' => '0042123457',
            'buku_id' => 1,
            'jumlah_dipinjam' => 1,
            'status' => 'dipinjam',
            'tanggal_pinjam' => '2024-11-05',
        ]);
    }
}
