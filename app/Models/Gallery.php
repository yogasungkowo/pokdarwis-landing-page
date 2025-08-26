<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'activity_id',
        'type',
        'is_featured',
        'photo_date',
        'display_order',
    ];

    protected $casts = [
        'photo_date' => 'date',
        'is_featured' => 'boolean',
        'display_order' => 'integer',
    ];

    // Scopes
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('created_at', 'desc');
    }

    public function scopeByProgram($query, $programId)
    {
        return $query->where('type', 'program')->whereHas('activity.program', function($q) use ($programId) {
            $q->where('id', $programId);
        });
    }

    // Relationships
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function program()
    {
        return $this->hasOneThrough(Program::class, Activity::class, 'id', 'id', 'activity_id', 'program_id');
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        // Jika image_path adalah URL (dimulai dengan http), return langsung
        if ($this->image_path && (str_starts_with($this->image_path, 'http://') || str_starts_with($this->image_path, 'https://'))) {
            return $this->image_path;
        }
        
        // Jika image_path adalah path file lokal, return dengan asset storage
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    public function getFormattedDateAttribute()
    {
        return $this->photo_date ? $this->photo_date->format('d M Y') : null;
    }

    public function getThumbnailUrlAttribute()
    {
        // Bisa digunakan untuk generate thumbnail jika perlu
        return $this->image_url;
    }
}
