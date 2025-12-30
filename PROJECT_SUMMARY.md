# SMKN 5 Samarinda - Web Profile Project

## 🎉 Status Penyelesaian: SELESAI ✅

### Tech Stack

-   **Framework**: Laravel 12
-   **Admin Panel**: FilamentPHP v4.3
-   **Database**: MySQL (via Laragon)
-   **Frontend**: Blade Templates + TailwindCSS

---

## ✅ Yang Sudah Dikerjakan

### 1. Database & Migrations

-   ✅ Tabel `jurusan` (kode, nama, deskripsi, image, durasi_tahun, is_active)
-   ✅ Tabel `berita` (judul, slug, konten, gambar, user_id, status, published_at)
-   ✅ Tabel `settings` (key, value, type, group)

### 2. Models

-   ✅ `Jurusan` Model dengan fillable & casts
-   ✅ `Berita` Model dengan auto-slug generation & relasi User
-   ✅ `Setting` Model dengan helper methods (get/set)

### 3. FilamentPHP Admin Panel

-   ✅ Instalasi Filament v4.3
-   ✅ Admin Panel sudah dikonfigurasi
-   ✅ Admin User: `admin@smkn5.com`
-   ✅ Resources lengkap dengan Form & Table:
    -   JurusanResource (label Indonesia, form validation)
    -   BeritaResource (RichEditor, auto-slug)
    -   SettingResource (key-value system)

### 4. Frontend

-   ✅ Controllers: HomeController, JurusanController, BeritaController
-   ✅ Routes: /, /jurusan, /jurusan/{id}, /berita, /berita/{slug}
-   ✅ Blade Views:
    -   Layout template dengan Navbar & Footer
    -   Homepage dengan Hero Section
    -   Daftar Jurusan
    -   Detail Jurusan
    -   Daftar Berita (dengan pagination)
    -   Detail Berita
-   ✅ Styling dengan TailwindCSS (via CDN)

---

## 🚀 Cara Menggunakan

### Akses Admin Panel

1. Buka browser: `http://localhost:8000/admin`
2. Login dengan:
    - Email: `admin@smkn5.com`
    - Password: (yang Anda input saat setup)

### Mengelola Konten

1. **Tambah Jurusan**: Admin → Jurusan → Create
2. **Tambah Berita**: Admin → Berita → Create
3. **Pengaturan**: Admin → Pengaturan → Create (key-value pairs)

### Akses Frontend

-   Homepage: `http://localhost:8000/`
-   Jurusan: `http://localhost:8000/jurusan`
-   Berita: `http://localhost:8000/berita`

---

## 📁 Struktur File Penting

```
app/
├── Http/Controllers/
│   ├── HomeController.php
│   ├── JurusanController.php
│   └── BeritaController.php
├── Models/
│   ├── Jurusan.php
│   ├── Berita.php
│   └── Setting.php
└── Filament/Resources/
    ├── Jurusans/
    ├── Beritas/
    └── Settings/

resources/views/
├── layouts/
│   └── app.blade.php
├── home.blade.php
├── jurusan/
│   ├── index.blade.php
│   └── show.blade.php
└── berita/
    ├── index.blade.php
    └── show.blade.php

database/migrations/
├── 2025_12_30_120934_create_jurusan_table.php
├── 2025_12_30_120958_create_berita_table.php
└── 2025_12_30_121003_create_settings_table.php
```

---

## 🎨 Fitur yang Sudah Ada

### Admin Panel (FilamentPHP)

-   ✅ CRUD Jurusan dengan upload gambar
-   ✅ CRUD Berita dengan Rich Text Editor
-   ✅ Auto-generate slug untuk berita
-   ✅ Status management (Draft/Published)
-   ✅ Settings management (key-value)
-   ✅ User authentication
-   ✅ Responsive tables dengan search & filter

### Frontend

-   ✅ Responsive design (Mobile-friendly)
-   ✅ Hero section di homepage
-   ✅ Display jurusan dengan gambar
-   ✅ Display berita dengan pagination
-   ✅ Detail pages untuk jurusan & berita
-   ✅ Breadcrumb navigation
-   ✅ Modern UI dengan TailwindCSS

---

## 📝 Catatan Penting

1. **Upload File**: File yang diupload (gambar jurusan/berita) akan tersimpan di `storage/app/public/` dan dapat diakses via symbolic link yang sudah dibuat.

2. **Admin Credentials**: Simpan baik-baik email dan password admin Anda.

3. **Database**: Pastikan MySQL di Laragon tetap running saat menggunakan aplikasi.

---

## 🔜 Saran Pengembangan Selanjutnya

1. **Galeri**: Tambah resource untuk galeri foto/video
2. **Prestasi**: Resource untuk menampilkan prestasi siswa
3. **Kontak Form**: Tambah form kontak dengan email notification
4. **SEO**: Implement meta tags dari Settings
5. **Multi-language**: Tambah support multi-bahasa
6. **Dashboard Stats**: Widget statistik di Filament dashboard
7. **Social Media Links**: Tambah social media links di footer

---

## ✅ Project Status: READY TO USE!

Aplikasi sudah siap digunakan untuk:

-   Mengelola data jurusan
-   Publish berita/artikel
-   Tampil di website public
-   Admin panel yang user-friendly

**Happy Coding! 🚀**
