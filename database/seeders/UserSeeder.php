<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        // Create User
        User::create([
            'name' => 'Muhammad Naufal Firdana Trisya',
            'username' => 'firdana',
            'email' => 'fridana@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('coba'),
            'remember_token' => Str::random(10),
        ]);

        // Create 10 Fake Users
        User::factory()->count(10)->create();
    }
}