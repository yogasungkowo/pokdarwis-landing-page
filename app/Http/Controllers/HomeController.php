<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class HomeController extends Controller
{
    public function index()
    {
        app()->setLocale(session('locale','id'));
        
        // Get About data
        $about = About::first();
        
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
        
        return view('pages.home.index', compact('about'));
    }
}
