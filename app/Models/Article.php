<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'excerpt', 'image', 'slug', 'user_id', 'category_id', 'is_published', 'published_at', 'meta_title', 'meta_description', 'meta_keywords', 'meta_image', 'is_featured', 'is_trending', 'view_count'];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'is_trending' => 'boolean',
        'view_count' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }
}
