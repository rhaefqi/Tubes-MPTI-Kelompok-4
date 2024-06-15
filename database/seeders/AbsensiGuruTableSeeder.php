<?php

namespace Database\Seeders;

use App\Models\AbsensiGuru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiGuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AbsensiGuru::create([
            'nip' => '123456789123456787',
            'tanggal' => '2024-06-15',
            'jam' => '08:00:00'
        ]);
        AbsensiGuru::create([
            'nip' => '123456789123456788',
            'tanggal' => '2024-06-14',
            'jam' => '08:00:00'
        ]);
        AbsensiGuru::create([
            'nip' => '123456789123456789',
            'tanggal' => '2024-06-13',
            'jam' => '08:00:00'
        ]);
    }
}
