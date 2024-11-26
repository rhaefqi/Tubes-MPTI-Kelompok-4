<?php

namespace Database\Seeders;

use App\Models\SubjekBuku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjekBukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubjekBuku::create([
            'subjek' => 'Fisika'
        ]);

        SubjekBuku::create([
            'subjek' => 'Kimia'
        ]);

        SubjekBuku::create([
            'subjek' => 'Biologi'
        ]);

        SubjekBuku::create([
            'subjek' => 'Ekonomi'
        ]);

        SubjekBuku::create([
            'subjek' => 'Kewarganegaraan'
        ]);

        SubjekBuku::create([
            'subjek' => 'Seni'
        ]);

        SubjekBuku::create([
            'subjek' => 'Olahraga'
        ]);

        SubjekBuku::create([
            'subjek' => 'Matematika'
        ]);

        SubjekBuku::create([
            'subjek' => 'Lainnya'
        ]);
    }
}
