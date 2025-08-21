<x-layouts.app title="Tag: {{ ucfirst(str_replace('-', ' ', $slug)) }} - Pokdarwis">
    
    {{-- Header Section --}}
    <section class="relative py-20 bg-gradient-to-br from-sky-50 to-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-sky-500/5 to-transparent"></div>
        <div class="absolute top-10 right-10 w-64 h-64 bg-sky-100 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-10 left-10 w-80 h-80 bg-sky-200 rounded-full blur-3xl opacity-20"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="mb-8" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-slate-500 hover:text-sky-600 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li>
                        <a href="{{ route('news') }}" class="text-slate-500 hover:text-sky-600 transition-colors">Berita</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li>
                        <span class="text-slate-700 font-medium">Tag</span>
                    </li>
                </ol>
            </nav>

            <div class="text-center">
                <div class="inline-flex items-center gap-2 bg-sky-100 text-sky-700 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Tag
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-slate-800 mb-6">
                    #{{ str_replace('-', ' ', $slug) }}
                </h1>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    @if($slug === 'terumbu-karang')
                        Artikel dan berita seputar terumbu karang, konservasi, dan pemulihan ekosistem
                    @elseif($slug === 'konservasi')
                        Informasi terkini tentang upaya konservasi dan pelestarian lingkungan laut
                    @elseif($slug === 'edukasi')
                        Materi edukatif dan pembelajaran tentang ekosistem bahari
                    @elseif($slug === 'penelitian')
                        Hasil penelitian dan studi ilmiah tentang kehidupan laut
                    @elseif($slug === 'komunitas')
                        Cerita dan aktivitas dari komunitas Pokdarwis dan masyarakat
                    @else
                        Kumpulan artikel dengan tag {{ str_replace('-', ' ', $slug) }}
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Articles Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Filter and Stats --}}
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-12">
                <div class="flex items-center gap-4">
                    <span class="text-slate-600">Urutkan:</span>
                    <select class="border border-slate-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent">
                        <option>Terbaru</option>
                        <option>Terpopuler</option>
                        <option>Terlama</option>
                    </select>
                </div>
                <div class="text-slate-600">
                    Ditemukan <span class="font-semibold">8</span> artikel dengan tag ini
                </div>
            </div>

            {{-- Articles List --}}
            <div class="space-y-8 mb-12">
                @php
                    $taggedArticles = [
                        [
                            'title' => 'Program Transplantasi Terumbu Karang Mencapai Target',
                            'excerpt' => 'Kegiatan transplantasi terumbu karang yang dilaksanakan selama 6 bulan berhasil mencapai target 200 fragmen dengan tingkat survival rate mencapai 85%. Program ini melibatkan 20 penyelam terlatih dan menggunakan teknik fragmentation.',
                            'image' => 'https://images.unsplash.com/photo-1583212292454-1fe6229603b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '15 Januari 2024',
                            'slug' => 'program-transplantasi-terumbu-karang-mencapai-target',
                            'category' => 'Konservasi',
                            'readTime' => '5 menit baca',
                            'tags' => ['Konservasi', 'Terumbu Karang', 'Transplantasi']
                        ],
                        [
                            'title' => 'Penelitian Dampak Perubahan Iklim Terhadap Terumbu Karang',
                            'excerpt' => 'Studi terbaru menunjukkan bahwa peningkatan suhu air laut sebesar 1°C dapat menyebabkan bleaching pada 30% terumbu karang. Tim peneliti melakukan monitoring selama 18 bulan untuk mengumpulkan data komprehensif.',
                            'image' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '12 Januari 2024',
                            'slug' => 'penelitian-dampak-perubahan-iklim-terumbu-karang',
                            'category' => 'Penelitian',
                            'readTime' => '7 menit baca',
                            'tags' => ['Penelitian', 'Terumbu Karang', 'Perubahan Iklim']
                        ],
                        [
                            'title' => 'Teknik Restorasi Terumbu Karang dengan Metode Biorock',
                            'excerpt' => 'Inovasi terbaru dalam restorasi terumbu karang menggunakan struktur biorock yang dapat mempercepat pertumbuhan karang hingga 5 kali lipat. Teknologi ini memanfaatkan arus listrik rendah untuk menstimulasi pertumbuhan.',
                            'image' => 'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '10 Januari 2024',
                            'slug' => 'teknik-restorasi-terumbu-karang-metode-biorock',
                            'category' => 'Konservasi',
                            'readTime' => '6 menit baca',
                            'tags' => ['Konservasi', 'Terumbu Karang', 'Teknologi']
                        ],
                        [
                            'title' => 'Peran Terumbu Karang dalam Ekonomi Masyarakat Pesisir',
                            'excerpt' => 'Terumbu karang yang sehat dapat meningkatkan pendapatan masyarakat pesisir hingga 40% melalui sektor pariwisata dan perikanan. Penelitian ekonomi ini mengkaji dampak konservasi terhadap kesejahteraan masyarakat.',
                            'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '8 Januari 2024',
                            'slug' => 'peran-terumbu-karang-ekonomi-masyarakat-pesisir',
                            'category' => 'Komunitas',
                            'readTime' => '8 menit baca',
                            'tags' => ['Komunitas', 'Terumbu Karang', 'Ekonomi']
                        ]
                    ];
                @endphp

                @foreach($taggedArticles as $index => $article)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div class="grid lg:grid-cols-3 gap-0">
                            <div class="relative overflow-hidden {{ $index % 2 === 0 ? 'lg:order-1' : 'lg:order-2' }}">
                                <img src="{{ $article['image'] }}" 
                                     alt="{{ $article['title'] }}" 
                                     class="w-full h-64 lg:h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/20 to-transparent"></div>
                                <div class="absolute top-4 left-4">
                                    <span class="bg-sky-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                        {{ $article['category'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="lg:col-span-2 p-8 {{ $index % 2 === 0 ? 'lg:order-2' : 'lg:order-1' }}">
                                <div class="flex items-center gap-4 text-sm text-slate-500 mb-4">
                                    <span>{{ $article['date'] }}</span>
                                    <span>•</span>
                                    <span>{{ $article['readTime'] }}</span>
                                </div>
                                
                                <h3 class="text-2xl lg:text-3xl font-bold text-slate-800 mb-4 leading-tight group-hover:text-sky-600 transition-colors">
                                    <a href="{{ route('news.detail', $article['slug']) }}">{{ $article['title'] }}</a>
                                </h3>
                                
                                <p class="text-slate-600 mb-6 leading-relaxed text-lg">
                                    {{ $article['excerpt'] }}
                                </p>
                                
                                <div class="flex flex-wrap gap-2 mb-6">
                                    @foreach($article['tags'] as $tag)
                                        <a href="{{ route('tag', str_replace(' ', '-', strtolower($tag))) }}" 
                                           class="px-3 py-1 {{ $tag === str_replace('-', ' ', $slug) ? 'bg-sky-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }} text-sm rounded-full transition-colors">
                                            #{{ strtolower($tag) }}
                                        </a>
                                    @endforeach
                                </div>
                                
                                <a href="{{ route('news.detail', $article['slug']) }}" 
                                   class="inline-flex items-center gap-2 text-sky-600 hover:text-sky-700 font-semibold group-hover:gap-3 transition-all">
                                    Baca Artikel Lengkap
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">
                <nav class="flex items-center gap-2">
                    <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-500 hover:bg-slate-50 transition-colors" disabled>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button class="px-4 py-2 bg-sky-600 text-white rounded-lg font-medium">1</button>
                    <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-700 hover:bg-slate-50 transition-colors">2</button>
                    <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-700 hover:bg-slate-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </section>

    {{-- Related Tags --}}
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-slate-800 text-center mb-12">
                Tag Terkait
            </h2>
            
            <div class="flex flex-wrap justify-center gap-4">
                @php
                    $relatedTags = [
                        ['name' => 'Konservasi', 'count' => 15],
                        ['name' => 'Edukasi', 'count' => 12],
                        ['name' => 'Transplantasi', 'count' => 8],
                        ['name' => 'Penelitian', 'count' => 10],
                        ['name' => 'Komunitas', 'count' => 14],
                        ['name' => 'Teknologi', 'count' => 6],
                        ['name' => 'Ekonomi', 'count' => 7],
                        ['name' => 'Perubahan Iklim', 'count' => 9],
                        ['name' => 'Biodiversitas', 'count' => 11],
                        ['name' => 'Pariwisata', 'count' => 5]
                    ];
                @endphp
                
                @foreach($relatedTags as $tag)
                    @if(strtolower($tag['name']) !== str_replace('-', ' ', $slug))
                        <a href="{{ route('tag', str_replace(' ', '-', strtolower($tag['name']))) }}" 
                           class="group flex items-center gap-2 bg-white hover:bg-sky-50 border border-slate-200 hover:border-sky-300 px-4 py-2 rounded-full transition-all duration-300">
                            <span class="text-slate-700 group-hover:text-sky-700 font-medium">
                                #{{ strtolower($tag['name']) }}
                            </span>
                            <span class="text-xs bg-slate-100 group-hover:bg-sky-100 text-slate-500 group-hover:text-sky-600 px-2 py-1 rounded-full">
                                {{ $tag['count'] }}
                            </span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-sky-600 to-sky-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                Dapatkan Update Terbaru
            </h2>
            <p class="text-xl text-sky-100 mb-8 max-w-3xl mx-auto">
                Ikuti perkembangan terbaru tentang {{ str_replace('-', ' ', $slug) }} dan topik konservasi lainnya
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('news') }}" 
                   class="bg-white text-sky-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-sky-50 transition-colors shadow-lg">
                    Lihat Semua Berita
                </a>
                <a href="{{ route('contact') }}" 
                   class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white/10 transition-colors">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
