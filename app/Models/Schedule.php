<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_of_week',
        'activity_name',
        'start_time',
        'end_time',
        'participants_info',
        'location',
        'description',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'start_time' => 'string',
        'end_time' => 'string',
        'day_of_week' => 'integer',
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByDay($query, $dayOfWeek)
    {
        return $query->where('day_of_week', $dayOfWeek);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('day_of_week')->orderBy('start_time');
    }

    // Accessors
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

        return $days[$this->day_of_week] ?? '';
    }

    public function getFormattedTimeAttribute()
    {
        if ($this->start_time && $this->end_time) {
            // Konversi format time H:i:s ke H:i jika diperlukan
            $startTime = date('H:i', strtotime($this->start_time));
            $endTime = date('H:i', strtotime($this->end_time));
            return $startTime . ' - ' . $endTime;
        }
        return null;
    }

    public function getTimeRangeAttribute()
    {
        return $this->formatted_time;
    }

    // Static method untuk mendapatkan hari ini
    public static function todaySchedule()
    {
        return static::active()
            ->byDay(now()->dayOfWeek)
            ->ordered()
            ->get();
    }

    // Static method untuk mendapatkan jadwal minggu ini
    public static function weeklySchedule()
    {
        return static::active()
            ->ordered()
            ->get()
            ->groupBy('day_of_week');
    }
}
