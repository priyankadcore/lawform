<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name', 
        'slug',
        'status',
        'meta_title',
        'canonical_url',
        'meta_keywords',
        'meta_description',
        'og_title',
        'og_description',
        'og_image_url',
    ];

    public function sections()
    {
        return $this->hasMany(PageSection::class);
    }
}
