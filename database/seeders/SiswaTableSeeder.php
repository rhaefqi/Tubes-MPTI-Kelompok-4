<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'nisn' => '0042123456',
            'nama' => 'Andy Septiawan Saragih',
            'tingkat' => 'MA',
            'kelas' => 'XII',
            'jenis_kelamin' => 'L',
            'user_id' => 1
        ]);

        Siswa::create([
            'nisn' => '0042123457',
            'nama' => 'Yohana Marito Marbun',
            'tingkat' => 'MTs',
            'kelas' => 'IX',
            'jenis_kelamin' => 'P',
            'user_id' => 6
        ]);

        Siswa::create([
            'nisn' => '0042123458',
            'nama' => 'Devandra Deal Fatahillah',
            'tingkat' => 'MA',
            'kelas' => 'X',
            'jenis_kelamin' => 'L',
            'user_id' => 1
        ]);
    }
}
