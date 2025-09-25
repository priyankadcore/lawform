<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'section_type_id',
        'section_template_id',
        'order',
    ];

    // Relationships
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function sectionType()
    {
        return $this->belongsTo(SectionType::class);
    }

    public function sectionTemplate()
    {
        return $this->belongsTo(SectionTemplate::class);
    }
}
