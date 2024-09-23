<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'phone', 'email', 'github_link',
        'linkedin_link', 'address', 'strengths', 'skills', 'educations',
        'experiences', 'projects'
    ];

    protected $casts = [
        'strengths' => 'array',
        'skills' => 'array',
        'educations' => 'array',
    ];
}

