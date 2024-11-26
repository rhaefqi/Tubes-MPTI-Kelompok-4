<?php

namespace Database\Seeders;

use App\Models\PeminjamanGuru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanGuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeminjamanGuru::create([
            'nip' => '123456789123456789',
            'buku_id' => 1,
            'jumlah_dipinjam' => 1,
            'status' => 'dipinjam',
            'tanggal_pinjam' => '2024-11-05',
        ]);

        PeminjamanGuru::create([
            'nip' => '123456789123456788',
            'buku_id' => 1,
            'jumlah_dipinjam' => 1,
            'status' => 'dipinjam',
            'tanggal_pinjam' => '2024-11-03',
        ]);

        PeminjamanGuru::create([
            'nip' => '123456789123456787',
            'buku_id' => 1,
            'jumlah_dipinjam' => 1,
            'status' => 'dipinjam',
            'tanggal_pinjam' => '2024-11-02',
        ]);

        PeminjamanGuru::create([
            'nip' => '123456789123456787',
            'buku_id' => 2,
            'jumlah_dipinjam' => 1,
            'status' => 'dipinjam',
            'tanggal_pinjam' => '2024-11-01',
        ]);
    }
}
