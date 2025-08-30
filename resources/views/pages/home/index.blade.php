<x-layouts.app title="Beranda">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center overflow-hidden">
        <!-- Background dengan foto dari About atau default -->
        <div class="absolute inset-0 -z-10">
            @if($about && $about->image)
                <img src="{{ asset('storage/' . $about->image) }}" alt="Background POKDARWIS" class="w-full h-full object-cover" />
            @else
                <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=1920&q=80" alt="Pantai Merdeka" class="w-full h-full object-cover" />
            @endif
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/80 via-slate-900/60 to-slate-900/40"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-3xl">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6">
                    Bersama Menjaga <span class="text-blue-400">Pantai</span> & <span class="text-emerald-400">Kesehatan Komunitas</span>
                </h1>
                <p class="text-xl text-slate-200 leading-relaxed mb-10 max-w-2xl">
                    POKDARWIS hadir untuk melindungi pantai, mencegah penyakit malaria, dan membangun pariwisata berkelanjutan bagi masyarakat pesisir.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('activities') }}" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-xl transform hover:scale-105 transition-all duration-200">
                        Lihat Kegiatan Kami
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                    </a>
                    <a href="{{ route('malaria') }}" class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-xl transform hover:scale-105 transition-all duration-200">
                        Pelajari Tentang Malaria
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Ringkasan Konten Utama -->
    <section class="py-20 bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-4">Tentang POKDARWIS</h2>
                @if($about && $about->history)
                    <div class="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto prose prose-lg dark:prose-invert">
                        {!! Str::limit(strip_tags($about->history), 200) !!}
                    </div>
                @else
                    <p class="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
                        Kelompok Sadar Wisata yang berfokus pada pelestarian lingkungan pantai dan pencegahan malaria untuk mendukung pariwisata berkelanjutan
                    </p>
                @endif
            </div>
            
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-2">Visi Kami</h3>
                            @if($about && $about->vision)
                                <div class="text-slate-600 dark:text-slate-300 prose prose-slate dark:prose-invert max-w-none [&_ol]:list-decimal [&_ol]:pl-6 [&_ul]:list-disc [&_ul]:pl-6 [&_li]:mb-1">
                                    {!! $about->vision !!}
                                </div>
                            @else
                                <p class="text-slate-600 dark:text-slate-300">Menjadi komunitas rujukan dalam konservasi pantai dan pencegahan malaria berbasis masyarakat pesisir.</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-2">Misi Kami</h3>
                            @if($about && $about->mission)
                                <div class="text-slate-600 dark:text-slate-300 prose prose-slate dark:prose-invert max-w-none [&_ol]:list-decimal [&_ol]:pl-6 [&_ul]:list-disc [&_ul]:pl-6 [&_li]:mb-1">
                                    {!! $about->mission !!}
                                </div>
                            @else
                                <p class="text-slate-600 dark:text-slate-300">Pemberdayaan masyarakat pesisir melalui edukasi lingkungan, pencegahan malaria, dan pengembangan ekowisata.</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="pt-6">
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium">
                            Pelajari lebih lanjut
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="relative">
                    @if($about && $about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="Komunitas POKDARWIS" class="rounded-2xl shadow-2xl" />
                    @else
                        <img src="{{ asset('images/pokdarwis.webp') }}" alt="Komunitas POKDARWIS" class="rounded-2xl shadow-2xl" />
                    @endif
                    <div class="absolute inset-0 rounded-2xl ring-1 ring-black/10"></div>
                </div>
            </div>

            <!-- Kegiatan POKDARWIS -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-4">Kegiatan POKDARWIS</h2>
                <p class="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
                    Program terpadu untuk menjaga kelestarian pantai dan kesehatan masyarakat
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($activity as $act)
                <div class="group">
                    <div class="relative overflow-hidden rounded-2xl mb-6">
                        <img src="{{ asset('storage/' . $act->featured_image) }}" alt="Pelestarian Alam" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-bold">{{ $act->title }}</h3>
                            <p class="text-sm opacity-90">{{ $act->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('activities') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl font-semibold shadow-lg transform hover:scale-105 transition-all duration-200">
                    Lihat Semua Kegiatan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-br from-blue-600 via-blue-500 to-emerald-500 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h2 class="text-4xl font-bold text-white mb-6">
                Mari Bergabung Bersama Kami
            </h2>
            <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                Jadilah bagian dari gerakan pelestarian pantai dan pencegahan malaria. Bersama kita wujudkan komunitas pesisir yang sehat dan berkelanjutan.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold text-lg shadow-xl hover:bg-slate-50 transform hover:scale-105 transition-all duration-200">
                    Hubungi Kami
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </a>
                <a href="{{ route('news') }}" class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-white text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white hover:text-blue-600 transform hover:scale-105 transition-all duration-200">
                    Baca Artikel Terbaru
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
