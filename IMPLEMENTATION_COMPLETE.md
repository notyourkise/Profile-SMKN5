# Implementasi Lengkap - Update SMKN 5 Samarinda
**Laravel 12 + Tailwind CSS**  
Tanggal: 6 Januari 2026

---

## 📋 Ringkasan Perubahan

### ✅ Yang Sudah Diimplementasikan:

1. **Navbar Update** - Dropdown Kesiswaan disederhanakan (hanya Ekstrakurikuler)
2. **Hero Section** - Button diupdate:
   - Primary: "Portal SMKN 5" → https://smkn5samarinda.sch.id/portal
   - Secondary: "Kompetensi Keahlian" → #jurusan (anchor link)
3. **Database Statistics** - Migration, Model, Seeder untuk tabel `statistics`
4. **Dynamic Statistics Section** - Section statistik menggunakan data dari database
5. **Headmaster Welcome Section** - Section sambutan kepala sekolah (2 kolom grid)

---

## 🗄️ 1. MIGRATION - Statistics Table

**File:** `database/migrations/2026_01_06_000001_create_statistics_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('value');
            $table->string('icon');
            $table->boolean('is_big')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
```

---

## 📦 2. MODEL - Statistic

**File:** `app/Models/Statistic.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'value',
        'icon',
        'is_big',
        'order',
    ];

    protected $casts = [
        'is_big' => 'boolean',
    ];
}
```

---

## 🌱 3. SEEDER - StatisticSeeder

**File:** `database/seeders/StatisticSeeder.php`

```php
<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        $statistics = [
            [
                'label' => 'SISWA AKTIF',
                'value' => '1.520',
                'icon' => 'fa-solid fa-users',
                'is_big' => true,
                'order' => 1,
            ],
            [
                'label' => 'KOMPETENSI KEAHLIAN',
                'value' => '6',
                'icon' => 'fa-solid fa-layer-group',
                'is_big' => false,
                'order' => 2,
            ],
            [
                'label' => 'GURU & STAFF',
                'value' => '120',
                'icon' => 'fa-solid fa-chalkboard-user',
                'is_big' => false,
                'order' => 3,
            ],
            [
                'label' => 'ALUMNI TERSERAP',
                'value' => '98%',
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
```

---

## 🎮 4. CONTROLLER - HomeController (Updated)

**File:** `app/Http/Controllers/HomeController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Jurusan;
use App\Models\Statistic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();

        $jurusan = Jurusan::where('is_active', true)->get();

        // Get statistics from database ordered by order column
        $statistics = Statistic::orderBy('order')->get();

        return view('home', compact('beritaTerbaru', 'jurusan', 'statistics'));
    }
}
```

---

## 🧭 5. NAVBAR UPDATE - Simplified Kesiswaan Menu

**File:** `resources/views/components/navbar.blade.php`

**Perubahan di bagian Kesiswaan Items (line ~25):**

```php
// Kesiswaan Dropdown Items - Simplified: Only Ekstrakurikuler
$kesiswaanItems = [
    ['label' => 'Ekstrakurikuler', 'url' => '/kesiswaan/ekskul', 'icon' => 'fa-solid fa-futbol', 'desc' => 'Kegiatan di luar jam pelajaran'],
];
```

**Catatan:** Hapus item `Prestasi Siswa` dan `OSIS` dari array.

---

## 🎯 6. HOME VIEW - Updated Hero & Added Sections

**File:** `resources/views/home.blade.php`

### A. Hero Section - Updated Buttons

```php
<!-- CTA Buttons -->
<div class="mt-8 flex flex-col sm:flex-row gap-4">
    <!-- Primary Button (Green) -->
    <a href="https://smkn5samarinda.sch.id/portal" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-full font-bold transition shadow-lg flex items-center justify-center gap-2">
        <span>Portal SMKN 5</span>
        <i class="fa-solid fa-arrow-right"></i>
    </a>
    
    <!-- Secondary Button (Outline White) -->
    <a href="#jurusan" class="backdrop-blur-md bg-white/10 border-2 border-white/70 text-white hover:bg-white/20 px-8 py-3 rounded-full font-bold transition flex items-center justify-center gap-2">
        <span>Kompetensi Keahlian</span>
    </a>
</div>
```

### B. Jurusan Section - Added ID for Anchor

```php
<!-- Jurusan Section -->
<section id="jurusan" class="py-16">
    <div class="container mx-auto px-4">
        <!-- ... existing content ... -->
    </div>
</section>
```

### C. Headmaster Welcome Section (NEW)

**Tambahkan setelah `@include('components.statistics-section')` dan sebelum Jurusan Section:**

