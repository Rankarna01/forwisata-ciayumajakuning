<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun Admin Forwisata
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@forwisata.com',
            'password' => Hash::make('password123'), // Ganti dengan password yang lebih aman jika untuk production
        ]);
    }
}