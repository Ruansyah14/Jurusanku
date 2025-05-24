<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'score',
        'recommended_major',
        'recommended_university',
        'career_prospects',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
