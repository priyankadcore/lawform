<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;   
use App\Models\Property;

class PropertyType extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'description',
        'image',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
 
    public function getIconUrlAttribute()
    {
        return $this->icon ? asset('storage/property_type' . $this->icon) : null;
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/property_type/' . $this->image) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}