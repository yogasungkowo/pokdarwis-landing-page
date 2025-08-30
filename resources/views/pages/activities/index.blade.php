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
                                @forelse($featuredPrograms as $program)
                    <div class="group bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="aspect-video overflow-hidden">
                            @if($program->featured_image)
                                <img src="{{ asset('storage/' . $program->featured_image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-{{ $program->color_class }}-400 to-{{ $program->color_class }}-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                                    <div class="text-white">
                                        @if($program->icon === 'heroicon-o-sun')
                                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            </svg>
                                        @elseif($program->icon === 'heroicon-o-mountain')
                                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.75 8.5L12 3.75 16.25 8.5H21l-9 12-9-12h4.75z"></path>
                                            </svg>
                                        @elseif($program->icon === 'heroicon-o-building-office')
                                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 21h16.5M4.5 3h15l-.75 18h-13.5L4.5 3zM7.5 6v3M10.5 6v3M13.5 6v3M16.5 6v3"></path>
                                            </svg>
                                        @else
                                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 bg-{{ $program->color_class }}-100 dark:bg-{{ $program->color_class }}-900 rounded-xl flex items-center justify-center">
                                    @if($program->icon === 'heroicon-o-sun')
                                        <svg class="w-6 h-6 text-{{ $program->color_class }}-600 dark:text-{{ $program->color_class }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    @elseif($program->icon === 'heroicon-o-mountain')
                                        <svg class="w-6 h-6 text-{{ $program->color_class }}-600 dark:text-{{ $program->color_class }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.75 8.5L12 3.75 16.25 8.5H21l-9 12-9-12h4.75z"></path>
                                        </svg>
                                    @elseif($program->icon === 'heroicon-o-building-office')
                                        <svg class="w-6 h-6 text-{{ $program->color_class }}-600 dark:text-{{ $program->color_class }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 21h16.5M4.5 3h15l-.75 18h-13.5L4.5 3zM7.5 6v3M10.5 6v3M13.5 6v3M16.5 6v3"></path>
                                        </svg>
                                    @else
                                        <svg class="w-6 h-6 text-{{ $program->color_class }}-600 dark:text-{{ $program->color_class }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">{{ $program->title }}</h3>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">{{ $program->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-slate-500 dark:text-slate-400">Belum ada program unggulan yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Kegiatan Rutin -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Kegiatan Rutin</h2>
            <div class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 rounded-2xl p-8 lg:p-12">
                @if($weeklySchedules->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @php
                            $dayNames = [
                                0 => 'Minggu', 1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 
                                4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu', 7 => 'Minggu'
                            ];
                        @endphp
                        @foreach($weeklySchedules as $dayOfWeek => $schedules)
                            @foreach($schedules as $schedule)
                                <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-md border border-slate-200 dark:border-slate-700">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                                            {{ $dayNames[$dayOfWeek] ?? ($dayOfWeek ? 'Hari ke-' . $dayOfWeek : 'Hari Tidak Diketahui') }}
                                        </h3>
                                        <span class="text-sm bg-emerald-100 dark:bg-emerald-900 text-emerald-800 dark:text-emerald-200 px-3 py-1 rounded-full">
                                            {{ date('H:i', strtotime($schedule->start_time)) }} - {{ date('H:i', strtotime($schedule->end_time)) }}
                                        </span>
                                    </div>
                                    <h4 class="font-semibold text-slate-800 dark:text-slate-200 mb-2">{{ $schedule->activity_name }}</h4>
                                    <p class="text-sm text-slate-600 dark:text-slate-400">{{ $schedule->description }}</p>
                                    @if($schedule->location)
                                        <p class="text-xs text-slate-500 dark:text-slate-500 mt-2">📍 {{ $schedule->location }}</p>
                                    @endif
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-slate-500 dark:text-slate-400">Belum ada jadwal kegiatan rutin yang tersedia.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Aktivitas Terbaru</h2>
            @if($recentActivities->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($recentActivities as $activity)
                        <div class="bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                            @if($activity->featured_image)
                                <div class="aspect-video overflow-hidden">
                                    <img src="{{ asset('storage/' . $activity->featured_image) }}" alt="{{ $activity->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-3">
                                    @if($activity->program)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $activity->program->color_class }}-100 text-{{ $activity->program->color_class }}-800 dark:bg-{{ $activity->program->color_class }}-900 dark:text-{{ $activity->program->color_class }}-200">
                                            {{ $activity->program->title }}
                                        </span>
                                    @endif
                                    @php
                                        $statusColors = [
                                            'upcoming' => 'blue',
                                            'ongoing' => 'emerald',
                                            'completed' => 'slate',
                                            'cancelled' => 'red'
                                        ];
                                        $statusLabels = [
                                            'upcoming' => 'Akan Datang',
                                            'ongoing' => 'Berlangsung',
                                            'completed' => 'Selesai',
                                            'cancelled' => 'Dibatalkan'
                                        ];
                                        $statusColor = $statusColors[$activity->status] ?? 'slate';
                                        $statusLabel = $statusLabels[$activity->status] ?? $activity->status;
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800 dark:bg-{{ $statusColor }}-900 dark:text-{{ $statusColor }}-200">
                                        {{ $statusLabel }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">{{ $activity->title }}</h3>
                                <p class="text-slate-600 dark:text-slate-300 text-sm mb-4 line-clamp-3">{{ $activity->description }}</p>
                                <div class="flex items-center text-sm text-slate-500 dark:text-slate-400">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $activity->start_datetime ? $activity->start_datetime->format('d M Y, H:i') : 'Tanggal belum ditentukan' }}
                                </div>
                                @if($activity->location)
                                    <div class="flex items-center text-sm text-slate-500 dark:text-slate-400 mt-1">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $activity->location }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-slate-500 dark:text-slate-400">Belum ada aktivitas terbaru yang tersedia.</p>
                </div>
            @endif
        </div>

        <!-- Galeri Dokumentasi -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Galeri Dokumentasi</h2>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @forelse($galleryItems as $gallery)
                    <div class="aspect-square overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer group">
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:brightness-110 transition-all duration-300" />
                    </div>
                @empty
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
                @endforelse
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
