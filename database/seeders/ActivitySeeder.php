<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\Program;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = Program::all();

        $activities = [
            [
                'title' => 'Sunrise Photography di Pantai Parangtritis',
                'description' => 'Sesi fotografi sunrise dengan pemandangan indah Pantai Parangtritis. Cocok untuk fotografer pemula hingga profesional.',
                'program_id' => $programs->where('title', 'Wisata Pantai Parangtritis')->first()->id,
                'start_datetime' => Carbon::now()->addDays(7)->setTime(5, 30),
                'end_datetime' => Carbon::now()->addDays(7)->setTime(8, 0),
                'location' => 'Pantai Parangtritis, Bantul',
                'max_participants' => 15,
                'current_participants' => 8,
                'featured_image' => 'activities/parangtritis-sunrise.jpg',
                'status' => 'published',
                'is_recurring' => true,
                'recurring_schedule' => 'Setiap hari Sabtu dan Minggu pukul 05:30',
            ],
            [
                'title' => 'Night Beach Walk & Stargazing',
                'description' => 'Jalan santai di pantai malam hari sambil menikmati bintang-bintang. Termasuk penjelasan tentang rasi bintang.',
                'program_id' => $programs->where('title', 'Wisata Pantai Parangtritis')->first()->id,
                'start_datetime' => Carbon::now()->addDays(5)->setTime(19, 0),
                'end_datetime' => Carbon::now()->addDays(5)->setTime(21, 30),
                'location' => 'Pantai Parangtritis, Bantul',
                'max_participants' => 20,
                'current_participants' => 12,
                'featured_image' => 'activities/beach-stargazing.jpg',
                'status' => 'published',
                'is_recurring' => false,
            ],
            [
                'title' => 'Merapi Sunrise Trekking',
                'description' => 'Pendakian dini hari untuk menyaksikan sunrise spektakuler dari Gunung Merapi. Termasuk sarapan dan pemandu berpengalaman.',
                'program_id' => $programs->where('title', 'Trekking Gunung Merapi')->first()->id,
                'start_datetime' => Carbon::now()->addDays(10)->setTime(2, 0),
                'end_datetime' => Carbon::now()->addDays(10)->setTime(10, 0),
                'location' => 'Selo, Boyolali',
                'max_participants' => 12,
                'current_participants' => 10,
                'featured_image' => 'activities/merapi-sunrise.jpg',
                'status' => 'published',
                'is_recurring' => true,
                'recurring_schedule' => 'Setiap hari Sabtu berangkat pukul 02:00',
            ],
            [
                'title' => 'Lava Tour Merapi',
                'description' => 'Eksplorasi area bekas aliran lava Merapi dengan jeep. Melihat sisa-sisa erupsi dan belajar tentang vulkanologi.',
                'program_id' => $programs->where('title', 'Trekking Gunung Merapi')->first()->id,
                'start_datetime' => Carbon::now()->addDays(3)->setTime(8, 0),
                'end_datetime' => Carbon::now()->addDays(3)->setTime(12, 0),
                'location' => 'Kaliurang, Sleman',
                'max_participants' => 16,
                'current_participants' => 5,
                'featured_image' => 'activities/merapi-lava-tour.jpg',
                'status' => 'published',
                'is_recurring' => false,
            ],
            [
                'title' => 'Royal Palace Cultural Tour',
                'description' => 'Tur mendalam istana Sultan dengan pemandu sejarah. Termasuk pertunjukan tari tradisional dan kunjungan museum.',
                'program_id' => $programs->where('title', 'Wisata Budaya Kraton')->first()->id,
                'start_datetime' => Carbon::now()->addDays(2)->setTime(9, 0),
                'end_datetime' => Carbon::now()->addDays(2)->setTime(12, 0),
                'location' => 'Kraton Yogyakarta',
                'max_participants' => 25,
                'current_participants' => 18,
                'featured_image' => 'activities/kraton-tour.jpg',
                'status' => 'published',
                'is_recurring' => true,
                'recurring_schedule' => 'Setiap hari Selasa dan Kamis pukul 09:00',
            ],
            [
                'title' => 'Traditional Dance Workshop',
                'description' => 'Workshop tari tradisional Jawa dengan penari profesional dari Kraton. Peserta akan belajar gerakan dasar tari Srimpi.',
                'program_id' => $programs->where('title', 'Wisata Budaya Kraton')->first()->id,
                'start_datetime' => Carbon::now()->addDays(8)->setTime(14, 0),
                'end_datetime' => Carbon::now()->addDays(8)->setTime(17, 0),
                'location' => 'Pendopo Kraton Yogyakarta',
                'max_participants' => 15,
                'current_participants' => 3,
                'featured_image' => 'activities/dance-workshop.jpg',
                'status' => 'published',
                'is_recurring' => false,
            ],
            [
                'title' => 'Malioboro Food Walking Tour',
                'description' => 'Jelajahi kuliner khas Yogyakarta di sepanjang Malioboro. Mencicipi 8-10 jenis makanan lokal dengan pemandu kuliner.',
                'program_id' => $programs->where('title', 'Kuliner Malioboro Street Food')->first()->id,
                'start_datetime' => Carbon::now()->addDays(4)->setTime(18, 0),
                'end_datetime' => Carbon::now()->addDays(4)->setTime(21, 0),
                'location' => 'Jalan Malioboro, Yogyakarta',
                'max_participants' => 20,
                'current_participants' => 14,
                'featured_image' => 'activities/malioboro-food-tour.jpg',
                'status' => 'published',
                'is_recurring' => true,
                'recurring_schedule' => 'Setiap hari Jumat dan Sabtu pukul 18:00',
            ],
            [
                'title' => 'Cooking Class: Gudeg Authentic',
                'description' => 'Belajar memasak gudeg asli Yogyakarta dari chef berpengalaman. Termasuk resep rahasia dan teknik memasak tradisional.',
                'program_id' => $programs->where('title', 'Kuliner Malioboro Street Food')->first()->id,
                'start_datetime' => Carbon::now()->addDays(6)->setTime(10, 0),
                'end_datetime' => Carbon::now()->addDays(6)->setTime(14, 0),
                'location' => 'Dapur Tradisional Kotagede',
                'max_participants' => 12,
                'current_participants' => 7,
                'featured_image' => 'activities/gudeg-cooking-class.jpg',
                'status' => 'published',
                'is_recurring' => false,
            ],
            [
                'title' => 'Batik Making Workshop - Beginner',
                'description' => 'Workshop pembuatan batik untuk pemula. Belajar teknik dasar canting, pewarnaan alami, dan finishing.',
                'program_id' => $programs->where('title', 'Workshop Batik Tradisional')->first()->id,
                'start_datetime' => Carbon::now()->addDays(9)->setTime(9, 0),
                'end_datetime' => Carbon::now()->addDays(9)->setTime(15, 0),
                'location' => 'Sanggar Batik Trusmi',
                'max_participants' => 18,
                'current_participants' => 11,
                'featured_image' => 'activities/batik-workshop.jpg',
                'status' => 'published',
                'is_recurring' => true,
                'recurring_schedule' => 'Setiap hari Rabu dan Sabtu pukul 09:00',
            ],
            [
                'title' => 'Advanced Batik Techniques',
                'description' => 'Workshop lanjutan untuk peserta yang sudah menguasai dasar batik. Fokus pada motif kompleks dan pewarnaan gradasi.',
                'program_id' => $programs->where('title', 'Workshop Batik Tradisional')->first()->id,
                'start_datetime' => Carbon::now()->addDays(15)->setTime(10, 0),
                'end_datetime' => Carbon::now()->addDays(15)->setTime(16, 0),
                'location' => 'Sanggar Batik Trusmi',
                'max_participants' => 10,
                'current_participants' => 2,
                'featured_image' => 'activities/advanced-batik.jpg',
                'status' => 'published',
                'is_recurring' => false,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
