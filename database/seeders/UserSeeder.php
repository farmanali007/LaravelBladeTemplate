<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create specific admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'profile_picture' => 'https://i.pravatar.cc/300?u=admin',
            'bio' => 'System administrator with full access to all features.',
            'status' => 'active',
            'role' => 'admin',
        ]);

        // Create specific moderator
        User::create([
            'name' => 'Jane Moderator',
            'email' => 'moderator@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'profile_picture' => 'https://i.pravatar.cc/300?u=moderator',
            'bio' => 'Content moderator helping maintain quality discussions.',
            'status' => 'active',
            'role' => 'moderator',
        ]);

        // Create specific regular user for testing
        User::create([
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'profile_picture' => 'https://i.pravatar.cc/300?u=user',
            'bio' => 'Regular user exploring the platform and sharing thoughts.',
            'status' => 'active',
            'role' => 'user',
        ]);

        // Create random users
        User::factory(47)->create(); // Total 50 users
    }
}
