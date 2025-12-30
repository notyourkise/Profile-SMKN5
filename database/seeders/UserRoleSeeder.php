<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Seed test users with different roles
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@smkn5.com'],
            [
                'name' => 'Admin SMKN 5',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // Redaktur User
        User::updateOrCreate(
            ['email' => 'redaktur@smkn5.com'],
            [
                'name' => 'Redaktur',
                'password' => bcrypt('password'),
                'role' => 'redaktur',
            ]
        );

        // Jurnalis Users
        User::updateOrCreate(
            ['email' => 'jurnalis1@smkn5.com'],
            [
                'name' => 'Jurnalis Satu',
                'password' => bcrypt('password'),
                'role' => 'jurnalis',
            ]
        );

        User::updateOrCreate(
            ['email' => 'jurnalis2@smkn5.com'],
            [
                'name' => 'Jurnalis Dua',
                'password' => bcrypt('password'),
                'role' => 'jurnalis',
            ]
        );
    }
}
