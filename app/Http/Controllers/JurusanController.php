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

    public function show($id)
    {
        $jurusan = Jurusan::where('is_active', true)->findOrFail($id);
        return view('jurusan.show', compact('jurusan'));
    }
}
