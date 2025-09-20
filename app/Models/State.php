<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Country;
use App\Models\City;

use App\Models\Property;

class State extends Model
{
    protected $fillable = [
        'country_id',
        'name',
        'code',
        'status'
    ];
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
    
}