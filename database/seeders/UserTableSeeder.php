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
    }
}
