<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'first_name' => 'Admin',
            'last_name'  => '',
            'email'      => 'admin@gmail.com',
            'phone'      => '081234567890',
            'address'    => 'Alamat Admin',
            'password'   => Hash::make('123456'), // HARUS di-hash
            'role'       => 'admin',
        ]);

        // User Biasa
        User::create([
            'first_name' => 'User',
            'last_name'  => 'Biasa',
            'email'      => 'user@gmail.com',
            'phone'      => '081234567891',
            'address'    => 'Alamat User',
            'password'   => Hash::make('123456'), // HARUS di-hash
            'role'       => 'user',
        ]);

        Kontak::create([
            'alamat' => 'JL. Kasang Pudak RT.14 Lorong Pesantren Kec.Kumpeh Ulu',
            'instagram'  => 'https://www.instagram.com/tentdecoration.id?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            'tiktok'      => 'https://www.tiktok.com/',
            'whatsapp'      => 'https://web.whatsapp.com/',
        ]);
    }
}
