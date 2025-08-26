<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Activity;
use App\Models\Schedule;
use App\Models\Gallery;

class ActivityController extends Controller
{
    public function index()
    {
        app()->setLocale(session('locale', 'id'));
        
        // Ambil program unggulan
        $featuredPrograms = Program::where('is_featured', true)
            ->where('status', 'active')
            ->orderBy('display_order')
            ->take(3)
            ->get();
        
        // Ambil jadwal kegiatan rutin (berdasarkan hari)
        $weeklySchedules = Schedule::where('is_active', true)
            ->orderBy('day_of_week')
            ->orderBy('display_order')
            ->get()
            ->groupBy('day_of_week');
        
        // Ambil aktivitas terbaru
        $recentActivities = Activity::with('program')
            ->where('status', 'published')
            ->orderBy('start_datetime', 'desc')
            ->take(6)
            ->get();
        
                // Galeri dokumentasi kegiatan
        $galleryItems = Gallery::where('is_featured', true)
            ->whereIn('type', ['general', 'program'])
            ->orderBy('display_order')
            ->limit(8)
            ->get();
        
        return view('pages.activities.index', compact(
            'featuredPrograms',
            'weeklySchedules', 
            'recentActivities',
            'galleryItems'
        ));
    }
}
