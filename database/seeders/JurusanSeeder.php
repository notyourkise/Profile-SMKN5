<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusans = [
            [
                'kode' => 'TJKT',
                'nama' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'deskripsi' => 'Program keahlian yang mempelajari tentang jaringan komputer, telekomunikasi, dan infrastruktur IT.',
                'durasi_tahun' => 3,
                'is_active' => true,
            ],
            [
                'kode' => 'DKV',
                'nama' => 'Desain Komunikasi Visual',
                'deskripsi' => 'Program keahlian yang mempelajari desain grafis, multimedia, dan komunikasi visual.',
                'durasi_tahun' => 3,
                'is_active' => true,
            ],
            [
                'kode' => 'PM',
                'nama' => 'Pemasaran',
                'deskripsi' => 'Program keahlian yang mempelajari strategi pemasaran, penjualan, dan manajemen bisnis.',
                'durasi_tahun' => 3,
                'is_active' => true,
            ],
            [
                'kode' => 'PS',
                'nama' => 'Pekerjaan Sosial',
                'deskripsi' => 'Program keahlian yang mempelajari pelayanan masyarakat dan kesejahteraan sosial.',
                'durasi_tahun' => 3,
                'is_active' => true,
            ],
            [
                'kode' => 'MPLB',
                'nama' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'deskripsi' => 'Program keahlian yang mempelajari administrasi perkantoran dan manajemen layanan bisnis.',
                'durasi_tahun' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($jurusans as $jurusan) {
            Jurusan::updateOrCreate(
                ['kode' => $jurusan['kode']],
                $jurusan
            );
        }

        $this->command->info('✓ Seeded 5 jurusan successfully!');
    }
}
