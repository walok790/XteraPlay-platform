<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Demo User
        User::updateOrCreate(
            ['email' => 'demo@xteraplay.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('demo1234'),
                'email_verified_at' => now(),
            ]
        );

        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@xteraplay.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
            ]
        );
    }
}
