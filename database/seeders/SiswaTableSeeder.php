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
        ]);

        Siswa::create([
            'nisn' => '0042123457',
            'nama' => 'Ruth Grace Arlyana Manurung',
            'tingkat' => 'MTs',
            'kelas' => 'IX',
            'jenis_kelamin' => 'P',
        ]);

        Siswa::create([
            'nisn' => '0042123458',
            'nama' => 'Fadhil Muhammad Lubis',
            'tingkat' => 'MA',
            'kelas' => 'X',
            'jenis_kelamin' => 'L',
        ]);

        Siswa::create([
            'nisn' => '0042123459',
            'nama' => 'Dinda Ayu Pratiwi',
            'tingkat' => 'MA',
            'kelas' => 'X',
            'jenis_kelamin' => 'P',
        ]);
        
        Siswa::create([
            'nisn' => '0042123460',
            'nama' => 'Rizky Ahmad Saputra',
            'tingkat' => 'MA',
            'kelas' => 'XI',
            'jenis_kelamin' => 'L',
        ]);
        
        Siswa::create([
            'nisn' => '0042123461',
            'nama' => 'Siti Nur Aisyah',
            'tingkat' => 'MA',
            'kelas' => 'XII',
            'jenis_kelamin' => 'P',
        ]);
        
        Siswa::create([
            'nisn' => '0042123462',
            'nama' => 'Bagus Tri Purnama',
            'tingkat' => 'MA',
            'kelas' => 'XI',
            'jenis_kelamin' => 'L',
        ]);
        
        Siswa::create([
            'nisn' => '0042123463',
            'nama' => 'Putri Ananda Salsabila',
            'tingkat' => 'MA',
            'kelas' => 'X',
            'jenis_kelamin' => 'P',
        ]);
    }
}
