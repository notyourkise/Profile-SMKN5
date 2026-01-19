<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed production data
        $this->call([
            RolePermissionSeeder::class,
            JurusanSeeder::class,
            StatisticSeeder::class,
            BeritaSeeder::class,
            MenuSeeder::class,
            SettingSeeder::class,
            AgendaSeeder::class,
        ]);

        $this->command->info('✅ All seeders completed successfully!');
    }
}
