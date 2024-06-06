<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'kelas' => 'XII MIPA-1',
            'tingkat' => 'MA',
            'wali_kelas' => '123456789123456789'
        ]);

        Kelas::create([
            'kelas' => 'X MIPA-1',
            'tingkat' => 'MA',
            'wali_kelas' => '123456789123456788'
        ]);

        Kelas::create([
            'kelas' => 'IX-1',
            'tingkat' => 'MTs',
            'wali_kelas' => '123456789123456787'
        ]);
    }
}
