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
            'tanggal_pinjam' => '2024-05-27'
        ]);

        PeminjamanSiswa::create([
            'nisn' => '0042123456',
            'buku_id' => 2,
            'jumlah_dipinjam' => 1,
            'status' => 'dikembalikan',
            'tanggal_pinjam' => '2024-05-05',
            'tanggal_kembali' => '2024-05-06'
        ]);

        PeminjamanSiswa::create([
            'nisn' => '0042123456',
            'buku_id' => 1,
            'jumlah_dipinjam' => 1,
            'status' => 'lewat tenggat',
            'tanggal_pinjam' => '2024-05-05',
            'tanggal_kembali' => '2024-05-12'
        ]);
    }
}
