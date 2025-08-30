<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Organization;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        app()->setLocale(session('locale', 'id'));
        
        $organization = Organization::get();
        // Ambil data about (single record)
        $about = About::first();
        
        // Jika belum ada data, buat default
        if (!$about) {
            $about = About::create([
                'year_founded' => 2020,
                'history' => 'POKDARWIS (Kelompok Sadar Wisata) didirikan untuk mengembangkan potensi wisata daerah dengan melibatkan masyarakat lokal dalam pengelolaan dan pelestarian objek wisata.',
                'vision' => '<p>Menjadi organisasi terdepan dalam pengembangan wisata berkelanjutan yang bermanfaat bagi masyarakat lokal.</p>',
                'mission' => '<ol><li>Mengembangkan potensi wisata dengan melibatkan masyarakat lokal</li><li>Melestarikan budaya dan lingkungan hidup</li><li>Meningkatkan kesejahteraan masyarakat melalui pariwisata</li><li>Membangun kesadaran wisata yang bertanggung jawab</li></ol>',
                'location' => 'Yogyakarta, Indonesia',
            ]);
        }

        return view('pages.about.index', compact('about', 'organization'));
    }
}
