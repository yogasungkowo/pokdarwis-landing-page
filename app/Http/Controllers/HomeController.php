<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Activity;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        app()->setLocale(session('locale', 'id'));
        
        // Ambil program unggulan untuk ditampilkan di homepage
        $featuredPrograms = Program::where('is_featured', true)
            ->where('status', 'active')
            ->orderBy('display_order')
            ->take(3)
            ->get();
        
        // Ambil aktivitas terbaru
        $recentActivities = Activity::with('program')
            ->where('status', 'published')
            ->orderBy('start_datetime', 'desc')
            ->take(3)
            ->get();
        
        // Galeri dokumentasi terbaru
        $galleryImages = Gallery::where('is_featured', true)
            ->where('type', 'photo')
            ->orderBy('display_order')
            ->limit(6)
            ->get();
        
        return view('pages.home.index', compact(
            'featuredPrograms',
            'recentActivities', 
            'galleryImages'
        ));
    }
}
