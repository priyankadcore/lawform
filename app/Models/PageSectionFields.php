<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSectionFields extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_section_id',
        'field_key',
        'field_label',
        'field_type',
        'field_value',
    ]; 

    public function pageSection()
    {
        return $this->belongsTo(PageSection::class);
    }
}
