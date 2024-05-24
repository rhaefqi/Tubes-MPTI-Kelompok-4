<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([ // 1
            'username' => 'andysaragih',
            'status' => 'siswa',
            'email' => 'andysaragih@gmail.com',
            'no_hp' => '081234567890',
            'photo_profile' => 'andy.jpg',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password')
        ]);

        User::create([ // 2
            'username' => 'petugasperpus',
            'status' => 'pegawai',
            'email' => 'petugasperpus@gmail.com',
            'no_hp' => '081234567891',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('perpustakaan')
        ]);

        User::create([ // 3
            'username' => 'staffadmin',
            'status' => 'staff',
            'email' => 'staffadmin@gmail.com',
            'no_hp' => '081234567892',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('perpustakaan')
        ]);

        User::create([ // 4
            'username' => 'kepsek',
            'status' => 'kepala_sekolah',
            'email' => 'kepsek@gmail.com',
            'no_hp' => '081234567893',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('perpustakaan')
        ]);

        User::create([ // 5
            'username' => 'rifqijabrah',
            'status' => 'guru',
            'email' => 'rifqijabrah@gmail.com',
            'no_hp' => '081234567894',
            'photo_profile' => 'rifqi.jpg',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password')
        ]);
        
        User::create([ // 6
            'username' => 'yohanamarbun',
            'status' => 'siswa',
            'email' => 'yohanamarbun@gmail.com',
            'no_hp' => '081234567895',
            'photo_profile' => 'yohana.jpg',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password')
        ]);

        User::create([ // 7
            'username' => 'fadillahnst',
            'status' => 'guru',
            'email' => 'fadillahnst@gmail.com',
            'no_hp' => '081234567896',
            'photo_profile' => 'fadillah.jpg',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password')
        ]);
    }
}
