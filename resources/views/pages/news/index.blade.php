<x-layouts.app :title="__('Berita & Artikel')">
    <section class="pt-10 pb-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-10">{{ __('Berita & Artikel') }}</h1>
        
        @php
            // Get published articles with relationships
            $articles = \App\Models\Article::with(['category', 'user', 'tags'])
                ->where('is_published', true)
                ->orderByRaw('COALESCE(published_at, created_at) DESC')
                ->paginate(6);
            
            // Get all categories with article counts
            $categories = \App\Models\Category::withArticleCount()->get();
            
            // Get popular tags (tags with most articles)
            $popularTags = \App\Models\Tag::withCount('articles')
                ->having('articles_count', '>', 0)
                ->orderBy('articles_count', 'desc')
                ->take(10)
                ->get();
        @endphp
        
        <div class="grid gap-10 lg:grid-cols-3">
            <div class="lg:col-span-2 space-y-10">
                @forelse($articles as $article)
                    <article class="flex flex-col md:flex-row gap-6 group">
                        <div class="md:w-56 h-40 rounded-xl overflow-hidden ring-1 ring-slate-200 dark:ring-slate-700 flex-shrink-0">
                            <a href="{{ route('news.detail', ['slug' => $article->slug]) }}">
                                <img src="{{ $article->image ? Storage::url($article->image) : 'https://images.unsplash.com/photo-1582740554463-dbbbbdc94043?auto=format&fit=crop&w=600&q=60' }}" 
                                     alt="{{ $article->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-700" />
                            </a>
                        </div>
                        <div class="space-y-3 flex-1">
                            <div class="flex items-center gap-3 text-xs">
                                <span class="font-medium text-blue-600 dark:text-blue-400">
                                    {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : $article->created_at->translatedFormat('d F Y') }}
                                </span>
                                <span class="text-slate-400">•</span>
                                @if($article->category)
                                    <a href="{{ route('category', $article->category->slug) }}" 
                                       class="px-2 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-700 transition-colors">
                                        {{ $article->category->name }}
                                    </a>
                                    <span class="text-slate-400">•</span>
                                @endif
                                <span class="text-slate-500 dark:text-slate-400">
                                    {{ ceil(str_word_count(strip_tags($article->content)) / 200) }} menit baca
                                </span>
                            </div>
                            <h2 class="text-xl font-semibold text-slate-800 dark:text-white group-hover:text-blue-600 transition-colors duration-200">
                                <a href="{{ route('news.detail', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
                            </h2>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content), 150) }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>{{ $article->user->name ?? 'Admin' }}</span>
                                </div>
                                <a href="{{ route('news.detail', ['slug' => $article->slug]) }}" 
                                   class="inline-flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                    Baca selengkapnya 
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="text-center py-12">
                        <div class="text-slate-400 dark:text-slate-500 mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-slate-900 dark:text-white mb-2">Belum ada artikel</h3>
                        <p class="text-slate-500 dark:text-slate-400">Artikel akan ditampilkan setelah dipublikasikan.</p>
                    </div>
                @endforelse
                
                <!-- Pagination -->
                @if($articles->hasPages())
                    <div class="pt-12 space-y-6">
                        <!-- Pagination Info -->
                        <div class="text-center">
                            <p class="text-sm text-slate-600 dark:text-slate-400">
                                Menampilkan <span class="font-semibold text-slate-900 dark:text-white">{{ $articles->firstItem() }}</span> sampai 
                                <span class="font-semibold text-slate-900 dark:text-white">{{ $articles->lastItem() }}</span> dari 
                                <span class="font-semibold text-slate-900 dark:text-white">{{ $articles->total() }}</span> artikel
                            </p>
                        </div>
                        
                        <!-- Pagination Links -->
                        <div class="flex justify-center">
                            {{ $articles->links('components.simple-pagination') }}
                        </div>
                    </div>
                @endif
            </div>
            <aside class="space-y-8">
                <div class="bg-white dark:bg-slate-800 rounded-xl p-6 shadow-lg border border-slate-200 dark:border-slate-700">
                    <h3 class="font-semibold mb-4 text-slate-900 dark:text-white">Kategori Berita</h3>
                    <ul class="space-y-3 text-sm">
                        @forelse($categories as $category)
                            <li class="flex items-center justify-between">
                                <a href="{{ route('category', $category->slug) }}" 
                                   class="hover:text-blue-600 transition-colors duration-200 flex items-center gap-2">
                                    @if($category->color)
                                        <span class="w-3 h-3 rounded-full" style="background-color: {{ $category->color }}"></span>
                                    @endif
                                    {{ $category->name }}
                                </a>
                                <span class="text-xs px-2 py-1 bg-slate-100 dark:bg-slate-700 rounded-full">
                                    {{ $category->articles_count }}
                                </span>
                            </li>
                        @empty
                            <li class="text-slate-500 dark:text-slate-400 text-center py-4">
                                Belum ada kategori
                            </li>
                        @endforelse
                    </ul>
                </div>
                
                <div class="bg-white dark:bg-slate-800 rounded-xl p-6 shadow-lg border border-slate-200 dark:border-slate-700">
                    <h3 class="font-semibold mb-4 text-slate-900 dark:text-white">Tag Populer</h3>
                    <div class="flex flex-wrap gap-2 text-xs">
                        @forelse($popularTags as $tag)
                            <a href="{{ route('tag', $tag->slug) }}" 
                               class="px-3 py-1 rounded-full text-white hover:opacity-80 transition-opacity duration-200"
                               style="background-color: {{ $tag->color ?? '#10B981' }}">
                                #{{ $tag->name }}
                                <span class="ml-1 opacity-75">({{ $tag->articles_count }})</span>
                            </a>
                        @empty
                            <p class="text-slate-500 dark:text-slate-400 text-center py-4 w-full">
                                Belum ada tag
                            </p>
                        @endforelse
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-xl p-6">
                    <h3 class="font-semibold mb-4 text-slate-900 dark:text-white">Newsletter</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">Dapatkan update terbaru tentang program POKDARWIS langsung ke email Anda.</p>
                    <form class="space-y-3" action="#" method="POST">
                        @csrf
                        <input type="email" 
                               name="email" 
                               placeholder="Email Anda" 
                               required
                               class="w-full px-3 py-2 text-sm border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white">
                        <button type="submit" 
                                class="w-full px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            Berlangganan
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </section>
</x-layouts.app>
