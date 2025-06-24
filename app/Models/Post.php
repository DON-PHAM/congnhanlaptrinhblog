<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'excerpt', 'image', 'slug', 'content', 'user_id', 'category_id', 'status', 'is_featured', 'views',
        'meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description', 'og_image', 
        'twitter_title', 'twitter_description', 'twitter_image'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
