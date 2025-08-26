<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'color'];

    // Boot method untuk auto-generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') && empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Relationships
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function publishedArticles()
    {
        return $this->hasMany(Article::class)->where('is_published', true);
    }

    // Scopes
    public function scopeWithArticleCount($query)
    {
        return $query->withCount(['articles' => function($q) {
            $q->where('is_published', true);
        }]);
    }

    // Accessors
    public function getColorClassAttribute()
    {
        $colorMap = [
            '#3B82F6' => 'blue',
            '#10B981' => 'emerald', 
            '#06B6D4' => 'sky',
            '#8B5CF6' => 'purple',
            '#F59E0B' => 'amber',
            '#EF4444' => 'red',
            '#EC4899' => 'pink',
        ];

        return $colorMap[$this->color] ?? 'blue';
    }
}
