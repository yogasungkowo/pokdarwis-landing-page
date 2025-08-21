<x-layouts.app title="Kategori: {{ ucfirst(str_replace('-', ' ', $slug)) }} - Pokdarwis">
    
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
                        <span class="text-slate-700 font-medium">Kategori</span>
                    </li>
                </ol>
            </nav>

            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold text-slate-800 mb-6">
                    Kategori: {{ ucfirst(str_replace('-', ' ', $slug)) }}
                </h1>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    @if($slug === 'konservasi')
                        Berita seputar kegiatan konservasi terumbu karang dan pelestarian ekosistem laut
                    @elseif($slug === 'edukasi')
                        Artikel edukatif tentang pentingnya menjaga lingkungan laut dan cara pelestariannya
                    @elseif($slug === 'komunitas')
                        Cerita dan update kegiatan dari komunitas Pokdarwis dan masyarakat pesisir
                    @elseif($slug === 'penelitian')
                        Hasil penelitian dan studi ilmiah terkait ekosistem bahari dan konservasi
                    @else
                        Kumpulan berita dan artikel dalam kategori {{ str_replace('-', ' ', $slug) }}
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Articles Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Filter and Sort --}}
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-12">
                <div class="flex items-center gap-4">
                    <span class="text-slate-600">Urutkan:</span>
                    <select class="border border-slate-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent">
                        <option>Terbaru</option>
                        <option>Terpopuler</option>
                        <option>A-Z</option>
                    </select>
                </div>
                <div class="text-slate-600">
                    Menampilkan <span class="font-semibold">12</span> artikel
                </div>
            </div>

            {{-- Articles Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @php
                    $sampleArticles = [
                        [
                            'title' => 'Program Transplantasi Terumbu Karang Mencapai Target',
                            'excerpt' => 'Kegiatan transplantasi terumbu karang yang dilaksanakan selama 6 bulan berhasil mencapai target 200 fragmen dengan tingkat survival rate 85%.',
                            'image' => 'https://images.unsplash.com/photo-1583212292454-1fe6229603b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '15 Januari 2024',
                            'slug' => 'program-transplantasi-terumbu-karang-mencapai-target',
                            'tags' => ['Konservasi', 'Terumbu Karang']
                        ],
                        [
                            'title' => 'Penelitian Kualitas Air Laut di Kawasan Konservasi',
                            'excerpt' => 'Hasil monitoring kualitas air laut menunjukkan peningkatan signifikan setelah implementasi program konservasi selama 2 tahun.',
                            'image' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '12 Januari 2024',
                            'slug' => 'penelitian-kualitas-air-laut-kawasan-konservasi',
                            'tags' => ['Penelitian', 'Kualitas Air']
                        ],
                        [
                            'title' => 'Workshop Edukasi Lingkungan untuk Anak-anak',
                            'excerpt' => 'Mengadakan workshop edukasi pentingnya menjaga lingkungan laut untuk siswa-siswi sekolah dasar dengan metode pembelajaran interaktif.',
                            'image' => 'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '10 Januari 2024',
                            'slug' => 'workshop-edukasi-lingkungan-anak-anak',
                            'tags' => ['Edukasi', 'Anak-anak']
                        ],
                        [
                            'title' => 'Pelatihan Pemandu Wisata Bahari Berkelanjutan',
                            'excerpt' => 'Program pelatihan untuk meningkatkan keterampilan masyarakat lokal dalam bidang pariwisata bahari yang ramah lingkungan.',
                            'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '8 Januari 2024',
                            'slug' => 'pelatihan-pemandu-wisata-bahari-berkelanjutan',
                            'tags' => ['Komunitas', 'Pelatihan']
                        ],
                        [
                            'title' => 'Inisiatif Pengurangan Sampah Plastik di Pesisir',
                            'excerpt' => 'Kampanye bersih pantai dan edukasi pengurangan sampah plastik berhasil mengumpulkan 500kg sampah dalam sehari.',
                            'image' => 'https://images.unsplash.com/photo-1621451537084-482c73073a0f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '5 Januari 2024',
                            'slug' => 'inisiatif-pengurangan-sampah-plastik-pesisir',
                            'tags' => ['Konservasi', 'Sampah Plastik']
                        ],
                        [
                            'title' => 'Seminar Nasional Konservasi Laut Indonesia',
                            'excerpt' => 'Pokdarwis berpartisipasi dalam seminar nasional dan mempresentasikan best practice konservasi terumbu karang.',
                            'image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'date' => '3 Januari 2024',
                            'slug' => 'seminar-nasional-konservasi-laut-indonesia',
                            'tags' => ['Seminar', 'Nasional']
                        ]
                    ];
                @endphp

                @foreach($sampleArticles as $article)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group border border-slate-100">
                        <div class="relative overflow-hidden">
                            <img src="{{ $article['image'] }}" 
                                 alt="{{ $article['title'] }}" 
                                 class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                @foreach($article['tags'] as $tag)
                                    <a href="{{ route('tag', str_replace(' ', '-', strtolower($tag))) }}" 
                                       class="px-3 py-1 bg-sky-100 text-sky-700 text-xs rounded-full hover:bg-sky-200 transition-colors">
                                        {{ $tag }}
                                    </a>
                                @endforeach
                            </div>
                            <div class="text-sm text-slate-500 mb-2">{{ $article['date'] }}</div>
                            <h3 class="text-xl font-bold text-slate-800 mb-3 leading-tight group-hover:text-sky-600 transition-colors">
                                <a href="{{ route('news.detail', $article['slug']) }}">{{ $article['title'] }}</a>
                            </h3>
                            <p class="text-slate-600 mb-4 leading-relaxed">
                                {{ $article['excerpt'] }}
                            </p>
                            <a href="{{ route('news.detail', $article['slug']) }}" 
                               class="text-sky-600 hover:text-sky-700 font-semibold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                                Baca Selengkapnya 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
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
                    <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-700 hover:bg-slate-50 transition-colors">3</button>
                    <span class="px-2 text-slate-400">...</span>
                    <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-700 hover:bg-slate-50 transition-colors">10</button>
                    <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-700 hover:bg-slate-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </section>

    {{-- Related Categories --}}
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-slate-800 text-center mb-12">
                Kategori Lainnya
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $categories = [
                        ['name' => 'Konservasi', 'slug' => 'konservasi', 'count' => 15, 'color' => 'green'],
                        ['name' => 'Edukasi', 'slug' => 'edukasi', 'count' => 12, 'color' => 'blue'],
                        ['name' => 'Komunitas', 'slug' => 'komunitas', 'count' => 8, 'color' => 'purple'],
                        ['name' => 'Penelitian', 'slug' => 'penelitian', 'count' => 6, 'color' => 'orange']
                    ];
                @endphp
                
                @foreach($categories as $category)
                    @if($category['slug'] !== $slug)
                        <a href="{{ route('category', $category['slug']) }}" 
                           class="bg-white p-6 rounded-xl hover:shadow-lg transition-all duration-300 group border border-slate-200">
                            <div class="w-12 h-12 bg-{{ $category['color'] }}-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-{{ $category['color'] }}-200 transition-colors">
                                <svg class="w-6 h-6 text-{{ $category['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800 mb-2 group-hover:text-{{ $category['color'] }}-600 transition-colors">
                                {{ $category['name'] }}
                            </h3>
                            <p class="text-slate-600 text-sm">
                                {{ $category['count'] }} artikel
                            </p>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.app>
