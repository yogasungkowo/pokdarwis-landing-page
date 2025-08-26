<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'metric_name',
        'metric_value',
        'icon',
        'description',
        'color',
        'achievement_date',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'achievement_date' => 'date',
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('created_at', 'desc');
    }

    // Accessors
    public function getFormattedDateAttribute()
    {
        return $this->achievement_date ? $this->achievement_date->format('d M Y') : null;
    }

    public function getIconSvgAttribute()
    {
        // Default icons jika tidak ada
        $defaultIcons = [
            'coral' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9',
            'trash' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7',
            'people' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857',
            'village' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1'
        ];

        return $this->icon ?: $defaultIcons['coral'];
    }

    public function getColorClassAttribute()
    {
        $colorMap = [
            '#10B981' => 'emerald',
            '#3B82F6' => 'blue', 
            '#06B6D4' => 'sky',
            '#8B5CF6' => 'purple',
            '#F59E0B' => 'amber',
            '#EF4444' => 'red',
            '#EC4899' => 'pink',
        ];

        return $colorMap[$this->color] ?? 'emerald';
    }
}
