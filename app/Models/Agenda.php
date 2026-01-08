<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'location',
        'is_active',
    ];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk agenda yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk agenda dalam rentang waktu (5 hari lalu - 2 minggu kedepan)
     */
    public function scopeUpcoming($query)
    {
        return $query->whereDate('date', '>=', now()->subDays(5))
                    ->whereDate('date', '<=', now()->addWeeks(2));
    }
}
