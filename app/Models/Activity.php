<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'program_id',
        'start_datetime',
        'end_datetime',
        'location',
        'max_participants',
        'current_participants',
        'featured_image',
        'status',
        'is_recurring',
        'recurring_schedule',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
        'is_recurring' => 'boolean',
        'recurring_schedule' => 'array',
        'max_participants' => 'integer',
        'current_participants' => 'integer',
    ];

    // Boot method untuk auto-generate slug
    protected static function boot()
    {
        parent::boot();
        // Slug tidak diperlukan untuk Activity
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_datetime', '>=', now());
    }

    public function scopeRecurring($query)
    {
        return $query->where('is_recurring', true);
    }

    public function scopeByDay($query, $dayOfWeek)
    {
        return $query->whereJsonContains('recurring_schedule->day_of_week', $dayOfWeek);
    }

    // Relationships
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }

    public function getAvailableSlotsAttribute()
    {
        return $this->max_participants ? ($this->max_participants - $this->current_participants) : null;
    }

    public function getIsFullAttribute()
    {
        return $this->max_participants && $this->current_participants >= $this->max_participants;
    }

    public function getFormattedTimeAttribute()
    {
        if ($this->start_datetime && $this->end_datetime) {
            return $this->start_datetime->format('H:i') . ' - ' . $this->end_datetime->format('H:i');
        }
        return null;
    }

    public function getDayNameAttribute()
    {
        $days = [
            0 => 'Minggu',
            1 => 'Senin', 
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu'
        ];

        if ($this->is_recurring && isset($this->recurring_schedule['day_of_week'])) {
            return $days[$this->recurring_schedule['day_of_week']];
        }

        return $this->start_datetime ? $days[$this->start_datetime->dayOfWeek] : null;
    }
}
