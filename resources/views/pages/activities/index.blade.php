<x-layouts.app :title="__('Kegiatan Kami')">
    <section class="pt-10 pb-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold mb-6 bg-gradient-to-r from-emerald-600 to-blue-600 bg-clip-text text-transparent">{{ __('Kegiatan POKDARWIS') }}</h1>
            <p class="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
                Program-program konservasi dan pemberdayaan yang telah mengubah pesisir menjadi lebih lestari dan sehat
            </p>
        </div>

        <!-- Program Unggulan -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Program Unggulan</h2>
            <div class="grid lg:grid-cols-3 gap-8">
                @php
                    $programs = [
                        [
                            'title' => 'Transplantasi Karang',
                            'desc' => 'Restorasi terumbu karang dengan teknik transplantasi untuk memulihkan ekosistem laut yang rusak',
                            'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9c0 1.657-4.03 3-9 3s-9-1.343-9-3m9 9v-9m0-9c-4.97 0-9 1.343-9 3v6c0 1.657 4.03 3-9 3m0-9c4.97 0 9 1.343 9 3v6c0 1.657-4.03 3-9 3',
                            'color' => 'emerald',
                            'image' => 'https://images.unsplash.com/photo-1583212292454-1fe6229603b7?auto=format&fit=crop&w=800&q=80'
                        ],
                        [
                            'title' => 'Pembersihan Pantai',
                            'desc' => 'Aksi bersih pantai rutin melibatkan masyarakat, sekolah, dan relawan untuk menjaga kebersihan pesisir',
                            'icon' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16',
                            'color' => 'sky',
                            'image' => 'https://images.unsplash.com/photo-1618477247222-acbdb0e159b3?auto=format&fit=crop&w=800&q=80'
                        ],
                        [
                            'title' => 'Edukasi Malaria',
                            'desc' => 'Program pencegahan malaria melalui penyuluhan, pembagian kelambu, dan monitoring kesehatan',
                            'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            'color' => 'rose',
                            'image' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?auto=format&fit=crop&w=800&q=80'
                        ]
                    ];
                @endphp
                @foreach($programs as $program)
                    <div class="group bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="aspect-video overflow-hidden">
                            <img src="{{ $program['image'] }}" alt="{{ $program['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 bg-{{ $program['color'] }}-100 dark:bg-{{ $program['color'] }}-900 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-{{ $program['color'] }}-600 dark:text-{{ $program['color'] }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $program['icon'] }}"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">{{ $program['title'] }}</h3>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">{{ $program['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Kegiatan Rutin -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Kegiatan Rutin</h2>
            <div class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 rounded-2xl p-8 lg:p-12">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $kegiatan_rutin = [
                            ['day' => 'Senin', 'activity' => 'Patroli Pantai', 'time' => '06:00 - 08:00', 'participants' => '15-20 relawan'],
                            ['day' => 'Selasa', 'activity' => 'Edukasi Sekolah', 'time' => '09:00 - 11:00', 'participants' => '2-3 sekolah'],
                            ['day' => 'Rabu', 'activity' => 'Pemeriksaan Karang', 'time' => '08:00 - 12:00', 'participants' => 'Tim diving'],
                            ['day' => 'Kamis', 'activity' => 'Pelatihan Masyarakat', 'time' => '14:00 - 16:00', 'participants' => '30-50 peserta'],
                            ['day' => 'Jumat', 'activity' => 'Koordinasi & Evaluasi', 'time' => '10:00 - 12:00', 'participants' => 'Pengurus inti'],
                            ['day' => 'Sabtu', 'activity' => 'Aksi Bersih Besar', 'time' => '07:00 - 10:00', 'participants' => '100+ relawan'],
                        ];
                    @endphp
                    @foreach($kegiatan_rutin as $kegiatan)
                        <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-md border border-slate-200 dark:border-slate-700">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ $kegiatan['day'] }}</h3>
                                <span class="text-sm bg-emerald-100 dark:bg-emerald-900 text-emerald-800 dark:text-emerald-200 px-3 py-1 rounded-full">{{ $kegiatan['time'] }}</span>
                            </div>
                            <h4 class="font-semibold text-slate-800 dark:text-slate-200 mb-2">{{ $kegiatan['activity'] }}</h4>
                            <p class="text-sm text-slate-600 dark:text-slate-400">{{ $kegiatan['participants'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Galeri Dokumentasi -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Galeri Dokumentasi</h2>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @php
                    $gallery_images = [
                        'https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=400&q=80',
                        'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=400&q=80',
                        'https://images.unsplash.com/photo-1583212292454-1fe6229603b7?auto=format&fit=crop&w=400&q=80',
                        'https://images.unsplash.com/photo-1618477247222-acbdb0e159b3?auto=format&fit=crop&w=400&q=80',
                        'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=400&q=80',
                        'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?auto=format&fit=crop&w=400&q=80',
                        'https://images.unsplash.com/photo-1583212292467-632de8dc9cca?auto=format&fit=crop&w=400&q=80',
                        'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=400&q=80',
                    ];
                @endphp
                @foreach($gallery_images as $index => $image)
                    <div class="aspect-square overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer group">
                        <img src="{{ $image }}" alt="Dokumentasi kegiatan {{ $index + 1 }}" class="w-full h-full object-cover group-hover:brightness-110 transition-all duration-300" />
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pencapaian & Statistik -->
        <div class="bg-gradient-to-r from-emerald-600 to-blue-600 rounded-2xl p-8 lg:p-12 text-white">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Pencapaian POKDARWIS</h2>
                <p class="text-xl opacity-90">Data terkini dampak positif program-program kami</p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $achievements = [
                        ['number' => '2,500+', 'label' => 'Pohon Karang Ditanam', 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9'],
                        ['number' => '15 Ton', 'label' => 'Sampah Terangkat', 'icon' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7'],
                        ['number' => '350+', 'label' => 'Keluarga Teredukasi', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857'],
                        ['number' => '25', 'label' => 'Desa Binaan', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1']
                    ];
                @endphp
                @foreach($achievements as $achievement)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $achievement['icon'] }}"></path>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold mb-2">{{ $achievement['number'] }}</div>
                        <div class="text-sm opacity-90">{{ $achievement['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-20 text-center">
            <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 lg:p-12 shadow-lg">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">Bergabung dengan Kegiatan Kami</h2>
                <p class="text-lg text-slate-600 dark:text-slate-300 mb-8 max-w-2xl mx-auto">
                    Jadilah bagian dari perubahan positif untuk lingkungan pesisir dan kesehatan masyarakat. Setiap kontribusi Anda sangat berarti!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2v-6a2 2 0 012-2h8z"></path>
                        </svg>
                        Hubungi Kami
                    </a>
                    <a href="#" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 font-semibold rounded-xl transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Unduh Panduan
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
