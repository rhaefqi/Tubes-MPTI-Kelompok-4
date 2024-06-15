<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nip' => '111111111111111111',
            'nama' => 'Temp Guru',
            'tingkat' => 'MA',
            'jenis_kelamin' => 'L',
            'user_id' => '1'
        ]);

        Guru::create([
            'nip' => '123456789123456789',
            'nama' => 'Rifqi Jabrah Rhae',
            'tingkat' => 'MA',
            'jenis_kelamin' => 'L',
            'user_id' => '5'
        ]);

        Guru::create([
            'nip' => '123456789123456788',
            'nama' => 'Fadillah Emilia Nst',
            'tingkat' => 'MA',
            'jenis_kelamin' => 'P',
            'user_id' => '7'
        ]);

        Guru::create([
            'nip' => '123456789123456787',
            'nama' => 'Muhammad Irvi Hafizi',
            'tingkat' => 'MTs',
            'jenis_kelamin' => 'L',
            'user_id' => '1'
        ]);
    }
}
