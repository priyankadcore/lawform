<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'order'
    ];

    // Default values
    protected $attributes = [
        'order' => 0,
        'parent_id' => null
    ];

    // Casting for type safety
    protected $casts = [
        'order' => 'integer',
        'parent_id' => 'integer'
    ];

    // Parent relationship
    public function parent()
    {
        return $this->belongsTo(Navigation::class, 'parent_id');
    }

    // Children relationship
    public function children()
    {
        return $this->hasMany(Navigation::class, 'parent_id')->orderBy('order');
    }

    // Scope for parent items
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    // Get navigation items in order
    public static function getOrderedNavigation()
    {
        return self::with(['children' => function($query) {
            $query->orderBy('order');
        }])
        ->parents()
        ->orderBy('order')
        ->get();
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($navigation) {
            // Delete all children recursively
            $navigation->children()->delete();
        });
    }
}