<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'custom_svg',
        'color',
        'featured_image',
        'category',
        'is_featured',
        'status',
        'display_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'display_order' => 'integer',
    ];

    // Boot method untuk auto-generate slug
    protected static function boot()
    {
        parent::boot();
        // Slug tidak diperlukan untuk Program
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('created_at', 'desc');
    }

    // Relationships
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function galleries()
    {
        return $this->hasManyThrough(Gallery::class, Activity::class);
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }

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

    public function getIconDisplayAttribute()
    {
        // Jika ada custom SVG, gunakan itu
        if (!empty($this->custom_svg)) {
            return $this->custom_svg;
        }

        // Jika tidak, gunakan heroicon
        if (!empty($this->icon)) {
            return $this->icon;
        }

        // Default icon
        return 'heroicon-o-squares-plus';
    }

    public function hasCustomSvgAttribute()
    {
        return !empty($this->custom_svg);
    }
}