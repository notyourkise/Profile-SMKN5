<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beritas = [
            [
                'judul' => 'Siswa SMKN 5 Samarinda Raih Juara 1 Lomba Kompetensi Siswa Tingkat Provinsi',
                'slug' => 'siswa-smkn-5-samarinda-raih-juara-1-lks-provinsi',
                'konten' => '<p>Tim siswa SMKN 5 Samarinda berhasil meraih juara 1 pada Lomba Kompetensi Siswa (LKS) tingkat Provinsi Kalimantan Timur bidang Web Technologies. Kompetisi yang berlangsung selama 3 hari ini diikuti oleh 45 sekolah dari seluruh Kaltim.</p><p>Prestasi gemilang ini diraih oleh Muhammad Rizki Pratama dari jurusan Rekayasa Perangkat Lunak yang berhasil mengalahkan pesaing-pesaingnya dengan project web aplikasi e-commerce yang inovatif dan mobile-friendly.</p><p>"Saya sangat bangga dengan pencapaian ini. Dukungan dari guru pembimbing dan fasilitas lab komputer yang memadai sangat membantu persiapan saya," ujar Rizki usai menerima trophy.</p><p>Kepala SMKN 5 Samarinda, Hariyadi, S.Pd., M.Pd. menyampaikan apresiasi tinggi atas prestasi tersebut dan berharap dapat mempertahankan gelar juara di tingkat nasional yang akan diselenggarakan bulan depan.</p>',
                'user_id' => 2,
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(1),
                'is_featured' => true,
            ],
            [
                'judul' => 'Kunjungan Industri ke PT Pupuk Kalimantan Timur (PKT)',
                'slug' => 'kunjungan-industri-ke-pt-pupuk-kalimantan-timur',
                'konten' => '<p>Sebanyak 120 siswa jurusan Teknik Kimia Industri SMKN 5 Samarinda mengadakan kunjungan industri ke PT Pupuk Kalimantan Timur (PKT) pada hari Rabu, 3 Januari 2026.</p><p>Kunjungan ini bertujuan untuk memberikan gambaran nyata tentang dunia industri petrokimia kepada para siswa. Mereka berkesempatan melihat langsung proses produksi pupuk urea dan ammonia di pabrik yang berstandar internasional ini.</p><p>Manager HRD PT PKT, Bapak Suryanto, menyampaikan bahwa perusahaan sangat terbuka untuk menerima siswa-siswi SMKN 5 melakukan Praktek Kerja Lapangan (PKL) bahkan rekrutmen lulusan terbaik.</p><p>"Kami melihat kualitas lulusan SMKN 5 sangat mumpuni dan siap kerja. Beberapa alumni kalian sudah menjadi operator dan teknisi di perusahaan kami," ujar Suryanto.</p>',
                'user_id' => 2,
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(3),
                'is_featured' => false,
            ],
            [
                'judul' => 'SMKN 5 Launching Lab Komputer Baru Berstandar Internasional',
                'slug' => 'smkn-5-launching-lab-komputer-baru-berstandar-internasional',
                'konten' => '<p>SMKN 5 Samarinda resmi melaunching laboratorium komputer terbaru dengan spesifikasi hardware gaming-grade dan software development tools profesional pada Senin, 30 Desember 2025.</p><p>Lab komputer seluas 200 m2 ini dilengkapi dengan 50 unit PC dengan processor Intel Core i7 gen-13, RAM 32GB, dan GPU Nvidia RTX 3060. Fasilitas ini diperuntukkan bagi siswa jurusan Rekayasa Perangkat Lunak dan Teknik Komputer Jaringan.</p><p>Kepala Sekolah, Hariyadi, S.Pd., M.Pd. mengatakan bahwa investasi ini merupakan komitmen sekolah untuk menyediakan fasilitas setara dengan universitas dan bootcamp IT ternama.</p><p>"Dengan lab ini, siswa kami bisa belajar programming, 3D modeling, video editing, bahkan game development dengan performa maksimal. Target kami adalah mencetak lulusan yang siap bersaing di industri digital," jelasnya.</p>',
                'user_id' => 2,
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(5),
                'is_featured' => false,
            ],
            [
                'judul' => '15 Siswa Lolos Seleksi Beasiswa Kuliah di Universitas Ternama',
                'slug' => '15-siswa-lolos-seleksi-beasiswa-kuliah-universitas-ternama',
                'konten' => '<p>Kabar membanggakan datang dari SMKN 5 Samarinda. Sebanyak 15 siswa kelas XII berhasil lolos seleksi beasiswa kuliah penuh di berbagai universitas ternama seperti ITB, ITS, Universitas Gadjah Mada, dan Politeknik Elektronika Negeri Surabaya.</p><p>Beasiswa ini diperoleh melalui jalur prestasi akademik dan non-akademik, termasuk kompetisi robotika, olimpiade sains, dan portofolio project programming.</p><p>Salah satu penerima beasiswa, Siti Nurhaliza dari jurusan Teknik Elektronika Industri, akan melanjutkan studi S1 Teknik Elektro di ITS Surabaya dengan beasiswa penuh dari Djarum Foundation.</p><p>"Saya sangat bersyukur. Selain bebas biaya kuliah, saya juga dapat uang saku bulanan. Semua ini berkat bimbingan guru-guru SMKN 5 yang luar biasa," ungkap Siti dengan mata berkaca-kaca.</p>',
                'user_id' => 2,
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(7),
                'is_featured' => false,
            ],
            [
                'judul' => 'Workshop Internet of Things (IoT) bersama Praktisi dari Silicon Valley',
                'slug' => 'workshop-iot-bersama-praktisi-silicon-valley',
                'konten' => '<p>SMKN 5 Samarinda mengadakan workshop Internet of Things (IoT) dengan mendatangkan pembicara spesial, Bapak Dimas Wicaksono, seorang Software Engineer di Google Silicon Valley yang juga alumni SMKN 5 angkatan 2010.</p><p>Workshop 2 hari ini menghadirkan 80 siswa jurusan Teknik Komputer Jaringan dan Rekayasa Perangkat Lunak untuk belajar membangun smart home system menggunakan Arduino, Raspberry Pi, dan cloud platform Firebase.</p><p>Dimas membagikan pengalamannya bekerja di salah satu perusahaan teknologi terbesar dunia dan memberikan tips bagaimana mempersiapkan diri untuk karir di industri tech global.</p><p>"Jangan takut bermimpi besar. Saya dulu juga siswa biasa di sekolah ini. Yang penting terus belajar, ikuti perkembangan teknologi, dan jangan berhenti coding," motivasi Dimas kepada para siswa.</p>',
                'user_id' => 2,
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(10),
                'is_featured' => false,
            ],
            [
                'judul' => 'Kerja Sama dengan Industri Jepang untuk Program Magang Siswa',
                'slug' => 'kerja-sama-industri-jepang-program-magang-siswa',
                'konten' => '<p>SMKN 5 Samarinda menandatangani Memorandum of Understanding (MoU) dengan Asosiasi Industri Otomotif Jepang untuk program magang siswa jurusan Teknik Kendaraan Ringan ke Jepang.</p><p>Program ini akan mengirimkan 10 siswa terpilih untuk magang selama 6 bulan di berbagai perusahaan otomotif di Tokyo dan Osaka dengan fasilitas akomodasi, transportasi, dan gaji bulanan 150.000 Yen (sekitar Rp 15 juta).</p><p>Direktur Asosiasi, Mr. Tanaka Hiroshi, menyatakan bahwa siswa Indonesia khususnya dari SMKN 5 memiliki etos kerja yang tinggi dan skill teknis yang mumpuni.</p><p>"Kami berharap program ini dapat menjadi jembatan transfer teknologi dan knowledge dari Jepang ke Indonesia. Siswa-siswa terbaik bahkan berkesempatan mendapat job offer permanent," kata Mr. Tanaka melalui penerjemah.</p>',
                'user_id' => 2,
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(12),
                'is_featured' => false,
            ],
            [
                'judul' => 'Juara Umum Olimpiade Sains Teknologi SMK Se-Kalimantan',
                'slug' => 'juara-umum-olimpiade-sains-teknologi-smk-se-kalimantan',
                'konten' => '<p>Prestasi gemilang kembali ditorehkan SMKN 5 Samarinda dengan meraih gelar Juara Umum pada Olimpiade Sains dan Teknologi (OST) tingkat SMK se-Kalimantan yang diselenggarakan di Balikpapan.</p><p>Tim SMKN 5 berhasil mengumpulkan 8 medali emas, 12 medali perak, dan 15 medali perunggu dari berbagai cabang lomba seperti matematika, fisika, kimia, programming, robotika, dan desain grafis.</p><p>Pencapaian luar biasa ini mengalahkan 120 SMK dari 5 provinsi di Pulau Kalimantan. Sekretaris Dinas Pendidikan Kaltim, Ibu Dr. Sri Wahyuni, memberikan apresiasi setinggi-tingginya.</p><p>"SMKN 5 Samarinda telah membuktikan bahwa SMK tidak kalah dengan SMA dalam bidang sains dan teknologi. Bahkan dalam aspek aplikasi teknologi, siswa SMK justru lebih unggul," puji Bu Sri dalam sambutannya saat penyerahan piala bergilir.</p>',
                'user_id' => 2,
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(15),
                'is_featured' => false,
            ],
            [
                'judul' => 'Renovasi Gedung Workshop dan Penambahan Mesin CNC Terbaru',
                'slug' => 'renovasi-gedung-workshop-penambahan-mesin-cnc',
                'konten' => '<p>SMKN 5 Samarinda tengah melakukan renovasi besar-besaran pada gedung workshop Teknik Pemesinan dengan anggaran 5 Miliar rupiah dari dana APBD Provinsi Kalimantan Timur.</p><p>Renovasi ini meliputi pengecatan ulang, perbaikan atap, instalasi AC industrial, dan yang paling ditunggu adalah penambahan 5 unit mesin CNC (Computer Numerical Control) berteknologi Jerman senilai total 2 Miliar rupiah.</p><p>Ketua Komite Sekolah, Bapak Ir. Budiman, mengatakan bahwa mesin CNC ini setara dengan yang digunakan di industri manufaktur kelas dunia seperti Toyota dan Astra.</p><p>"Dengan mesin ini, siswa kami bisa belajar membuat komponen presisi tinggi seperti gear, piston, dan mold injection. Lulusan kami akan sangat dicari industri karena sudah terbiasa mengoperasikan mesin canggih," jelas Pak Budiman.</p><p>Renovasi diperkirakan selesai pada bulan Februari 2026 dan akan diresmikan oleh Gubernur Kalimantan Timur.</p>',
                'user_id' => 2,
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(18),
                'is_featured' => false,
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}