```php
<!-- Headmaster Welcome Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Column: Headmaster Photo -->
                <div class="order-2 lg:order-1">
                    <div class="relative">
                        <!-- Main Image -->
                        <div class="rounded-2xl overflow-hidden shadow-2xl">
                            <img 
                                src="{{ asset('images/kepala-sekolah.webp') }}" 
                                alt="Kepala Sekolah SMKN 5 Samarinda" 
                                class="w-full h-auto object-cover"
                                onerror="this.src='https://via.placeholder.com/600x700/10b981/ffffff?text=Kepala+Sekolah'"
                            >
                        </div>
                        
                        <!-- Decorative Element -->
                        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gradient-to-br from-green-400 to-teal-500 rounded-2xl -z-10"></div>
                        <div class="absolute -top-6 -left-6 w-32 h-32 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl -z-10"></div>
                    </div>
                </div>
                
                <!-- Right Column: Welcome Message -->
                <div class="order-1 lg:order-2">
                    <!-- Section Title -->
                    <div class="mb-6">
                        <span class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-4">
                            <i class="fa-solid fa-user-tie mr-2"></i>Sambutan
                        </span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">
                            Sambutan Kepala Sekolah
                        </h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-green-600 to-teal-600"></div>
                    </div>
                    
                    <!-- Headmaster Info -->
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Hariyadi, S.Pd., M.Pd.</h3>
                        <p class="text-gray-600">Kepala SMK Negeri 5 Samarinda</p>
                    </div>
                    
                    <!-- Quote -->
                    <div class="mb-6 pl-4 border-l-4 border-green-600">
                        <p class="text-lg italic text-gray-700 leading-relaxed">
                            "Pendidikan bukan sekadar mengisi wadah, tetapi menyalakan api semangat untuk masa depan yang gemilang."
                        </p>
                    </div>
                    
                    <!-- Welcome Text -->
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <p>
                            Selamat datang di website resmi <strong>SMK Negeri 5 Samarinda</strong>. 
                            Kami berkomitmen mencetak lulusan yang kompeten, berkarakter, dan siap bersaing di dunia industri global.
                        </p>
                        <p>
                            Dengan didukung oleh tenaga pendidik profesional, fasilitas modern, dan kemitraan dengan berbagai industri terkemuka, 
                            kami terus berinovasi dalam memberikan pendidikan kejuruan yang berkualitas dan relevan dengan kebutuhan dunia kerja.
                        </p>
                        <p>
                            Mari bersama-sama kita wujudkan generasi muda yang unggul, berakhlak mulia, dan siap berkontribusi bagi kemajuan bangsa.
                        </p>
                    </div>
                    
                    <!-- Signature -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="font-semibold text-gray-800">Hariyadi, S.Pd., M.Pd.</p>
                        <p class="text-sm text-gray-600">Kepala Sekolah</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
```

---

## 📊 7. STATISTICS SECTION COMPONENT (Dynamic)

**File:** `resources/views/components/statistics-section.blade.php`

**REPLACE entire file dengan:**

```php
{{-- Statistics & Facts Section - Dynamic from Database --}}
<section class="py-12 lg:py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Bento Grid Container --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 auto-rows-fr">
            
            @foreach($statistics as $stat)
                @if($stat->is_big)
                    {{-- Big Card (Row Span 2) --}}
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 relative overflow-hidden lg:row-span-2 flex flex-col justify-center">
                        {{-- Content --}}
                        <div class="relative z-10">
                            <p class="text-sm font-bold tracking-widest text-gray-400 uppercase mb-2">
                                {{ $stat->label }}
                            </p>
                            <h3 class="text-7xl lg:text-8xl font-black mb-4 bg-clip-text text-transparent bg-gradient-to-r from-yellow-500 to-teal-600">
                                {{ $stat->value }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Siswa aktif dari berbagai jurusan yang sedang menempuh pendidikan di SMK Negeri 5 Samarinda.
                            </p>
                        </div>
                        
                        {{-- Watermark Icon (Static) --}}
                        <i class="{{ $stat->icon }} absolute -bottom-8 -right-8 text-[14rem] text-gray-100/80 -rotate-12 pointer-events-none"></i>
                    </div>
                @else
                    {{-- Regular Card --}}
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 relative overflow-hidden">
                        {{-- Content --}}
                        <div class="relative z-10">
                            <p class="text-sm font-bold tracking-widest text-gray-400 uppercase mb-2">
                                {{ $stat->label }}
                            </p>
                            <h3 class="text-6xl font-black mb-2 bg-clip-text text-transparent bg-gradient-to-r from-yellow-500 to-teal-600">
                                {{ $stat->value }}
                            </h3>
                            <p class="text-gray-600 text-sm">
                                @switch($stat->label)
                                    @case('KOMPETENSI KEAHLIAN')
                                        Jurusan unggulan dengan standar industri
                                        @break
                                    @case('GURU & STAFF')
                                        Tenaga pendidik dan kependidikan profesional
                                        @break
                                    @case('ALUMNI TERSERAP')
                                        Lulusan bekerja atau melanjutkan kuliah
                                        @break
                                    @default
                                        Data statistik sekolah
                                @endswitch
                            </p>
                        </div>
                        
                        {{-- Watermark Icon (Static) --}}
                        <i class="{{ $stat->icon }} absolute -bottom-8 -right-8 text-[10rem] text-gray-100/80 -rotate-12 pointer-events-none"></i>
                    </div>
                @endif
            @endforeach
            
        </div>
        
    </div>
</section>
```

