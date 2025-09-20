<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'email',
        'name',
        'phone',
        'email_verified_at',
        'status',
        'meta'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'meta' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeVerified($query)
    {
        return $query->whereNotNull('email_verified_at');
    }

    public function verify()
    {
        $this->update(['email_verified_at' => now()]);
    }

    public function unsubscribe()
    {
        $this->update(['status' => 'unsubscribed']);
    }
}