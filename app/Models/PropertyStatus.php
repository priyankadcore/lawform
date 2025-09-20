<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;   
use App\Models\Property;

class PropertyStatus extends Model
{
    protected $fillable = [
        'name',
        'color',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
    
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}