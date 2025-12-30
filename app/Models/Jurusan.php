<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'image',
        'durasi_tahun',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'durasi_tahun' => 'integer',
    ];
}
