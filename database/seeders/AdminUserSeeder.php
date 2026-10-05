<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::where('email', 'admin@gildasrochinel.dev')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gildasrochinel.dev',
                'password' => Hash::make('Admin@123'),
                'role' => 'admin',
            ]);
        }
    }
}
