<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = "educations";

    protected $fillable = [
        'user_id',
        'institution_name',
        'field_of_study',
        'degree',
        'graduation_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}




