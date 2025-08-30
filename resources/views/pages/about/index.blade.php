<x-layouts.app :title="__('Tentang Kami')">

    <section class="pt-10 pb-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold mb-6 bg-gradient-to-r from-blue-600 to-emerald-600 bg-clip-text text-transparent">
                {{ __('Profil POKDARWIS') }}</h1>
            <p class="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
                Kelompok Sadar Wisata yang berdedikasi untuk pelestarian pantai dan pencegahan malaria
            </p>
        </div>

        <!-- Sejarah Singkat -->
        <div class="mb-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white">Sejarah Singkat</h2>
                    <div class="prose dark:prose-invert max-w-none">
                        <p class="text-lg leading-relaxed">{{ $about->history ?? 'Sejarah organisasi belum tersedia.' }}</p>
                    </div>
                </div>
                <div class="relative">
                    @if ($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="Sejarah POKDARWIS" class="rounded-2xl shadow-2xl" />
                    @else
                        <img src="{{ asset('images/pokdarwis.webp') }}" alt="Sejarah POKDARWIS" class="rounded-2xl shadow-2xl" />
                    @endif
                    <div class="absolute -bottom-6 -right-6 bg-blue-600 text-white p-6 rounded-xl shadow-lg">
                        <div class="text-center">
                            <div class="text-3xl font-bold">{{ $about->year_founded ?? '2020' }}</div>
                            <div class="text-sm">Tahun Berdiri</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">Visi & Misi</h2>
            </div>
            <div class="grid lg:grid-cols-2 gap-12">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 p-8 rounded-2xl">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">VISI</h3>
                    </div>
                    <div class="prose dark:prose-invert max-w-none text-center prose-ol:list-decimal prose-ol:list-inside prose-li:mb-2">
                        {!! $about->vision ?? '<p>Visi organisasi belum tersedia.</p>' !!}
                    </div>
                </div>

                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20 p-8 rounded-2xl">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                        </div>
                        @push('styles')
                            <style>
                                .prose ol {
                                    list-style-type: decimal !important;
                                    padding-left: 1.5rem !important;
                                    margin: 1rem 0 !important;
                                }

                                .prose ol li {
                                    margin-bottom: 0.5rem !important;
                                    padding-left: 0.25rem !important;
                                }

                                .prose ol li::marker {
                                    color: #2563eb !important;
                                    font-weight: 600 !important;
                                }

                                .dark .prose ol li::marker {
                                    color: #60a5fa !important;
                                }
                            </style>
                        @endpush
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">MISI</h3>
                    </div>
                    <div class="prose dark:prose-invert max-w-none prose-ol:list-decimal prose-ol:list-inside prose-li:mb-2">
                        {!! $about->mission ?? '<p>Misi organisasi belum tersedia.</p>' !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi -->
        <div class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">Struktur Organisasi</h2>
                <p class="text-lg text-slate-600 dark:text-slate-300">Tim solid yang berdedikasi untuk kemajuan komunitas</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- @php
                    $struktur = [
                        ['jabatan' => 'Ketua / Koordinator', 'desc' => 'Memimpin dan mengkoordinasi seluruh kegiatan POKDARWIS', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                        ['jabatan' => 'Sekretaris', 'desc' => 'Mengelola administrasi dan dokumentasi kegiatan', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                        ['jabatan' => 'Bendahara', 'desc' => 'Mengelola keuangan dan anggaran program', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['jabatan' => 'Divisi Program', 'desc' => 'Merancang dan melaksanakan program wisata unggulan', 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9c0 1.657-4.03 3-9 3s-9-1.343-9-3m9 9v-9m0-9c-4.97 0-9 1.343-9 3v6c0 1.657 4.03 3 9 3m0-9c4.97 0 9 1.343 9 3v6c0 1.657-4.03 3-9 3'],
                        ['jabatan' => 'Divisi Edukasi', 'desc' => 'Menjalankan program pendidikan dan pelatihan masyarakat', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                        ['jabatan' => 'Divisi Media & Publikasi', 'desc' => 'Mengelola komunikasi dan promosi kegiatan wisata', 'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'],
                    ];
                @endphp --}}
                @foreach ($organization as $o)
                    <div
                        class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $o->icon }}"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">{{ $o->name }}</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-300">{{ $o->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Lokasi & Wilayah Kerja -->
        <div class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 rounded-2xl p-8 lg:p-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white">Lokasi & Wilayah Kerja</h2>
                    <div class="prose dark:prose-invert max-w-none">
                        {{ $about->location_desc ?? 'Deskripsi lokasi belum tersedia.' }}
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-video rounded-xl overflow-hidden shadow-2xl">
                        @if ($about->latitude && $about->longitude)
                            @php
                                $lat = $about->latitude;
                                $lon = $about->longitude;
                                $bbox_w = $lon - 0.01; // West
                                $bbox_s = $lat - 0.01; // South
                                $bbox_e = $lon + 0.01; // East
                                $bbox_n = $lat + 0.01; // North
                                $mapUrl = "https://www.openstreetmap.org/export/embed.html?bbox={$bbox_w}%2C{$bbox_s}%2C{$bbox_e}%2C{$bbox_n}&layer=mapnik&marker={$lat}%2C{$lon}";
                            @endphp
                            <iframe class="w-full h-full" src="{{ $mapUrl }}" allowfullscreen loading="lazy"></iframe>
                        @else
                            <iframe class="w-full h-full"
                                src="https://www.openstreetmap.org/export/embed.html?bbox=110.35%2C-7.82%2C110.38%2C-7.80&amp;layer=mapnik"
                                allowfullscreen loading="lazy"></iframe>
                        @endif
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-white dark:bg-slate-800 p-4 rounded-lg shadow-lg">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-blue-600 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium">Lokasi Sekretariat</span>
                        </div>
                        @if ($about->latitude && $about->longitude)
                            <div class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                                {{ number_format($about->latitude, 6) }}, {{ number_format($about->longitude, 6) }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
