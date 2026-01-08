<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agendas = [
            [
                'title' => 'Upacara Bendera Hari Senin',
                'description' => 'Upacara bendera rutin setiap hari Senin',
                'date' => Carbon::now()->next('Monday'),
                'time' => '07:00 - 08:00 WIB',
                'location' => 'Lapangan Upacara SMKN 5',
                'is_active' => true,
            ],
            [
                'title' => 'Workshop Digital Marketing',
                'description' => 'Pelatihan digital marketing untuk siswa jurusan PM',
                'date' => Carbon::now()->addDays(3),
                'time' => '08:00 - 12:00 WIB',
                'location' => 'Laboratorium PM',
                'is_active' => true,
            ],
            [
                'title' => 'Lomba Kompetensi Siswa (LKS)',
                'description' => 'Kompetisi antar siswa tingkat sekolah',
                'date' => Carbon::now()->addDays(7),
                'time' => '08:00 - 16:00 WIB',
                'location' => 'Gedung Utama SMKN 5',
                'is_active' => true,
            ],
            [
                'title' => 'Rapat Koordinasi Guru',
                'description' => 'Rapat koordinasi bulanan guru dan staff',
                'date' => Carbon::now()->addDays(5),
                'time' => '13:00 - 15:00 WIB',
                'location' => 'Ruang Rapat',
                'is_active' => true,
            ],
            [
                'title' => 'Kunjungan Industri',
                'description' => 'Kunjungan siswa TJKT ke PT Telkom Indonesia',
                'date' => Carbon::now()->addDays(10),
                'time' => '08:00 - 16:00 WIB',
                'location' => 'PT Telkom Indonesia Samarinda',
                'is_active' => true,
            ],
            [
                'title' => 'Pelatihan MYOB Accounting',
                'description' => 'Pelatihan software akuntansi untuk jurusan AKL',
                'date' => Carbon::now()->addDays(12),
                'time' => '09:00 - 14:00 WIB',
                'location' => 'Laboratorium Komputer',
                'is_active' => true,
            ],
        ];

        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }
    }
}
