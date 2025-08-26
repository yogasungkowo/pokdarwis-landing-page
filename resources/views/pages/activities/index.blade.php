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
                                <img src="{{ Storage::url($program->featured_image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-emerald-400 flex items-center justify-center">
                                    <span class="text-white text-2xl font-bold">{{ substr($program->title, 0, 1) }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 mb-4">
                                @php
                                    $colorClass = $program->color_class ?? 'blue';
                                    
                                    // Mapping warna background dan icon berdasarkan color_class
                                    $colorStyles = [
                                        'blue' => ['bg' => 'bg-blue-100 dark:bg-blue-900', 'icon' => 'text-blue-600 dark:text-blue-400'],
                                        'emerald' => ['bg' => 'bg-emerald-100 dark:bg-emerald-900', 'icon' => 'text-emerald-600 dark:text-emerald-400'],
                                        'sky' => ['bg' => 'bg-sky-100 dark:bg-sky-900', 'icon' => 'text-sky-600 dark:text-sky-400'],
                                        'purple' => ['bg' => 'bg-purple-100 dark:bg-purple-900', 'icon' => 'text-purple-600 dark:text-purple-400'],
                                        'amber' => ['bg' => 'bg-amber-100 dark:bg-amber-900', 'icon' => 'text-amber-600 dark:text-amber-400'],
                                        'red' => ['bg' => 'bg-red-100 dark:bg-red-900', 'icon' => 'text-red-600 dark:text-red-400'],
                                        'pink' => ['bg' => 'bg-pink-100 dark:bg-pink-900', 'icon' => 'text-pink-600 dark:text-pink-400'],
                                    ];
                                    
                                    $bgColor = $colorStyles[$colorClass]['bg'] ?? $colorStyles['blue']['bg'];
                                    $iconColor = $colorStyles[$colorClass]['icon'] ?? $colorStyles['blue']['icon'];
                                @endphp
                                <div class="w-16 h-16 {{ $bgColor }} rounded-xl flex items-center justify-center shadow-sm">
                                    @if($program->custom_svg)
                                        <div class="w-8 h-8 {{ $iconColor }}">
                                            {!! str_replace(['w-6 h-6', 'w-7 h-7', 'class="'], ['w-8 h-8', 'w-8 h-8', 'class="' . $iconColor . ' '], $program->custom_svg) !!}
                                        </div>
                                    @elseif($program->icon)
                                        @php
                                            $iconMap = [
                                                'heroicon-o-camera' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
                                                'heroicon-o-map' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>',
                                                'heroicon-o-sun' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
                                                'heroicon-o-heart' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>',
                                                'heroicon-o-star' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>',
                                                'heroicon-o-fire' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14l4-2c-3.76 1.89-6.121 4.121-6.121 4.121z"></path></svg>',
                                                'heroicon-o-globe-alt' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9V3m0 9l-2-2m2 2l2-2"></path></svg>',
                                                'heroicon-o-mountain' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l6 6 5-5 6 6v13H2V9z"></path></svg>',
                                                'heroicon-o-water' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3 3-3"></path></svg>',
                                                'heroicon-o-tree-pine' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3l-2 6h4l-2-6zm-3 8l-2 6h10l-2-6H9zm3 8v3"></path></svg>',
                                                'heroicon-o-building-office' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                                                'heroicon-o-academic-cap' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14V9.5l-6.16 3.422"></path></svg>',
                                                'heroicon-o-user-group' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
                                                'heroicon-o-cake' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0A2.704 2.704 0 003 15.546V12c0-7.18 5.82-13 13-13s13 5.82 13 13v3.546z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v1a1 1 0 01-1 1h-4a1 1 0 01-1-1v-1z"></path></svg>',
                                                'heroicon-o-scissors' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"></path></svg>',
                                                'heroicon-o-paint-brush' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3V1m8 20V11a8 8 0 00-8-8H5"></path></svg>',
                                                'heroicon-o-sparkles' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>',
                                                'heroicon-o-gift' => '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>',
                                            ];
                                        @endphp
                                        {!! $iconMap[$program->icon] ?? '<svg class="w-8 h-8 ' . $iconColor . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>' !!}
                                    @else
                                        <svg class="w-8 h-8 {{ $iconColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">{{ $program->title }}</h3>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">{{ $program->description }}</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    {{ ucfirst(str_replace('-', ' ', $program->category)) }}
                                </span>
                                <span class="text-xs text-slate-500 dark:text-slate-400">
                                    {{ $program->activities_count ?? 0 }} aktivitas
                                </span>
                            </div>
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
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    @endphp
                    @for($day = 0; $day <= 6; $day++)
                        @if(isset($weeklySchedules[$day]) && $weeklySchedules[$day]->count() > 0)
                            @foreach($weeklySchedules[$day] as $schedule)
                                <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-md border border-slate-200 dark:border-slate-700">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ $days[$day] }}</h3>
                                        <span class="text-sm bg-emerald-100 dark:bg-emerald-900 text-emerald-800 dark:text-emerald-200 px-3 py-1 rounded-full">
                                            {{ date('H:i', strtotime($schedule->start_time)) }} - {{ date('H:i', strtotime($schedule->end_time)) }}
                                        </span>
                                    </div>
                                    <h4 class="font-semibold text-slate-800 dark:text-slate-200 mb-2">{{ $schedule->activity_name }}</h4>
                                    @if($schedule->participants_info)
                                        <p class="text-sm text-slate-600 dark:text-slate-400 mb-2">{{ $schedule->participants_info }}</p>
                                    @endif
                                    @if($schedule->location)
                                        <p class="text-xs text-slate-500 dark:text-slate-500">📍 {{ $schedule->location }}</p>
                                    @endif
                                    @if($schedule->description)
                                        <p class="text-xs text-slate-600 dark:text-slate-400 mt-2">{{ $schedule->description }}</p>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 opacity-50">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ $days[$day] }}</h3>
                                </div>
                                <p class="text-sm text-slate-500 dark:text-slate-400 italic">Tidak ada kegiatan terjadwal</p>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <!-- Kegiatan Terbaru -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Kegiatan Terbaru</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($recentActivities as $activity)
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 group hover:shadow-xl transition-all duration-300">
                        @if($activity->featured_image)
                            <div class="h-48 bg-gradient-to-br from-emerald-400 to-blue-500 rounded-t-xl overflow-hidden">
                                <img src="{{ $activity->featured_image }}" alt="{{ $activity->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-emerald-400 to-blue-500 rounded-t-xl flex items-center justify-center">
                                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm font-medium text-emerald-600 dark:text-emerald-400">
                                    {{ $activity->program->title ?? 'Program Umum' }}
                                </span>
                                <span class="text-xs px-2 py-1 rounded-full
                                    {{ $activity->status === 'upcoming' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : '' }}
                                    {{ $activity->status === 'ongoing' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : '' }}
                                    {{ $activity->status === 'completed' ? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' : '' }}
                                    {{ $activity->status === 'cancelled' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : '' }}">
                                    {{ ucfirst($activity->status) }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">{{ $activity->name }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 line-clamp-3">{{ $activity->description }}</p>
                            <div class="flex items-center justify-between text-sm text-slate-500 dark:text-slate-400">
                                <span>📅 {{ \Carbon\Carbon::parse($activity->start_date)->format('d M Y') }}</span>
                                @if($activity->max_participants)
                                    <span>👥 Max {{ $activity->max_participants }}</span>
                                @endif
                            </div>
                            @if($activity->location)
                                <div class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                                    📍 {{ $activity->location }}
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-slate-400 dark:text-slate-500 mb-4">
                            <svg class="w-24 h-24 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-600 dark:text-slate-400 mb-2">Belum Ada Kegiatan Terbaru</h3>
                        <p class="text-slate-500 dark:text-slate-500">Kegiatan terbaru akan muncul di sini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Galeri Dokumentasi -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Galeri Dokumentasi</h2>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @forelse($galleryItems as $image)
                    <div class="aspect-square overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer group relative">
                        <img src="{{ $image->image_url }}" alt="{{ $image->title }}" class="w-full h-full object-cover group-hover:brightness-110 transition-all duration-300" />
                        @if($image->title)
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 flex items-end p-4">
                                <div class="text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    {{ $image->title }}
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-slate-400 dark:text-slate-500 mb-4">
                            <svg class="w-24 h-24 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-600 dark:text-slate-400 mb-2">Belum Ada Galeri</h3>
                        <p class="text-slate-500 dark:text-slate-500">Galeri dokumentasi akan muncul di sini.</p>
                    </div>
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
