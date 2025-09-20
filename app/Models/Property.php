<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'latitude',
        'longitude',
        'property_type_id',
        'property_status_id',
        'bedrooms',
        'bathrooms',
        'area',
        'year_built',
        'featured',
        'garage',
        'garage_size',
        'amenities',
        'images',
        'video_url',
        'floor_plans',
        'meta_title',
        'meta_description',
        'status',
        'created_by'
    ];

    protected $casts = [
        'amenities' => 'array',
        'images' => 'array',
        'floor_plans' => 'array',
        'featured' => 'boolean',
        'garage' => 'boolean',
        'status' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            $property->slug = Str::slug($property->title);
        });

        static::updating(function ($property) {
            if ($property->isDirty('title')) {
                $property->slug = Str::slug($property->title);
            }
        });
    }

    // Relationships
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function propertyStatus()
    {
        return $this->belongsTo(PropertyStatus::class, 'property_status_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Accessors
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    public function getMainImageAttribute()
    {
        return $this->images ? asset('storage/' . $this->images[0]) : asset('build/images/comming-soon.jpg');
    }

    // Scopes
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}