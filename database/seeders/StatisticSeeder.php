<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statistics = [
            [
                'label' => 'SISWA AKTIF',
                'value' => '1.520',
                'description' => 'Siswa aktif dari berbagai jurusan yang sedang menempuh pendidikan di SMK Negeri 5 Samarinda.',
                'icon' => 'fa-solid fa-users',
                'is_big' => true,
                'order' => 1,
            ],
            [
                'label' => 'KOMPETENSI KEAHLIAN',
                'value' => '6',
                'description' => 'Jurusan unggulan dengan standar industri',
                'icon' => 'fa-solid fa-layer-group',
                'is_big' => false,
                'order' => 2,
            ],
            [
                'label' => 'GURU & STAFF',
                'value' => '120',
                'description' => 'Tenaga pendidik dan kependidikan profesional',
                'icon' => 'fa-solid fa-chalkboard-user',
                'is_big' => false,
                'order' => 3,
            ],
            [
                'label' => 'ALUMNI TERSERAP',
                'value' => '98%',
                'description' => 'Lulusan bekerja atau melanjutkan kuliah',
                'icon' => 'fa-solid fa-graduation-cap',
                'is_big' => false,
                'order' => 4,
            ],
        ];

        foreach ($statistics as $statistic) {
            Statistic::create($statistic);
        }
    }
}
