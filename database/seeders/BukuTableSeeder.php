<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'no_seri' => '004.65/RIF/L',
            'isbn' => '1234567890123',
            'judul' => 'Lorem Ipsum',
            'penulis' => 'Rifqi Jabrah',
            'penerbit' => 'Rhae Group',
            'deskripsi' => 'Nisi quis cillum tempor sit qui Lorem. Ad dolore enim do amet cillum ipsum excepteur mollit. Minim tempor tempor in officia reprehenderit ea aliquip quis excepteur.',
            'tahun_terbit' => '2022',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'lorem.jpg',
            'kategori' => 'Motivasi',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '4'
        ]);

        Buku::create([
            'no_seri' => '123.65/AND/L',
            'isbn' => '1234567890124',
            'judul' => 'Kepada Kita Yang Bermimpi',
            'penulis' => 'Andy Saragih',
            'penerbit' => 'Rhae Group',
            'deskripsi' => 'Nisi quis cillum tempor sit qui Lorem. Ad dolore enim do amet cillum ipsum excepteur mollit. Minim tempor tempor in officia reprehenderit ea aliquip quis excepteur.',
            'tahun_terbit' => '2021',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'bermimpi.jpg',
            'kategori' => 'Motivasi',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '8'
        ]);

        Buku::create([
            'no_seri' => '123.65/ANH/L',
            'isbn' => '9793062797',
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'Nisi quis cillum tempor sit qui Lorem. Ad dolore enim do amet cillum ipsum excepteur mollit. Minim tempor tempor in officia reprehenderit ea aliquip quis excepteur.',
            'tahun_terbit' => '2005',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'novel.jpg',
            'kategori' => 'Novel',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '5'
        ]);
    }
}
