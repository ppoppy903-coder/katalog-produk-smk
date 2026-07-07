<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kemendikdasmen',
            'email' => 'admin@kemendikdasmen.id',
            'password' => Hash::make('password123'), // Ganti password sesuai keinginan
            'role' => 'admin',
        ]);
    }
}
