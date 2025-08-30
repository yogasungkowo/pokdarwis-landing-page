<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        app()->setLocale(session('locale','id'));
        
        // Get About data
        $about = About::first();

        $activity = Activity::latest()->take(3)->get();
        
        // Create default data if not exists
        if (!$about) {
            $about = About::create([
                'year_founded' => date('Y'),
                'history' => 'Sejarah singkat organisasi belum diisi.',
                'vision' => '<p>Visi organisasi belum diisi.</p>',
                'mission' => '<ol><li>Misi organisasi belum diisi.</li></ol>',
                'location' => 'Lokasi belum diisi.',
            ]);
        }

        return view('pages.home.index', compact('about', 'activity'));
    }
}
