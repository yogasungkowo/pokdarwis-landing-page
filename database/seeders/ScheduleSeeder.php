<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            // Monday
            [
                'day_of_week' => 1,
                'activity_name' => 'Sunrise Photography Workshop',
                'start_time' => '05:30:00',
                'end_time' => '08:00:00',
                'participants_info' => 'Max 15 peserta',
                'location' => 'Pantai Parangtritis',
                'description' => 'Workshop fotografi sunrise untuk pemula hingga profesional',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'day_of_week' => 1,
                'activity_name' => 'Batik Workshop - Beginner',
                'start_time' => '09:00:00',
                'end_time' => '15:00:00',
                'participants_info' => 'Max 18 peserta',
                'location' => 'Sanggar Batik Trusmi',
                'description' => 'Belajar membuat batik dari dasar dengan teknik canting',
                'is_active' => true,
                'display_order' => 2,
            ],

            // Tuesday
            [
                'day_of_week' => 2,
                'activity_name' => 'Royal Palace Cultural Tour',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'participants_info' => 'Max 25 peserta',
                'location' => 'Kraton Yogyakarta',
                'description' => 'Tur budaya mendalam dengan pemandu sejarah',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'day_of_week' => 2,
                'activity_name' => 'Merapi Lava Tour',
                'start_time' => '08:00:00',
                'end_time' => '12:00:00',
                'participants_info' => 'Max 16 peserta',
                'location' => 'Kaliurang, Sleman',
                'description' => 'Eksplorasi area bekas aliran lava dengan jeep',
                'is_active' => true,
                'display_order' => 2,
            ],

            // Wednesday
            [
                'day_of_week' => 3,
                'activity_name' => 'Batik Workshop - Beginner',
                'start_time' => '09:00:00',
                'end_time' => '15:00:00',
                'participants_info' => 'Max 18 peserta',
                'location' => 'Sanggar Batik Trusmi',
                'description' => 'Belajar membuat batik dari dasar dengan teknik canting',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'day_of_week' => 3,
                'activity_name' => 'Cooking Class: Gudeg Authentic',
                'start_time' => '10:00:00',
                'end_time' => '14:00:00',
                'participants_info' => 'Max 12 peserta',
                'location' => 'Dapur Tradisional Kotagede',
                'description' => 'Belajar memasak gudeg asli dengan chef berpengalaman',
                'is_active' => true,
                'display_order' => 2,
            ],

            // Thursday
            [
                'day_of_week' => 4,
                'activity_name' => 'Royal Palace Cultural Tour',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'participants_info' => 'Max 25 peserta',
                'location' => 'Kraton Yogyakarta',
                'description' => 'Tur budaya mendalam dengan pemandu sejarah',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'day_of_week' => 4,
                'activity_name' => 'Traditional Dance Workshop',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'participants_info' => 'Max 15 peserta',
                'location' => 'Pendopo Kraton',
                'description' => 'Workshop tari Srimpi dengan penari profesional',
                'is_active' => true,
                'display_order' => 2,
            ],

            // Friday
            [
                'day_of_week' => 5,
                'activity_name' => 'Malioboro Food Walking Tour',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'participants_info' => 'Max 20 peserta',
                'location' => 'Jalan Malioboro',
                'description' => 'Jelajahi kuliner khas Yogyakarta dengan pemandu kuliner',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'day_of_week' => 5,
                'activity_name' => 'Night Beach Walk & Stargazing',
                'start_time' => '19:00:00',
                'end_time' => '21:30:00',
                'participants_info' => 'Max 20 peserta',
                'location' => 'Pantai Parangtritis',
                'description' => 'Jalan santai di pantai sambil menikmati bintang',
                'is_active' => true,
                'display_order' => 2,
            ],

            // Saturday
            [
                'day_of_week' => 6,
                'activity_name' => 'Merapi Sunrise Trekking',
                'start_time' => '02:00:00',
                'end_time' => '10:00:00',
                'participants_info' => 'Max 12 peserta',
                'location' => 'Selo, Boyolali',
                'description' => 'Pendakian dini hari untuk sunrise spektakuler',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'day_of_week' => 6,
                'activity_name' => 'Sunrise Photography Workshop',
                'start_time' => '05:30:00',
                'end_time' => '08:00:00',
                'participants_info' => 'Max 15 peserta',
                'location' => 'Pantai Parangtritis',
                'description' => 'Workshop fotografi sunrise untuk pemula hingga profesional',
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'day_of_week' => 6,
                'activity_name' => 'Batik Workshop - Beginner',
                'start_time' => '09:00:00',
                'end_time' => '15:00:00',
                'participants_info' => 'Max 18 peserta',
                'location' => 'Sanggar Batik Trusmi',
                'description' => 'Belajar membuat batik dari dasar dengan teknik canting',
                'is_active' => true,
                'display_order' => 3,
            ],
            [
                'day_of_week' => 6,
                'activity_name' => 'Malioboro Food Walking Tour',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'participants_info' => 'Max 20 peserta',
                'location' => 'Jalan Malioboro',
                'description' => 'Jelajahi kuliner khas Yogyakarta dengan pemandu kuliner',
                'is_active' => true,
                'display_order' => 4,
            ],

            // Sunday
            [
                'day_of_week' => 0,
                'activity_name' => 'Sunrise Photography Workshop',
                'start_time' => '05:30:00',
                'end_time' => '08:00:00',
                'participants_info' => 'Max 15 peserta',
                'location' => 'Pantai Parangtritis',
                'description' => 'Workshop fotografi sunrise untuk pemula hingga profesional',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'day_of_week' => 0,
                'activity_name' => 'Family Beach Day',
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'participants_info' => 'Max 30 peserta',
                'location' => 'Pantai Parangtritis',
                'description' => 'Aktivitas keluarga di pantai dengan berbagai permainan',
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'day_of_week' => 0,
                'activity_name' => 'Advanced Batik Techniques',
                'start_time' => '10:00:00',
                'end_time' => '16:00:00',
                'participants_info' => 'Max 10 peserta',
                'location' => 'Sanggar Batik Trusmi',
                'description' => 'Workshop lanjutan untuk teknik batik kompleks',
                'is_active' => true,
                'display_order' => 3,
            ],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
