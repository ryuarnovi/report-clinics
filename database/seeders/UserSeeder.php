<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.test',
            'password' => Hash::make('admin123'), // password: admin123
            'role' => 'admin',
        ]);

        // Dokter user
        User::create([
            'name' => 'Dokter Klinik',
            'email' => 'dokter@klinik.test',
            'password' => Hash::make('dokter123'), // password: dokter123
            'role' => 'dokter',
        ]);
    }
}