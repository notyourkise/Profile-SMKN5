<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Jurusan;
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

        return view('home', compact('beritaTerbaru', 'jurusan'));
    }
}
