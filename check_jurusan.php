<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== CEK DATA JURUSAN LOKAL ===\n\n";

$jurusanCount = \App\Models\Jurusan::count();
echo "Total Jurusan: $jurusanCount\n";

$jurusanAktif = \App\Models\Jurusan::where('is_active', 1)->count();
echo "Jurusan Aktif: $jurusanAktif\n\n";

if ($jurusanCount > 0) {
    echo "=== DAFTAR JURUSAN ===\n";
    foreach (\App\Models\Jurusan::all() as $j) {
        $status = $j->is_active ? 'AKTIF' : 'NONAKTIF';
        echo "ID: {$j->id} | Kode: {$j->kode} | Nama: {$j->nama} | Status: {$status}\n";
    }
} else {
    echo "⚠ Database KOSONG! Perlu run seeder.\n";
}
