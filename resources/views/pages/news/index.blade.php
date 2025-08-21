<x-layouts.app :title="__('Berita & Artikel')">
    <section class="pt-10 pb-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-10">{{ __('Berita & Artikel') }}</h1>
        @php
            $posts = [
                [
                    'slug' => 'transplantasi-karang-sukses-2025',
                    'title' => 'Transplantasi Karang Sukses di Pantai Merdeka',
                    'excerpt' => 'Program transplantasi karang tahap kedua POKDARWIS mencapai tingkat kelangsungan hidup 95%, menunjukkan keberhasilan upaya restorasi ekosistem terumbu karang.',
                    'date' => '2025-08-10',
                    'img' => 'photo-1582740554463-dbbbbdc94043',
                    'category' => 'Konservasi',
                    'author' => 'Tim POKDARWIS',
                    'read_time' => '5 menit'
                ],
                [
                    'slug' => 'pelatihan-pemandu-wisata-bahari-2025',
                    'title' => 'Pelatihan Pemandu Wisata Bahari untuk Generasi Muda',
                    'excerpt' => '20 pemuda desa mengikuti pelatihan intensif interpretasi ekosistem laut dan keterampilan memandu wisata untuk mendukung ekonomi kreatif pesisir.',
                    'date' => '2025-08-05',
                    'img' => 'photo-1508182311256-e3f9a507d4b9',
                    'category' => 'Edukasi',
                    'author' => 'Divisi Edukasi',
                    'read_time' => '7 menit'
                ],
                [
                    'slug' => 'festival-pesisir-nusantara-2025',
                    'title' => 'Festival Pesisir Nusantara Diminati Wisatawan Mancanegara',
                    'excerpt' => 'Festival pesisir tahunan menarik perhatian wisatawan domestik dan mancanegara dengan peningkatan kunjungan 30% dan dukungan penuh terhadap UMKM lokal.',
                    'date' => '2025-07-28',
                    'img' => 'photo-1504600770771-fb03a6961d49',
                    'category' => 'Wisata',
                    'author' => 'Humas POKDARWIS',
                    'read_time' => '6 menit'
                ],
                [
                    'slug' => 'program-pencegahan-malaria-terbaru',
                    'title' => 'Program Pencegahan Malaria Terbaru Sasar 15 Desa Pesisir',
                    'excerpt' => 'POKDARWIS meluncurkan program pencegahan malaria komprehensif dengan distribusi 500 kelambu berinsektisida dan pelatihan kader kesehatan desa.',
                    'date' => '2025-07-15',
                    'img' => 'photo-1559757148-5c350d0d3c56',
                    'category' => 'Kesehatan',
                    'author' => 'Tim Kesehatan',
                    'read_time' => '8 menit'
                ],
                [
                    'slug' => 'riset-mikroplastik-laut-indonesia',
                    'title' => 'Riset Mikroplastik di Perairan Indonesia Timur Mengkhawatirkan',
                    'excerpt' => 'Hasil penelitian kolaboratif POKDARWIS dengan universitas menunjukkan peningkatan konsentrasi mikroplastik yang mengancam kesehatan ekosistem laut.',
                    'date' => '2025-07-08',
                    'img' => 'photo-1583212292467-632de8dc9cca',
                    'category' => 'Riset',
                    'author' => 'Tim Riset',
                    'read_time' => '10 menit'
                ],
                [
                    'slug' => 'sukses-umkm-produk-laut-berkelanjutan',
                    'title' => 'Sukses UMKM Produk Laut Berkelanjutan Binaan POKDARWIS',
                    'excerpt' => 'Pendampingan UMKM produk olahan hasil laut menunjukkan peningkatan omzet hingga 150% dengan prinsip harvesting berkelanjutan.',
                    'date' => '2025-06-25',
                    'img' => 'photo-1559827260-dc66d52bef19',
                    'category' => 'UMKM',
                    'author' => 'Divisi Pemberdayaan',
                    'read_time' => '6 menit'
                ]
            ];
        @endphp
        <div class="grid gap-10 lg:grid-cols-3">
            <div class="lg:col-span-2 space-y-10">
                @foreach($posts as $p)
                    <article class="flex flex-col md:flex-row gap-6 group">
                        <div class="md:w-56 h-40 rounded-xl overflow-hidden ring-1 ring-slate-200 dark:ring-slate-700 flex-shrink-0">
                            <a href="{{ route('news.detail', ['slug' => $p['slug']]) }}">
                                <img src="https://images.unsplash.com/{{$p['img']}}?auto=format&fit=crop&w=600&q=60" alt="{{$p['title']}}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" />
                            </a>
                        </div>
                        <div class="space-y-3 flex-1">
                            <div class="flex items-center gap-3 text-xs">
                                <span class="font-medium text-blue-600 dark:text-blue-400">{{ \Carbon\Carbon::parse($p['date'])->translatedFormat('d F Y') }}</span>
                                <span class="text-slate-400">•</span>
                                <a href="{{ route('category', strtolower($p['category'])) }}" class="px-2 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-700 transition-colors">{{ $p['category'] }}</a>
                                <span class="text-slate-400">•</span>
                                <span class="text-slate-500 dark:text-slate-400">{{ $p['read_time'] }}</span>
                            </div>
                            <h2 class="text-xl font-semibold text-slate-800 dark:text-white group-hover:text-blue-600 transition-colors duration-200">
                                <a href="{{ route('news.detail', ['slug' => $p['slug']]) }}">{{$p['title']}}</a>
                            </h2>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{$p['excerpt']}}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>{{ $p['author'] }}</span>
                                </div>
                                <a href="{{ route('news.detail', ['slug' => $p['slug']]) }}" class="inline-flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                    Baca selengkapnya 
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
                
                <!-- Pagination -->
                <div class="flex justify-center pt-8">
                    <nav class="flex items-center gap-2">
                        <button class="px-3 py-2 text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">← Sebelumnya</button>
                        <button class="px-3 py-2 text-sm bg-blue-600 text-white rounded-lg">1</button>
                        <button class="px-3 py-2 text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">2</button>
                        <button class="px-3 py-2 text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">3</button>
                        <button class="px-3 py-2 text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">Selanjutnya →</button>
                    </nav>
                </div>
            </div>
            <aside class="space-y-8">
                <div class="bg-white dark:bg-slate-800 rounded-xl p-6 shadow-lg border border-slate-200 dark:border-slate-700">
                    <h3 class="font-semibold mb-4 text-slate-900 dark:text-white">Kategori Berita</h3>
                    <ul class="space-y-3 text-sm">
                        @php
                            $categories = ['Konservasi', 'Edukasi', 'Wisata', 'Kesehatan', 'Riset', 'UMKM'];
                            $category_counts = array_count_values(array_column($posts, 'category'));
                        @endphp
                        @foreach($categories as $cat)
                            <li class="flex items-center justify-between">
                                <a href="{{ route('category', strtolower($cat)) }}" class="hover:text-blue-600 transition-colors duration-200">{{ $cat }}</a>
                                <span class="text-xs px-2 py-1 bg-slate-100 dark:bg-slate-700 rounded-full">{{ $category_counts[$cat] ?? 0 }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="bg-white dark:bg-slate-800 rounded-xl p-6 shadow-lg border border-slate-200 dark:border-slate-700">
                    <h3 class="font-semibold mb-4 text-slate-900 dark:text-white">Tag Populer</h3>
                    <div class="flex flex-wrap gap-2 text-xs">
                        @foreach(['terumbu-karang','malaria','ekowisata','festival','riset','umkm','pesisir','konservasi','kesehatan','pendidikan'] as $tag)
                            <a href="{{ route('tag', $tag) }}" class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-700 transition-colors duration-200">#{{ str_replace('-', ' ', $tag) }}</a>
                        @endforeach
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-xl p-6">
                    <h3 class="font-semibold mb-4 text-slate-900 dark:text-white">Newsletter</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">Dapatkan update terbaru tentang program POKDARWIS langsung ke email Anda.</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Email Anda" class="w-full px-3 py-2 text-sm border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white">
                        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">Berlangganan</button>
                    </form>
                </div>
            </aside>
        </div>
    </section>
</x-layouts.app>
