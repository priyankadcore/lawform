<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\State;
use App\Models\City;
use App\Models\Property;

class Country extends Model
{
    protected $fillable = [
        'name',
        'code',
        'phone_code',
        'currency',
        'currency_symbol',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    public function states(): HasMany
    {
        return $this->hasMany(State::class);
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
