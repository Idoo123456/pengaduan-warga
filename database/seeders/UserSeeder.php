<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Desa',
            'email' => 'admin@desa.test',
            'nik' => '1234567890123456',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Warga',
            'email' => 'user@desa.test',
            'nik' => '6543210987654321',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
