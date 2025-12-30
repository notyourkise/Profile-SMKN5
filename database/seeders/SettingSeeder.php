<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->updateOrInsert(
            ['id' => 1],
            [
                'school_name' => 'SMK Negeri 5 Samarinda',
                'slogan' => 'SMKN 5 We Care',
                'address' => 'Jl. Pendidikan No. 1, Samarinda, Kalimantan Timur',
                'phone' => '(0541) 123456',
                'email' => 'info@smkn5samarinda.sch.id',
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
