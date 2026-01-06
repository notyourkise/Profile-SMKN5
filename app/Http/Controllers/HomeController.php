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
        // Get featured news (only 1)
        $featuredNews = Berita::where('status', 'published')
            ->where('is_featured', true)
            ->first();

        // Get latest 7 published news (excluding featured news)
        // We need 1 featured + 6 others = 7 total for the slider
        $latestNews = Berita::where('status', 'published')
            ->when($featuredNews, function ($query) use ($featuredNews) {
                return $query->where('id', '!=', $featuredNews->id);
            })
            ->orderBy('published_at', 'desc')
            ->take(7)
            ->get();

        // Combine featured + others for the view
        $beritaTerbaru = collect([]);
        if ($featuredNews) {
            $beritaTerbaru->push($featuredNews);
        }
        $beritaTerbaru = $beritaTerbaru->merge($latestNews);

        $jurusan = Jurusan::where('is_active', true)->get();

        // Get statistics from database ordered by order column
        $statistics = Statistic::orderBy('order')->get();

        return view('home', compact('beritaTerbaru', 'jurusan', 'statistics'));
    }
}
