<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::where('is_active', true)->get();
        return view('jurusan.index', compact('jurusan'));
    }

    public function show($slug)
    {
        // Ambil semua jurusan aktif untuk toggle menu
        $allJurusan = Jurusan::where('is_active', true)
            ->orderBy('kode')
            ->get();
        
        // Cari jurusan yang dipilih berdasarkan kode (slug) atau ID
        $jurusan = Jurusan::where('is_active', true)
            ->where(function($query) use ($slug) {
                $query->where('kode', $slug)
                      ->orWhere('id', $slug);
            })
            ->firstOrFail();
            
        return view('jurusan.show', compact('jurusan', 'allJurusan'));
    }
}
