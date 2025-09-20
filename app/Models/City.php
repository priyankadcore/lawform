<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Country;
use App\Models\State;
use App\Models\Property;

class City extends Model
{
    protected $fillable = [
        'state_id',
        'country_id',
        'name',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

}