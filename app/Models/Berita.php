<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'user_id',
        'status',
        'published_at',
        'is_featured',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });

        // Ensure only one featured news at a time
        static::saving(function ($berita) {
            if ($berita->is_featured) {
                // Remove featured status from all other news
                static::where('id', '!=', $berita->id)->update(['is_featured' => false]);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
