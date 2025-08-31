<x-layouts.app :title="'Tag: ' . $tag->name . ' - Pokdarwis'">
    
    {{-- Header Section --}}
    <section class="relative py-20 overflow-hidden"
             style="background: linear-gradient(135deg, {{ $tag->color ?? '#10B981' }}08, transparent, {{ $tag->color ?? '#10B981' }}05);">
        <div class="absolute inset-0 bg-gradient-to-br from-white/80 to-white/60 dark:from-slate-900/80 dark:to-slate-800/60"></div>
        <div class="absolute top-10 right-10 w-64 h-64 rounded-full blur-3xl opacity-30"
             style="background: {{ $tag->color ?? '#10B981' }}20;"></div>
        <div class="absolute bottom-10 left-10 w-80 h-80 rounded-full blur-3xl opacity-20"
             style="background: {{ $tag->color ?? '#10B981' }}15;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="mb-8" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-slate-500 dark:text-slate-400 transition-colors duration-200"
                           style="color: {{ $tag->color ?? '#10B981' }};"
                           onmouseover="this.style.opacity='0.8'"
                           onmouseout="this.style.opacity='1'">
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
                        <a href="{{ route('news') }}" class="text-slate-500 dark:text-slate-400 transition-colors duration-200"
                           style="color: {{ $tag->color ?? '#10B981' }};"
                           onmouseover="this.style.opacity='0.8'"
                           onmouseout="this.style.opacity='1'">Berita</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-slate-400 dark:text-slate-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li>
                        <span class="text-slate-700 dark:text-slate-200 font-medium">#{{ $tag->name }}</span>
                    </li>
                </ol>
            </nav>

            <div class="text-center">
                <!-- Tag Badge dengan styling yang bekerja untuk dark mode -->
                <div class="inline-flex items-center gap-2 px-6 py-3 rounded-full font-medium mb-6 transition-all duration-300 shadow-lg"
                     style="background: linear-gradient(135deg, {{ $tag->color ?? '#10B981' }}15, {{ $tag->color ?? '#10B981' }}25);
                            border: 2px solid {{ $tag->color ?? '#10B981' }}40;
                            color: {{ $tag->color ?? '#10B981' }};">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    #{{ $tag->name }}
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-slate-800 dark:text-white mb-6 leading-tight">
                    Tag: {{ $tag->name }}
                </h1>
                <p class="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed">
                    {{ $tag->description ?: 'Kumpulan artikel yang ditag dengan ' . $tag->name }}
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
                    <select class="border border-slate-300 dark:border-slate-600 rounded-lg px-4 py-2 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-200"
                            style="--tw-ring-color: {{ $tag->color ?? '#10B981' }}40;"
                            onfocus="this.style.borderColor='{{ $tag->color ?? '#10B981' }}'; this.style.boxShadow='0 0 0 3px {{ $tag->color ?? '#10B981' }}20';"
                            onblur="this.style.borderColor=''; this.style.boxShadow='';">
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
                                        <span class="px-3 py-1 text-xs rounded-full text-white font-medium"
                                              style="background-color: {{ $article->category->color ?? '#3B82F6' }}">
                                            {{ $article->category->name }}
                                        </span>
                                    @endif
                                    @foreach($article->tags->take(2) as $articleTag)
                                        <span class="px-3 py-1 text-xs rounded-full font-medium border transition-all duration-200 {{ $articleTag->id === $tag->id ? 'ring-2 ring-offset-2 shadow-lg' : '' }}"
                                              style="background: linear-gradient(135deg, {{ $articleTag->color ?? '#10B981' }}15, {{ $articleTag->color ?? '#10B981' }}25);
                                                     border-color: {{ $articleTag->color ?? '#10B981' }}40;
                                                     color: {{ $articleTag->color ?? '#10B981' }};
                                                     ring-color: {{ $articleTag->color ?? '#10B981' }};">
                                            {{ $articleTag->name }}
                                        </span>
                                    @endforeach
                                </div>
                                <div class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                    {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : $article->created_at->translatedFormat('d F Y') }}
                                </div>
                                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-3 leading-tight transition-colors duration-200"
                                    onmouseover="this.style.color='{{ $tag->color ?? '#10B981' }}'"
                                    onmouseout="this.style.color=''">
                                    <a href="{{ route('news.detail', $article->slug) }}">{{ $article->title }}</a>
                                </h3>
                                <p class="text-slate-600 dark:text-slate-300 mb-4 leading-relaxed">
                                    {{ $article->excerpt ?: Str::limit(strip_tags($article->content), 120) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('news.detail', $article->slug) }}" 
                                       class="font-semibold inline-flex items-center gap-2 group-hover:gap-3 transition-all duration-200"
                                       style="color: {{ $tag->color ?? '#10B981' }};"
                                       onmouseover="this.style.opacity='0.8'"
                                       onmouseout="this.style.opacity='1'">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-4">Belum Ada Artikel</h3>
                    <p class="text-slate-600 dark:text-slate-300 mb-8 max-w-md mx-auto">
                        Saat ini belum ada artikel dengan tag "{{ $tag->name }}". Silakan kembali lagi nanti atau jelajahi tag lainnya.
                    </p>
                    <a href="{{ route('news') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 text-white rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl"
                       style="background: linear-gradient(135deg, {{ $tag->color ?? '#10B981' }}, {{ $tag->color ?? '#10B981' }}CC);"
                       onmouseover="this.style.transform='translateY(-2px)'; this.style.filter='brightness(1.1)'"
                       onmouseout="this.style.transform=''; this.style.filter=''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Berita
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Related Tags --}}
    <section class="py-20 bg-slate-50 dark:bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-slate-800 dark:text-white text-center mb-12">
                Tag Lainnya
            </h2>
            
            @php
                $otherTags = \App\Models\Tag::where('id', '!=', $tag->id)
                    ->withCount('articles')
                    ->orderBy('articles_count', 'desc')
                    ->take(8)
                    ->get();
            @endphp
            
            @if($otherTags->count() > 0)
                <div class="flex flex-wrap justify-center gap-3">
                    @foreach($otherTags as $otherTag)
                        <a href="{{ route('tag', $otherTag->slug) }}" 
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-full font-medium border transition-all duration-200 hover:shadow-lg hover:scale-105"
                           style="background: linear-gradient(135deg, {{ $otherTag->color ?? '#10B981' }}15, {{ $otherTag->color ?? '#10B981' }}25);
                                  border-color: {{ $otherTag->color ?? '#10B981' }}40;
                                  color: {{ $otherTag->color ?? '#10B981' }};">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            #{{ $otherTag->name }}
                            <span class="text-xs opacity-75">({{ $otherTag->articles_count }})</span>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-slate-600 dark:text-slate-300">Tidak ada tag lain yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>

</x-layouts.app>
