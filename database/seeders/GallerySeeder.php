<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\Activity;
use Carbon\Carbon;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = Activity::all();

        $galleries = [
            // General galleries
            [
                'title' => 'Sunset Indah di Pantai Parangtritis',
                'description' => 'Momen sunset yang memukau di Pantai Parangtritis dengan siluet gunung di kejauhan',
                'image_path' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'type' => 'general',
                'photo_date' => Carbon::now()->subDays(15),
                'is_featured' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'Pemandangan Gunung Merapi dari Kejauhan',
                'description' => 'Gunung Merapi yang megah terlihat dari jalur pendakian dengan kabut pagi',
                'image_path' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=800&h=600&fit=crop',
                'type' => 'general',
                'photo_date' => Carbon::now()->subDays(20),
                'is_featured' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Arsitektur Kraton Yogyakarta',
                'description' => 'Detail arsitektur tradisional Jawa di kompleks Kraton Yogyakarta',
                'image_path' => 'https://images.unsplash.com/photo-1545558014-8692077e9b5c?w=800&h=600&fit=crop',
                'type' => 'general',
                'photo_date' => Carbon::now()->subDays(10),
                'is_featured' => true,
                'display_order' => 3,
            ],
            [
                'title' => 'Kuliner Khas Malioboro',
                'description' => 'Berbagai makanan khas Yogyakarta yang tersaji di sepanjang Malioboro',
                'image_path' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800&h=600&fit=crop',
                'type' => 'general',
                'photo_date' => Carbon::now()->subDays(8),
                'is_featured' => true,
                'display_order' => 4,
            ],
            [
                'title' => 'Proses Pembuatan Batik',
                'description' => 'Pengrajin sedang membuat motif batik dengan teknik canting tradisional',
                'image_path' => 'https://images.unsplash.com/photo-1566041510394-cf7c8fe21800?w=800&h=600&fit=crop',
                'type' => 'general',
                'photo_date' => Carbon::now()->subDays(12),
                'is_featured' => true,
                'display_order' => 5,
            ],

            // Activity-related galleries
            [
                'title' => 'Peserta Photography Workshop',
                'description' => 'Para peserta sedang belajar teknik fotografi sunrise di Pantai Parangtritis',
                'image_path' => 'https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=800&h=600&fit=crop',
                'activity_id' => $activities->where('title', 'Sunrise Photography di Pantai Parangtritis')->first()?->id,
                'type' => 'activity',
                'photo_date' => Carbon::now()->subDays(5),
                'is_featured' => false,
                'display_order' => 6,
            ],
            [
                'title' => 'Group Trekking Merapi',
                'description' => 'Tim trekking berpose di puncak Merapi setelah berhasil mencapai sunrise point',
                'image_path' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?w=800&h=600&fit=crop',
                'activity_id' => $activities->where('title', 'Merapi Sunrise Trekking')->first()?->id,
                'type' => 'activity',
                'photo_date' => Carbon::now()->subDays(7),
                'is_featured' => false,
                'display_order' => 7,
            ],
            [
                'title' => 'Tari Tradisional di Kraton',
                'description' => 'Pertunjukan tari Srimpi yang memukau di halaman Kraton Yogyakarta',
                'image_path' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&h=600&fit=crop',
                'activity_id' => $activities->where('title', 'Traditional Dance Workshop')->first()?->id,
                'type' => 'activity',
                'photo_date' => Carbon::now()->subDays(3),
                'is_featured' => false,
                'display_order' => 8,
            ],
            [
                'title' => 'Cooking Class Gudeg',
                'description' => 'Peserta cooking class sedang belajar memasak gudeg authentic',
                'image_path' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&h=600&fit=crop',
                'activity_id' => $activities->where('title', 'Cooking Class: Gudeg Authentic')->first()?->id,
                'type' => 'activity',
                'photo_date' => Carbon::now()->subDays(4),
                'is_featured' => false,
                'display_order' => 9,
            ],
            [
                'title' => 'Workshop Batik Pemula',
                'description' => 'Peserta workshop sedang belajar teknik dasar membuat batik',
                'image_path' => 'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=800&h=600&fit=crop',
                'activity_id' => $activities->where('title', 'Batik Making Workshop - Beginner')->first()?->id,
                'type' => 'activity',
                'photo_date' => Carbon::now()->subDays(6),
                'is_featured' => false,
                'display_order' => 10,
            ],

            // Program-related galleries
            [
                'title' => 'Keindahan Alam Yogyakarta',
                'description' => 'Panorama alam Yogyakarta yang menawan dengan perbukitan hijau',
                'image_path' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&h=600&fit=crop',
                'type' => 'program',
                'photo_date' => Carbon::now()->subDays(25),
                'is_featured' => true,
                'display_order' => 11,
            ],
            [
                'title' => 'Kehidupan Masyarakat Lokal',
                'description' => 'Aktivitas sehari-hari masyarakat lokal Yogyakarta yang penuh kearifan',
                'image_path' => 'https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=800&h=600&fit=crop',
                'type' => 'program',
                'photo_date' => Carbon::now()->subDays(30),
                'is_featured' => false,
                'display_order' => 12,
            ],
            [
                'title' => 'Testimoni Peserta Program',
                'description' => 'Ekspresi bahagia peserta setelah mengikuti program wisata kami',
                'image_path' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&h=600&fit=crop',
                'type' => 'program',
                'photo_date' => Carbon::now()->subDays(2),
                'is_featured' => true,
                'display_order' => 13,
            ],
            [
                'title' => 'Persiapan Program Wisata',
                'description' => 'Tim kami sedang mempersiapkan segala kebutuhan untuk program wisata',
                'image_path' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=600&fit=crop',
                'type' => 'program',
                'photo_date' => Carbon::now()->subDays(6),
                'is_featured' => false,
                'display_order' => 14,
            ],
            [
                'title' => 'Training Guide Wisata',
                'description' => 'Sesi pelatihan untuk para guide wisata agar memberikan pelayanan terbaik',
                'image_path' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=800&h=600&fit=crop',
                'type' => 'program',
                'photo_date' => Carbon::now()->subDays(14),
                'is_featured' => false,
                'display_order' => 15,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
