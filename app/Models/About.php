<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'title', 'avatar', 'email', 'phone', 'address', 'birthday', 'summary', 'skills', 'experience', 'education', 'social_links'
    ];

    protected $casts = [
        'social_links' => 'array',
        'birthday' => 'date',
    ];
}
