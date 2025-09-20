<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'image',
        'featured',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $service->slug = Str::slug($service->title);
        });

        static::updating(function ($service) {
            $service->slug = Str::slug($service->title);
        });
    }
}
