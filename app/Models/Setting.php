<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'about_us',
        'terms_conditions',
        'privacy_policy'
    ];
}
