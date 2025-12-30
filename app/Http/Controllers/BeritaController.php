<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('berita.index', compact('berita'));
    }

    public function show($slug)
    {
        $berita = Berita::where('status', 'published')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('berita.show', compact('berita'));
    }
}
