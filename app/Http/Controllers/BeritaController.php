<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::where('status', 'published');

        // Filter berdasarkan pencarian
        if ($request->has('q') && $request->q != '') {
            $searchTerm = $request->q;
            $query->where('judul', 'like', '%' . $searchTerm . '%');
        }

        $berita = $query->orderBy('published_at', 'desc')
            ->paginate(12)
            ->appends(['q' => $request->q]); // Maintain search query in pagination

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
