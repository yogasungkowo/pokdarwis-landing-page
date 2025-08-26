<x-layouts.app :title="'Kategori: ' . $category->name . ' - Pokdarwis'">
    
    {{-- Header Section --}}
    <section class="relative py-20 bg-gradient-to-br from-sky-50 to-white dark:from-slate-900 dark:to-slate-800 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-sky-500/5 to-transparent dark:from-sky-400/10"></div>
        <div class="absolute top-10 right-10 w-64 h-64 bg-sky-100 dark:bg-sky-900/30 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-10 left-10 w-80 h-80 bg-sky-200 dark:bg-sky-800/30 rounded-full blur-3xl opacity-20"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="mb-8" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-slate-500 dark:text-slate-400 hover:text-sky-600 dark:hover:text-sky-400 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-slate-400 dark:text-slate-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li>
                        <a href="{{ route('news') }}" class="text-slate-500 dark:text-slate-400 hover:text-sky-600 dark:hover:text-sky-400 transition-colors">Berita</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-slate-400 dark:text-slate-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li>
                        <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $category->name }}</span>
                    </li>
                </ol>
            </nav>

            <div class="text-center">
                <!-- Category Badge dengan styling yang bekerja untuk dark mode -->
                <div class="inline-flex items-center gap-3 px-6 py-3 rounded-full font-medium mb-6 transition-all duration-300
                           bg-gradient-to-br from-sky-100 to-sky-200 dark:from-sky-800/30 dark:to-sky-700/30
                           border-2 border-sky-300 dark:border-sky-600
                           text-sky-700 dark:text-sky-300
                           shadow-lg dark:shadow-2xl dark:shadow-sky-500/20">
                    <div class="w-3 h-3 rounded-full shadow-sm bg-sky-600 dark:bg-sky-400"></div>
                    {{ $category->name }}
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-slate-800 dark:text-white mb-6 leading-tight">
                    Kategori: {{ $category->name }}
                </h1>
                <p class="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed">
                    {{ $category->description ?: 'Kumpulan berita dan artikel dalam kategori ' . $category->name }}
                </p>
            </div>
        </div>
    </section>

    {{-- Articles Section --}}
    <section class="py-20 bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Filter and Sort --}}
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-12">
                <div class="flex items-center gap-4">
                    <span class="text-slate-600 dark:text-slate-400">Urutkan:</span>
                    <select class="border border-slate-300 dark:border-slate-600 rounded-lg px-4 py-2 bg-white dark:bg-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent">
                        <option>Terbaru</option>
                        <option>Terpopuler</option>
                        <option>A-Z</option>
                    </select>
                </div>
                <div class="text-slate-600 dark:text-slate-400">
                    Menampilkan <span class="font-semibold text-slate-900 dark:text-white">{{ $articles->count() }}</span> dari {{ $articles->total() }} artikel
                </div>
            </div>

            @if($articles->count() > 0)
                {{-- Articles Grid --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @foreach($articles as $article)
                        <article class="bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group border border-slate-100 dark:border-slate-700">
                            <div class="relative overflow-hidden">
                                <img src="{{ $article->image ? Storage::url($article->image) : 'https://images.unsplash.com/photo-1582740554463-dbbbbdc94043?auto=format&fit=crop&w=800&q=80' }}" 
                                     alt="{{ $article->title }}" 
                                     class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/20 to-transparent"></div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-3">
                                    @if($article->category)
                                        <span class="px-3 py-1 text-xs rounded-full font-medium border transition-all duration-200"
                                              style="background: linear-gradient(135deg, {{ $article->category->color ?? '#3B82F6' }}15, {{ $article->category->color ?? '#3B82F6' }}25);
                                                     border-color: {{ $article->category->color ?? '#3B82F6' }}40;
                                                     color: {{ $article->category->color ?? '#3B82F6' }};">
                                            {{ $article->category->name }}
                                        </span>
                                    @endif
                                    @foreach($article->tags->take(2) as $tag)
                                        <a href="{{ route('tag', $tag->slug) }}" 
                                           class="px-3 py-1 text-xs rounded-full font-medium border transition-all duration-200 hover:shadow-md hover:scale-105"
                                           style="background: linear-gradient(135deg, {{ $tag->color ?? '#10B981' }}15, {{ $tag->color ?? '#10B981' }}25);
                                                  border-color: {{ $tag->color ?? '#10B981' }}40;
                                                  color: {{ $tag->color ?? '#10B981' }};">
                                            {{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                                <div class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                    {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : $article->created_at->translatedFormat('d F Y') }}
                                </div>
                                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-3 leading-tight group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors">
                                    <a href="{{ route('news.detail', $article->slug) }}">{{ $article->title }}</a>
                                </h3>
                                <p class="text-slate-600 dark:text-slate-300 mb-4 leading-relaxed">
                                    {{ $article->excerpt ?: Str::limit(strip_tags($article->content), 120) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('news.detail', $article->slug) }}" 
                                       class="text-sky-600 dark:text-sky-400 hover:text-sky-700 dark:hover:text-sky-300 font-semibold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                                        Baca Selengkapnya 
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <div class="flex items-center gap-1 text-sm text-slate-500 dark:text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        {{ number_format($article->view_count) }}
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="flex justify-center">
                    {{ $articles->links() }}
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-16">
                    <div class="w-32 h-32 bg-slate-100 dark:bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-16 h-16 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-4">Belum Ada Artikel</h3>
                    <p class="text-slate-600 dark:text-slate-300 mb-8 max-w-md mx-auto">
                        Saat ini belum ada artikel dalam kategori "{{ $category->name }}". Silakan kembali lagi nanti atau jelajahi kategori lainnya.
                    </p>
                    <a href="{{ route('news') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-sky-600 dark:bg-sky-500 text-white rounded-lg hover:bg-sky-700 dark:hover:bg-sky-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Berita
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Related Categories --}}
    <section class="py-20 bg-slate-50 dark:bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-slate-800 dark:text-white text-center mb-12">
                Kategori Lainnya
            </h2>
            
            @php
                $otherCategories = \App\Models\Category::where('id', '!=', $category->id)
                    ->withCount('articles')
                    ->orderBy('articles_count', 'desc')
                    ->take(4)
                    ->get();
            @endphp
            
            @if($otherCategories->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($otherCategories as $otherCategory)
                        <a href="{{ route('category', $otherCategory->slug) }}" 
                           class="bg-white dark:bg-slate-700 p-6 rounded-xl hover:shadow-lg transition-all duration-300 group border border-slate-200 dark:border-slate-600">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform border shadow-sm"
                                 style="background: linear-gradient(135deg, {{ $otherCategory->color ?? '#3B82F6' }}15, {{ $otherCategory->color ?? '#3B82F6' }}25);
                                        border-color: {{ $otherCategory->color ?? '#3B82F6' }}30;">
                                <svg class="w-6 h-6" style="color: {{ $otherCategory->color ?? '#3B82F6' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-2 group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors">
                                {{ $otherCategory->name }}
                            </h3>
                            <p class="text-slate-600 dark:text-slate-300 text-sm mb-2">
                                {{ $otherCategory->articles_count }} artikel
                            </p>
                            @if($otherCategory->description)
                                <p class="text-slate-500 dark:text-slate-400 text-xs">
                                    {{ Str::limit($otherCategory->description, 50) }}
                                </p>
                            @endif
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-slate-600 dark:text-slate-300">Tidak ada kategori lain yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>

</x-layouts.app>
