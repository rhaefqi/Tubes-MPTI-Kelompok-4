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
            'status' => 'dipinjam'
        ]);

        PeminjamanSiswa::create([
            'nisn' => '0042123456',
            'buku_id' => 2,
            'jumlah_dipinjam' => 1,
            'status' => 'dikembalikan'
        ]);

        PeminjamanSiswa::create([
            'nisn' => '0042123456',
            'buku_id' => 1,
            'jumlah_dipinjam' => 1,
            'status' => 'lewat tenggat'
        ]);
    }
}
