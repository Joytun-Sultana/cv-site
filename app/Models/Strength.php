<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strength extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'strength',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
};