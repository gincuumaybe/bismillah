<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kost',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // ganti sesuai kebutuhan
            'role' => 'admin', 
        ]);
    }
}
