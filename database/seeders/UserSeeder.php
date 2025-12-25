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
            'nama' => 'Admin Desa',
            'email' => 'admin@desa.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'User Warga',
            'email' => 'user@desa.test',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
