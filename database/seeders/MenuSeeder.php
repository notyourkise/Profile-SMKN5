<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing menus
        Menu::truncate();

        // 1. BERANDA (Link)
        Menu::create([
            'title' => 'Beranda',
            'url' => '/',
            'type' => 'link',
            'order' => 1,
            'is_active' => true,
        ]);

        // 2. TENTANG (Dropdown Parent)
        $tentangParent = Menu::create([
            'title' => 'Tentang',
            'url' => null,
            'type' => 'dropdown',
            'order' => 2,
            'is_active' => true,
        ]);

        // Sub-menu Tentang
        Menu::create([
            'title' => 'Profil Sekolah',
            'url' => '/about/profile',
            'type' => 'link',
            'parent_id' => $tentangParent->id,
            'order' => 1,
            'is_active' => true,
        ]);

        Menu::create([
            'title' => 'Visi & Misi',
            'url' => '/about/vision',
            'type' => 'link',
            'parent_id' => $tentangParent->id,
            'order' => 2,
            'is_active' => true,
        ]);

        Menu::create([
            'title' => 'Fasilitas',
            'url' => '/about/facilities',
            'type' => 'link',
            'parent_id' => $tentangParent->id,
            'order' => 3,
            'is_active' => true,
        ]);

        // 3. JURUSAN (Link)
        Menu::create([
            'title' => 'Jurusan',
            'url' => '/jurusan',
            'type' => 'link',
            'order' => 3,
            'is_active' => true,
        ]);

        // 4. INFORMASI (Dropdown Parent)
        $infoParent = Menu::create([
            'title' => 'Informasi',
            'url' => null,
            'type' => 'dropdown',
            'order' => 4,
            'is_active' => true,
        ]);

        // Sub-menu Informasi
        Menu::create([
            'title' => 'Berita',
            'url' => '/berita',
            'type' => 'link',
            'parent_id' => $infoParent->id,
            'order' => 1,
            'is_active' => true,
        ]);

        Menu::create([
            'title' => 'Galeri',
            'url' => '/galeri',
            'type' => 'link',
            'parent_id' => $infoParent->id,
            'order' => 2,
            'is_active' => true,
        ]);

        Menu::create([
            'title' => 'Ekstrakurikuler',
            'url' => '/ekstrakurikuler',
            'type' => 'link',
            'parent_id' => $infoParent->id,
            'order' => 3,
            'is_active' => true,
        ]);

        // 5. KONTAK (Link)
        Menu::create([
            'title' => 'Kontak',
            'url' => '/kontak',
            'type' => 'link',
            'order' => 5,
            'is_active' => true,
        ]);
    }
}
