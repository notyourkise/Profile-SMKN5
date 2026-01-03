<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'url',
        'type',
        'parent_id',
        'order',
        'is_active',
        'icon',
        'open_new_tab',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'open_new_tab' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Boot method untuk auto-reordering
     */
    protected static function boot()
    {
        parent::boot();

        // Sebelum create menu baru
        static::creating(function ($menu) {
            static::reorderMenus($menu, null);
        });

        // Sebelum update menu yang sudah ada
        static::updating(function ($menu) {
            if ($menu->isDirty('order') || $menu->isDirty('parent_id')) {
                static::reorderMenus($menu, $menu->getOriginal('order'));
            }
        });

        // Setelah delete menu
        static::deleted(function ($menu) {
            static::normalizeOrders($menu->parent_id);
        });
    }

    /**
     * Reorder menus otomatis saat create/update
     */
    protected static function reorderMenus($menu, $oldOrder)
    {
        $newOrder = $menu->order;
        $parentId = $menu->parent_id;

        // Query menu dengan parent yang sama (kecuali menu yang sedang diupdate)
        $query = static::where('parent_id', $parentId);
        
        if ($menu->exists) {
            $query->where('id', '!=', $menu->id);
        }

        $siblings = $query->orderBy('order')->get();

        // Jika creating atau parent berubah, geser menu yang >= newOrder
        if (!$menu->exists || $menu->isDirty('parent_id')) {
            foreach ($siblings as $sibling) {
                if ($sibling->order >= $newOrder) {
                    // Update tanpa trigger event
                    static::withoutEvents(function () use ($sibling) {
                        $sibling->increment('order');
                    });
                }
            }
        }
        // Jika updating order
        elseif ($oldOrder !== null && $oldOrder != $newOrder) {
            if ($newOrder < $oldOrder) {
                // Geser ke kiri: increment menu antara newOrder dan oldOrder
                foreach ($siblings as $sibling) {
                    if ($sibling->order >= $newOrder && $sibling->order < $oldOrder) {
                        static::withoutEvents(function () use ($sibling) {
                            $sibling->increment('order');
                        });
                    }
                }
            } else {
                // Geser ke kanan: decrement menu antara oldOrder dan newOrder
                foreach ($siblings as $sibling) {
                    if ($sibling->order > $oldOrder && $sibling->order <= $newOrder) {
                        static::withoutEvents(function () use ($sibling) {
                            $sibling->decrement('order');
                        });
                    }
                }
            }
        }
    }

    /**
     * Normalize orders setelah delete (hapus gap)
     */
    protected static function normalizeOrders($parentId)
    {
        $menus = static::where('parent_id', $parentId)
            ->orderBy('order')
            ->get();

        foreach ($menus as $index => $menu) {
            // Update tanpa trigger event dan timestamps
            static::withoutEvents(function () use ($menu, $index) {
                $menu->timestamps = false;
                $menu->update(['order' => $index + 1]);
                $menu->timestamps = true;
            });
        }
    }

    /**
     * Get the parent menu
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    /**
     * Get all child menus (sub-menu)
     */
    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    /**
     * Get only active child menus
     */
    public function activeChildren(): HasMany
    {
        return $this->children()->where('is_active', true);
    }

    /**
     * Scope: Get only parent menus (top-level)
     */
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id')->orderBy('order');
    }

    /**
     * Scope: Get only active menus
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Check if this menu has children
     */
    public function hasChildren(): bool
    {
        return $this->children()->exists();
    }

    /**
     * Check if this is a dropdown menu
     */
    public function isDropdown(): bool
    {
        return $this->type === 'dropdown';
    }
}
