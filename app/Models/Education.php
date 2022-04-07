<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution',
        'field',
        'start',
        'completion',
        'education_level_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function education_level()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }
}
