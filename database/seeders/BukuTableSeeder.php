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
            'no_seri' => '004.65/RHA/L',
            'isbn' => '1234567890123',
            'judul' => '100 Dongeng Anak Lengkap',
            'penulis' => 'Raihan Abdillah',
            'penerbit' => 'Folklore Inc',
            'deskripsi' => 'Kumpulan dongeng dongeng anak indonesia dengan gambar yang menarik.',
            'tahun_terbit' => '2020',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'assets/img/100dongeng.png',
            'kategori' => 'Bebas',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '5'
        ]);

        Buku::create([
            'no_seri' => '123.65/KTS/L',
            'isbn' => '1234567890124',
            'judul' => 'Biologi Kelas XI MA',
            'penulis' => 'Ketutu Susilo',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'Buku pembelajaran biologi untuk kelas XI tingkat Madrasah Aliyah.',
            'tahun_terbit' => '2021',
            'kelas' => 'MA',
            'sampul_buku' => 'assets/img/biologi-ketut.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Biologi',
            'jumlah_tersedia' => '15'
        ]);

        Buku::create([
            'no_seri' => '123.65/ANH/L',
            'isbn' => '9793062797',
            'judul' => 'Cara Membangun UMKM',
            'penulis' => 'Alfredo Torres',
            'penerbit' => 'Alfredo Inc',
            'deskripsi' => 'Buku pembelajaran ekonomi untuk Usaha UMKM di indonesia, ditulis oleh pengusaha top dari indonesia .',
            'tahun_terbit' => '2019',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'assets/img/cara_membangu_umkm.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Ekonomi',
            'jumlah_tersedia' => '3'
        ]);

        Buku::create([
            'no_seri' => '324.79/AMF/L',
            'isbn' => '97930312568',
            'judul' => 'Fisika Kelas IX MTs',
            'penulis' => 'Aiman Fathur',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'Buku pembelajaran biologi untuk kelas XI tingkat Madrasah Tsanawiyah.',
            'tahun_terbit' => '2021',
            'kelas' => 'MTs',
            'sampul_buku' => 'assets/img/fisika.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Fisika',
            'jumlah_tersedia' => '15'
        ]);

        Buku::create([
            'no_seri' => '624.79/TKK/L',
            'isbn' => '6327632538',
            'judul' => 'Funiculi Funicula',
            'penulis' => 'Toshikazu Kawaguchi',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'Funiculi Funicula adalah sebuah novel karangan Toshikazu Kawaguchi yang terbit pada tahun 2015. Novel ini menceritakan sebuah kafe di Tokyo yang memungkinkan pelanggannya melakukan perjalanan kembali ke masa lalu, selama mereka kembali sebelum kopi mereka menjadi dingin.',
            'tahun_terbit' => '2015',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'assets/img/funicula.png',
            'kategori' => 'Novel',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '1'
        ]);

        Buku::create([
            'no_seri' => '582.42/RTK/P',
            'isbn' => '793256238',
            'judul' => 'Gadis Kretek',
            'penulis' => 'Ratih Kumala',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'Gadis Kretek adalah sebuah novel karangan Ratih Kumala yang diterbitkan pada tahun 2012 oleh Gramedia Pustaka Utama. Novel ini masuk dalam sepuluh besar penerima penghargaan Kusala Sastra Khatulistiwa tahun 2012.',
            'tahun_terbit' => '2012',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'assets/img/gadis_kretek.png',
            'kategori' => 'Novel',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '3'
        ]);

        Buku::create([
            'no_seri' => '432.42/TRL/L',
            'isbn' => '924617123',
            'judul' => 'Hello',
            'penulis' => 'Tere Liye',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'Hello.Apakah kamu di sana?Aku tahu kamu di sana.Aku tahu kamu mendengarkan suaraku.Hello.Aku tahu kita belum bisa bicara. Tapi aku tidak bisa menahan diriku untuk meneleponmu. Aku hanya hendak bilang, aku tidak akan menyerah. Aku akan selalu menyayangimu.',
            'tahun_terbit' => '2023',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'assets/img/hello.png',
            'kategori' => 'Novel',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '2'
        ]);

        Buku::create([
            'no_seri' => '432.42/ANH/L',
            'isbn' => '5412148124',
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'penerbit' => 'Bentang Pustaka',
            'deskripsi' => 'Laskar Pelangi adalah novel pertama karya Andrea Hirata yang diterbitkan oleh Bentang Pustaka pada tahun 2005. Novel ini bercerita tentang kehidupan 10 anak dari keluarga miskin yang bersekolah di sebuah sekolah Muhammadiyah di Pulau Belitung yang penuh dengan keterbatasan.',
            'tahun_terbit' => '2005',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'assets/img/laskar_pelangi.png',
            'kategori' => 'Novel',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '5'
        ]);

        Buku::create([
            'no_seri' => '761.53/LSC/L',
            'isbn' => '9786024246945',
            'judul' => 'Laut Bercerita',
            'penulis' => 'Leila Salikha Chudori',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'Laut Bercerita adalah novel karya Leila S. Chudori yang diterbitkan oleh Kepustakaan Populer Gramedia Jakarta pada tahun 2017. Novel ini berkisah tentang persahabatan, cinta, keluarga, dan kehilangan para tokoh-tokohnya.',
            'tahun_terbit' => '2017',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'assets/img/laut_bercerita.png',
            'kategori' => 'Novel',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '3'
        ]);

        Buku::create([
            'no_seri' => '369.33/CHD/P',
            'isbn' => '10002223456',
            'judul' => 'Matematika Kelas IX MA',
            'penulis' => 'Cahaya Dewi',
            'penerbit' => 'Rimbero',
            'deskripsi' => 'Modul pembelajaran matematika untuk kelas IX MA',
            'tahun_terbit' => '2020',
            'kelas' => 'MA',
            'sampul_buku' => 'assets/img/matematika-cahaya_dewi.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Matematika',
            'jumlah_tersedia' => '30'
        ]);

        Buku::create([
            'no_seri' => '343.32/CHD/P',
            'isbn' => '200000223456',
            'judul' => 'Matematika Kelas VII MTs',
            'penulis' => 'Cahaya Dewi',
            'penerbit' => 'Rimbero',
            'deskripsi' => 'Modul pembelajaran matematika untuk kelas VII MTs',
            'tahun_terbit' => '2020',
            'kelas' => 'MTs',
            'sampul_buku' => 'assets/img/matematika-dewi.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Matematika',
            'jumlah_tersedia' => '30'
        ]);

        Buku::create([
            'no_seri' => '312.34/CHD/P',
            'isbn' => '30002223456',
            'judul' => 'Matematika Kelas V SD',
            'penulis' => 'Cahaya Dewi',
            'penerbit' => 'Rimbero',
            'deskripsi' => 'Modul pembelajaran matematika untuk kelas V SD',
            'tahun_terbit' => '2020',
            'kelas' => 'SD',
            'sampul_buku' => 'assets/img/matematika-rimbero.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Matematika',
            'jumlah_tersedia' => '30'
        ]);
        
        Buku::create([
            'no_seri' => '642.17/TIM/P',
            'isbn' => '6121421812',
            'judul' => 'Menjadi Pengusaha Muda',
            'penulis' => 'Tim',
            'penerbit' => 'Timmerman Industries',
            'deskripsi' => 'Mengubah impian menjadi kenyataan panduan bagi para pengusaha muda untuk menjadi pengusaha sukses.',
            'tahun_terbit' => '2017',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'assets/img/menjadi_pengusaha_muda.png',
            'kategori' => 'Motivasi',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '5'
        ]);

        Buku::create([
            'no_seri' => '777.35/KKM/P',
            'isbn' => '78149122',
            'judul' => 'Pendidikan Pancasila',
            'penulis' => 'Kemendikbud',
            'penerbit' => 'Kurikulum merdeka',
            'deskripsi' => 'Modul ajar untuk kelas Pendidikan Pancasila.',
            'tahun_terbit' => '2022',
            'kelas' => 'SD',
            'sampul_buku' => 'assets/img/pancasila.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Kewarganegaraan',
            'jumlah_tersedia' => '10'
        ]);

        Buku::create([
            'no_seri' => '123.45/KTS/L',
            'isbn' => '781246912',
            'judul' => 'Pendidikan Jasmani Olahraga Kesehatan',
            'penulis' => 'Ketut Susilo',
            'penerbit' => 'Kurikulum merdeka',
            'deskripsi' => 'Modul ajar untuk kelas Pendidikan Jasmani Olahraga Kesehatan tingkat SD.',
            'tahun_terbit' => '2022',
            'kelas' => 'SD',
            'sampul_buku' => 'assets/img/pjok-ketut_susilo.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Olahraga',
            'jumlah_tersedia' => '10'
        ]);

        Buku::create([
            'no_seri' => '123.48/KTS/L',
            'isbn' => '781246917',
            'judul' => 'Pendidikan Jasmani Olahraga Kesehatan',
            'penulis' => 'Ketut Susilo',
            'penerbit' => 'Kurikulum merdeka',
            'deskripsi' => 'Modul ajar untuk kelas Pendidikan Jasmani Olahraga Kesehatan tingkat MTs.',
            'tahun_terbit' => '2022',
            'kelas' => 'MTs',
            'sampul_buku' => 'assets/img/pjok-ketut-mts.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Olahraga',
            'jumlah_tersedia' => '10'
        ]);

        Buku::create([
            'no_seri' => '641.13/TRL/L',
            'isbn' => '69143012',
            'judul' => 'Pulang Pergi',
            'penulis' => 'Tere Liye',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'Ada jodoh yang ditemukan lewat tatapan pertama. Ada persahabatan yang diawali lewat sapa hangat. Bagaimana jika takdir bersama ternyata, diawali dengan pertarungan mematikan? Lantas semua cerita berkelindan dengan, pengejaran demi pengejaran mencari jawaban? Pulang-Pergi.',
            'tahun_terbit' => '2024',
            'kelas' => 'Lainnya',
            'sampul_buku' => 'assets/img/pulang_pergi.png',
            'kategori' => 'Novel',
            'subjek' => 'Lainnya',
            'jumlah_tersedia' => '3'
        ]);

        Buku::create([
            'no_seri' => '543.23/SPT/L',
            'isbn' => '798134712',
            'judul' => 'Seni Budaya dan Keterampilan',
            'penulis' => 'Septiawan',
            'penerbit' => 'Fauget',
            'deskripsi' => 'Bahan ajar untuk kelas Seni Budaya dan Keterampilan kelas X MA.',
            'tahun_terbit' => '2021',
            'kelas' => 'MA',
            'sampul_buku' => 'assets/img/SBK-Fauget.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Seni',
            'jumlah_tersedia' => '15'
        ]);

        Buku::create([
            'no_seri' => '213.12/CHD/P',
            'isbn' => '68123322',
            'judul' => 'Pendidikan Seni Tari Tradisional',
            'penulis' => 'Cahaya Dewi',
            'penerbit' => 'Kurikulum merdeka',
            'deskripsi' => 'Bahan ajar untuk kelas Pendidikan Seni Tari Tradisional kelas XI MA.',
            'tahun_terbit' => '2021',
            'kelas' => 'MA',
            'sampul_buku' => 'assets/img/Seni_tari-cahaya_dewi.png',
            'kategori' => 'Buku Pelajaran',
            'subjek' => 'Seni',
            'jumlah_tersedia' => '13'
        ]);

        
    }
}
