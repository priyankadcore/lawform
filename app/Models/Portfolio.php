<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'client',
        'project_date',
        'description',
        'project_url',
        'technologies',
        'featured_image',
        'status'
    ];

    protected $casts = [
        'project_date' => 'date',
        'status' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }

    // Auto-generate slug
    public static function boot()
    {
        parent::boot();

        static::creating(function ($portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = \Str::slug($portfolio->name);
            }
        });

        static::updating(function ($portfolio) {
            if ($portfolio->isDirty('name') && empty($portfolio->slug)) {
                $portfolio->slug = \Str::slug($portfolio->name);
            }
        });
    }
}