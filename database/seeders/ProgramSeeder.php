<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Wisata Pantai Parangtritis',
                'description' => 'Nikmati keindahan pantai selatan dengan ombak yang menawan dan sunset yang memukau. Pantai Parangtritis adalah salah satu pantai paling terkenal di Yogyakarta dengan pasir hitam vulkanik yang unik.',
                'category' => 'wisata-alam',
                'featured_image' => 'programs/parangtritis.jpg',
                'is_featured' => true,
                'status' => 'active',
                'display_order' => 1,
            ],
            [
                'title' => 'Trekking Gunung Merapi',
                'description' => 'Petualangan mendaki gunung berapi aktif dengan pemandangan spektakuler. Dipandu oleh pemandu berpengalaman dengan peralatan keselamatan lengkap.',
                'category' => 'wisata-alam',
                'featured_image' => 'programs/merapi.jpg',
                'is_featured' => true,
                'status' => 'active',
                'display_order' => 2,
            ],
            [
                'title' => 'Wisata Budaya Kraton',
                'description' => 'Jelajahi istana Sultan dengan sejarah dan budaya Jawa yang kaya. Nikmati arsitektur klasik dan koleksi pusaka kerajaan yang menawan.',
                'category' => 'wisata-budaya',
                'featured_image' => 'programs/kraton.jpg',
                'is_featured' => false,
                'status' => 'active',
                'display_order' => 3,
            ],
            [
                'title' => 'Kuliner Malioboro Street Food',
                'description' => 'Tour kuliner menikmati berbagai makanan khas Yogyakarta di Malioboro. Dari gudeg hingga bakpia, semua ada di sini.',
                'category' => 'wisata-kuliner',
                'featured_image' => 'programs/malioboro.jpg',
                'is_featured' => false,
                'status' => 'active',
                'display_order' => 4,
            ],
            [
                'title' => 'Workshop Batik Tradisional',
                'description' => 'Belajar membuat batik dengan teknik tradisional dari pengrajin berpengalaman. Termasuk sejarah batik dan teknik pewarnaan alami.',
                'category' => 'edukasi',
                'featured_image' => 'programs/batik.jpg',
                'is_featured' => true,
                'status' => 'active',
                'display_order' => 5,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
