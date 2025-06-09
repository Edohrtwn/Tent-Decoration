<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '123456', // ganti dengan password aman
            'role' => 'admin',
        ]);

        // User
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => '123456', // ganti dengan password aman
            'role' => 'user',
        ]);
    }
}
