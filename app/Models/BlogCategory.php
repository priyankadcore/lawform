<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Blog;

class BlogCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'is_featured',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}