<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('jurusan')->group(function () {
    Route::get('/', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/{slug}', [JurusanController::class, 'show'])->name('jurusan.show');
});

Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('berita.show');
});

// Profile Routes
Route::prefix('profil')->group(function () {
    Route::get('/tentang', [ProfileController::class, 'tentang'])->name('profil.tentang');
    Route::get('/unit', [ProfileController::class, 'unit'])->name('profil.unit');
    Route::get('/struktur', [ProfileController::class, 'struktur'])->name('profil.struktur');
});

// --- ROUTE EKSTRAKURIKULER (UPDATED) ---
// --- ROUTE EKSTRAKURIKULER (UPDATED WITH PEMBINA) ---
Route::get('/kesiswaan/ekskul', function () {
    // Data Statis 9 Ekskul SMKN 5 Samarinda + Data Pembina
    $allEkskul = collect([
        (object)[
            'id' => 1,
            'kode' => 'FUTSAL',
            'nama' => 'Futsal',
            'deskripsi' => 'Olahraga tim yang mengutamakan kerjasama, kecepatan, dan strategi. Ekstrakurikuler Futsal SMKN 5 Samarinda aktif mengikuti berbagai turnamen antar sekolah dan melatih fisik serta sportivitas siswa.',
            // Placeholder Foto Pembina (Ganti nanti dengan foto asli)
            'pembina_nama' => 'Bapak Fulan S.Pd.',
            'pembina_foto' => 'pembina-futsal.jpg' 
        ],
        (object)[
            'id' => 2,
            'kode' => 'BASKET',
            'nama' => 'Basket',
            'deskripsi' => 'Wadah bagi siswa yang memiliki minat pada bola basket. Melatih ketangkasan, kerjasama tim (teamwork), dan disiplin tinggi melalui latihan rutin dan sparing partner.',
             'pembina_nama' => 'Ibu Fulani S.Or.',
             'pembina_foto' => 'pembina-basket.jpg'
        ],
        (object)[
            'id' => 3,
            'kode' => 'TARI',
            'nama' => 'Seni Tari',
            'deskripsi' => 'Mengembangkan bakat seni tari tradisional maupun modern (Dance). Sanggar tari SMKN 5 sering tampil dalam acara-acara sekolah maupun undangan eksternal untuk melestarikan budaya.',
            'pembina_nama' => 'Ibu Siti Aminah S.Sn.',
            'pembina_foto' => 'pembina-tari.jpg'
        ],
        (object)[
            'id' => 4,
            'kode' => 'PRAMUKA',
            'nama' => 'Pramuka',
            'deskripsi' => 'Ekstrakurikuler wajib yang membentuk karakter disiplin, mandiri, cinta alam, dan kepemimpinan. Kegiatan meliputi kemah, baris-berbaris, dan keterampilan bertahan hidup (survival).',
            'pembina_nama' => 'Kakak Pembina Senior',
            'pembina_foto' => 'pembina-pramuka.jpg'
        ],
        (object)[
            'id' => 5,
            'kode' => 'BAND',
            'nama' => 'Band Musik',
            'deskripsi' => 'Ajang kreativitas bermusik bagi siswa. Mempelajari instrumen musik, vokal, dan kekompakan dalam membawakan lagu. Sering mengisi hiburan pada event-event sekolah.',
            'pembina_nama' => 'Bapak Ahmad Dhani KW',
            'pembina_foto' => 'pembina-band.jpg'
        ],
        (object)[
            'id' => 6,
            'kode' => 'THEATER',
            'nama' => 'Teater',
            'deskripsi' => 'Mengasah kemampuan seni peran, olah vokal, dan kepercayaan diri di depan umum. Melalui teater, siswa belajar berekspresi dan menyampaikan pesan moral melalui cerita.',
            'pembina_nama' => 'Ibu Ratna Sarumpaet KW',
            'pembina_foto' => 'pembina-theater.jpg'
        ],
        (object)[
            'id' => 7,
            'kode' => 'ALAM',
            'nama' => 'Sahabat Alam',
            'deskripsi' => 'Komunitas pecinta alam yang peduli terhadap lingkungan hidup. Kegiatan meliputi penanaman pohon, pendakian gunung, daur ulang sampah, dan kampanye kebersihan lingkungan.',
            'pembina_nama' => 'Bapak Pecinta Alam',
            'pembina_foto' => 'pembina-alam.jpg'
        ],
        (object)[
            'id' => 8,
            'kode' => 'OSIS',
            'nama' => 'OSIS',
            'deskripsi' => 'Organisasi Siswa Intra Sekolah sebagai induk organisasi siswa. Tempat belajar kepemimpinan (leadership), manajemen organisasi, dan penyelenggara berbagai event besar sekolah.',
            'pembina_nama' => 'Waka Kesiswaan',
            'pembina_foto' => 'pembina-osis.jpg'
        ],
        (object)[
            'id' => 9,
            'kode' => 'PMR',
            'nama' => 'PMR',
            'deskripsi' => 'Palang Merah Remaja yang melatih siswa dalam pertolongan pertama, kepedulian sosial, dan kemanusiaan. Selalu siap siaga menjadi tim medis dalam setiap kegiatan sekolah.',
            'pembina_nama' => 'Ibu Dokter Sekolah',
            'pembina_foto' => 'pembina-pmr.jpg'
        ],
    ]);

    // Set default item pertama (Futsal) agar langsung muncul saat dibuka
    $activeEkskul = $allEkskul->first();

    return view('kesiswaan.ekskul', [
        'allEkskul' => $allEkskul,
        'activeEkskul' => $activeEkskul
    ]);
})->name('kesiswaan.ekskul');

// Facilities Page
Route::get('/fasilitas', function () {
    return view('fasilitas');
})->name('facilities.index');

// Temporary Agenda Route (Placeholder)
Route::get('/agenda', function () {
    return redirect()->route('home');
})->name('agenda.index');

Route::get('/mikrotik-academy', function () {
    return view('mikrotik.index');
})->name('mikrotik.index');