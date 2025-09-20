<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BlogCategory;
use App\Models\User;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'author_id',
        'category_id',
        'status',
        'meta_title',
        'meta_description',
        'published_at'
    ];

    protected $casts = [
        'status' => 'boolean',
        'published_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
            if ($blog->status && !$blog->published_at) {
                $blog->published_at = now();
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title')) {
                $blog->slug = Str::slug($blog->title);
            }
            if ($blog->isDirty('status') && $blog->status && !$blog->published_at) {
                $blog->published_at = now();
            }
        });
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 200);
    }

    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return ceil($wordCount / 200); // Average reading speed: 200 words per minute
    }
}