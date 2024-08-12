<?php

// PersonalDetail.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class PersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'github',
        'linkedin',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}




