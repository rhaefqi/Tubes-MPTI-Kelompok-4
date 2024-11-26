<?php

namespace Database\Seeders;

use App\Models\AbsensiSiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AbsensiSiswa::create([
            'nisn' => '0042123456',
            'tanggal' => '2024-11-15',
            'jam' => '08:00:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123456',
            'tanggal' => '2024-11-14',
            'jam' => '08:00:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123456',
            'tanggal' => '2024-11-14',
            'jam' => '12:00:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123456',
            'tanggal' => '2024-11-13',
            'jam' => '12:00:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123456',
            'tanggal' => '2024-11-12',
            'jam' => '12:00:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123457',
            'tanggal' => '2024-11-15',
            'jam' => '08:30:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123457',
            'tanggal' => '2024-11-14',
            'jam' => '08:30:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123457',
            'tanggal' => '2024-11-13',
            'jam' => '08:30:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123457',
            'tanggal' => '2024-11-12',
            'jam' => '08:30:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123458',
            'tanggal' => '2024-11-15',
            'jam' => '09:00:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123457',
            'tanggal' => '2024-11-14',
            'jam' => '08:30:00'
        ]);

        AbsensiSiswa::create([
            'nisn' => '0042123458',
            'tanggal' => '2024-11-13',
            'jam' => '09:00:00'
        ]);
    }
}
