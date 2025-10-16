<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CareerJob extends Model
{
    use HasFactory;

    protected $table = 'careers_jobs';

    protected $fillable = [
        'title',
        'description',
        'requirements',
        'job_type',
        'experience_level',
        'company_name',
        'location',
        'salary_min',
        'salary_max',
        'contact_email',
    ];

    protected $casts = [
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
    ];



}