---

## 🚀 LANGKAH DEPLOYMENT

### 1. Jalankan Migration

```bash
php artisan migrate
```

### 2. Jalankan Seeder

```bash
php artisan db:seed --class=StatisticSeeder
```

**ATAU** jika ingin seed semua seeder sekaligus, tambahkan ke `DatabaseSeeder.php`:

```php
public function run(): void
{
    $this->call([
        // ... existing seeders
        StatisticSeeder::class,
    ]);
}
```

Lalu jalankan:
```bash
php artisan db:seed
```

### 3. Upload Foto Kepala Sekolah

**Path:** `public/images/kepala-sekolah.webp`

**Format:** WebP (recommended) atau JPG/PNG  
**Ukuran optimal:** 600x700px  
**Ukuran file:** < 200KB

Jika file belum tersedia, gambar akan fallback ke placeholder otomatis.

### 4. Clear Cache (Optional)

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

---

## ✨ FITUR TAMBAHAN YANG DAPAT DIKEMBANGKAN

### A. Filament Resource untuk Statistics (Admin Panel)

Buat resource Filament agar admin bisa mengelola statistik:

```bash
php artisan make:filament-resource Statistic
```

### B. Validasi Image Upload

Tambahkan validasi untuk foto kepala sekolah di settings atau CMS.

### C. Multi-Language Support

Tambahkan terjemahan untuk bahasa Indonesia dan Inggris.

---

## 📸 SCREENSHOT REFERENSI

### Hero Section:
- Button 1 (Primary Green): "Portal SMKN 5" → Link eksternal
- Button 2 (Outline White): "Kompetensi Keahlian" → Smooth scroll ke #jurusan

### Statistics Section:
- Card Besar: SISWA AKTIF (1.520) dengan icon fa-users
- Card Kecil 1: KOMPETENSI KEAHLIAN (6) dengan icon fa-layer-group
- Card Kecil 2: GURU & STAFF (120) dengan icon fa-chalkboard-user  
  *(Note: Changed from "Mitra Industri" sesuai permintaan)*
- Card Kecil 3: ALUMNI TERSERAP (98%) dengan icon fa-graduation-cap

### Headmaster Section:
- 2 Kolom Grid (responsive)
- Kiri: Foto dengan dekorasi gradient boxes
- Kanan: Sambutan dengan quote, nama, dan signature

---

## 🔧 TROUBLESHOOTING

### Error: Class 'Statistic' not found
**Solusi:** 
```bash
composer dump-autoload
```

### Statistics tidak muncul
**Cek:**
1. Apakah migration sudah dijalankan?
2. Apakah seeder sudah dijalankan?
3. Apakah controller sudah passing variable `$statistics`?

### Gambar Kepala Sekolah tidak muncul
**Cek:**
1. Path file: `public/images/kepala-sekolah.webp`
2. Permissions folder: `chmod 755 public/images`
3. Jalankan: `php artisan storage:link` (jika perlu)

---

## 📝 CATATAN PENTING

1. **FontAwesome 6** harus sudah ter-load di layout (sudah ada di `layouts/app.blade.php`)
2. **Alpine.js** diperlukan untuk dropdown navbar (sudah ter-include via Vite)
3. **Tailwind CSS** harus dikompilasi dengan benar (`npm run dev` atau `npm run build`)
4. Data statistik dapat diubah via database atau buat Filament Resource untuk manajemen yang lebih mudah

---

## 🎉 SELESAI!

Semua update telah diimplementasikan. Website SMKN 5 Samarinda sekarang memiliki:

✅ Navbar yang lebih simpel (Kesiswaan hanya Ekstrakurikuler)  
✅ Hero buttons yang diupdate (Portal SMKN 5 & Kompetensi Keahlian)  
✅ Statistik dinamis dari database  
✅ Section Sambutan Kepala Sekolah yang modern dan responsive  

**Happy Coding! 🚀**

---

**Dibuat oleh:** GitHub Copilot  
**Framework:** Laravel 12 + Tailwind CSS v4  
**Tanggal:** 6 Januari 2026
