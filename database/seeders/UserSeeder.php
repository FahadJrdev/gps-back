<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create known admin user
        User::create([
            'subscription_id' => 'SUB-ADM001',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'registration_date' => now()->subYear(),
            'role' => 'admin',
            'status' => 'active',
            'password' => Hash::make('12345678'),
        ]);

        // Create additional random users
        User::factory()
            ->count(20) // Create 20 random users
            ->create();
    }
}