<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'image',
    ];

    /**
     * Get the portfolio that owns the image.
     */
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}