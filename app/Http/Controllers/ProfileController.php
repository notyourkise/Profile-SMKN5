<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Halaman Tentang SMK 5
     * Menampilkan sejarah, visi misi, pimpinan, dll
     */
    public function tentang()
    {
        return view('profil.tentang');
    }

    /**
     * Halaman Unit & Pegawai
     * Menampilkan daftar unit kerja dan kepegawaian
     */
    public function unit()
    {
        return view('profil.unit');
    }

    /**
     * Halaman Struktur Organisasi
     * Menampilkan bagan struktur organisasi sekolah
     */
    public function struktur()
    {
        return view('profil.struktur');
    }
}
