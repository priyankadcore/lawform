<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'section_type_id',
        'style_variant',
        'fields',
        'image',
    ];

   

    public function sectionType()
    {
        return $this->belongsTo(SectionType::class);
    }
}
