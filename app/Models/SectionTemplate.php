<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'section_type_id',
        'style_variant',
        'description',
        'icon',
        'image',
        'config_properties',
        'status',
        'config_schema',
    ];

    protected $casts = [
        'status' => 'boolean',
        'config_schema' => 'array', // stored as JSON
    ];

    /**
     * Relationship: A template belongs to a section type
     */
    public function sectionType()
    {
        return $this->belongsTo(SectionType::class, 'section_type_id');
    }
}

