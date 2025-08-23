<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'color'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags');
    }
}
