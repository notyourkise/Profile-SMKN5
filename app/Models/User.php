<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get all berita created by this user
     */
    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is redaktur
     */
    public function isRedaktur(): bool
    {
        return $this->role === 'redaktur';
    }

    /**
     * Check if user is jurnalis
     */
    public function isJurnalis(): bool
    {
        return $this->role === 'jurnalis';
    }

    /**
     * Determine if the user can access the Filament panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Semua user yang sudah login bisa akses admin panel
        // Bisa dimodifikasi untuk restrict berdasarkan role
        return true;
        
        // Atau jika ingin hanya role tertentu:
        // return in_array($this->role, ['admin', 'redaktur', 'jurnalis']);
        
        // Atau jika menggunakan Spatie Permission:
        // return $this->hasAnyRole(['Admin', 'Redaktur', 'Jurnalis']);
    }
}
