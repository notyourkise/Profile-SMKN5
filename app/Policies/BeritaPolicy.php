<?php

namespace App\Policies;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BeritaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Semua role bisa lihat list berita
        return in_array($user->role, ['admin', 'redaktur', 'jurnalis']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Berita $berita): bool
    {
        // Admin dan Redaktur bisa lihat semua berita
        if (in_array($user->role, ['admin', 'redaktur'])) {
            return true;
        }
        
        // Jurnalis hanya bisa lihat berita mereka sendiri
        if ($user->role === 'jurnalis') {
            return $berita->user_id === $user->id;
        }
        
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Semua role bisa create berita
        return in_array($user->role, ['admin', 'redaktur', 'jurnalis']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Berita $berita): bool
    {
        // Admin dan Redaktur bisa edit semua berita
        if (in_array($user->role, ['admin', 'redaktur'])) {
            return true;
        }
        
        // Jurnalis hanya bisa edit berita mereka sendiri
        // DAN hanya jika statusnya masih draft atau review (belum published)
        if ($user->role === 'jurnalis') {
            return $berita->user_id === $user->id 
                   && in_array($berita->status, ['draft', 'review']);
        }
        
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Berita $berita): bool
    {
        // Admin bisa delete semua berita
        if ($user->role === 'admin') {
            return true;
        }
        
        // Redaktur bisa delete berita yang belum published
        if ($user->role === 'redaktur') {
            return in_array($berita->status, ['draft', 'review']);
        }
        
        // Jurnalis hanya bisa delete berita mereka yang masih draft
        if ($user->role === 'jurnalis') {
            return $berita->user_id === $user->id 
                   && $berita->status === 'draft';
        }
        
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Berita $berita): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Berita $berita): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can publish the berita.
     * Custom policy method untuk publish permission
     */
    public function publish(User $user, Berita $berita): bool
    {
        // Hanya Admin dan Redaktur yang bisa publish
        return in_array($user->role, ['admin', 'redaktur']);
    }
}
