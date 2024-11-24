<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PeminjamanSiswa;
use App\Models\Petugas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserTableSeeder::class);
        $this->call(GuruTableSeeder::class);
        $this->call(PetugasTableSeeder::class);
        $this->call(KategoriBukuTableSeeder::class);
        $this->call(SubjekBukuTableSeeder::class);
        $this->call(BukuTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(PeminjamanSiswaTableSeeder::class);
        $this->call(PeminjamanGuruTableSeeder::class);
        $this->call(AbsensiGuruTableSeeder::class);
        $this->call(AbsensiSiswaTableSeeder::class);
    }
}
