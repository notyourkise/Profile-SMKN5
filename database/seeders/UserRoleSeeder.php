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
            ['email' => 'admin@smkn5balikpapan.sch.id'],
            [
                'name' => 'Administrator SMKN 5',
                'password' => bcrypt('Admin@2026'),
                'role' => 'admin',
            ]
        );

        // Redaktur User
        User::updateOrCreate(
            ['email' => 'redaktur@smkn5balikpapan.sch.id'],
            [
                'name' => 'Redaktur Berita',
                'password' => bcrypt('Redaktur@2026'),
                'role' => 'redaktur',
            ]
        );

        // Jurnalis Users
        User::updateOrCreate(
            ['email' => 'jurnalis1@smkn5balikpapan.sch.id'],
            [
                'name' => 'Jurnalis Satu',
                'password' => bcrypt('Jurnalis@2026'),
                'role' => 'jurnalis',
            ]
        );

        User::updateOrCreate(
            ['email' => 'jurnalis2@smkn5balikpapan.sch.id'],
            [
                'name' => 'Jurnalis Dua',
                'password' => bcrypt('Jurnalis@2026'),
                'role' => 'jurnalis',
            ]
        );
    }
}
