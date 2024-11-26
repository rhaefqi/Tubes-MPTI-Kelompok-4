<?php

namespace Database\Seeders;

use App\Models\KategoriBuku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriBuku::create([
            'kategori' => 'Buku Pelajaran'
        ]);

        KategoriBuku::create([
            'kategori' => 'Novel'
        ]);

        KategoriBuku::create([
            'kategori' => 'Motivasi'
        ]);

        KategoriBuku::create([
            'kategori' => 'Bebas'
        ]);
    }
}
