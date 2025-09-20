<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'bio',
        'social_links',
        'status',
        'position',
        'company',
        'rating'
    ];

    protected $casts = [
        'social_links' => 'array',
        'rating' => 'integer'
    ];
    public function getRatingStarsAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }

}