<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'value',
        'description',
        'icon',
        'is_big',
        'order',
    ];

    protected $casts = [
        'is_big' => 'boolean',
    ];
}
