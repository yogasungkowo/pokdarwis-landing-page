<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'color'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
