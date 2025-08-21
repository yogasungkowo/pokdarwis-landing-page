@php
    // Data akan dikirim dari controller
    // $article = artikel dari database
    // $relatedArticles = artikel terkait
@endphp

<x-layouts.app :title="$article->meta_title ?: $article->title">
    <!-- Meta Tags untuk SEO -->
    <x-slot name="meta">
        @if($article->meta_description)
            <meta name="description" content="{{ $article->meta_description }}">
        @endif
        @if($article->meta_keywords)
            <meta name="keywords" content="{{ $article->meta_keywords }}">
        @endif
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $article->meta_title ?: $article->title }}">
        <meta property="og:description" content="{{ $article->meta_description ?: $article->excerpt }}">
        <meta property="og:image" content="{{ $article->meta_image ? Storage::url($article->meta_image) : ($article->image ? Storage::url($article->image) : asset('images/default-og.jpg')) }}">
        <meta property="og:url" content="{{ request()->url() }}">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:title" content="{{ $article->meta_title ?: $article->title }}">
        <meta property="twitter:description" content="{{ $article->meta_description ?: $article->excerpt }}">
        <meta property="twitter:image" content="{{ $article->meta_image ? Storage::url($article->meta_image) : ($article->image ? Storage::url($article->image) : asset('images/default-og.jpg')) }}">
    </x-slot>

    <article class="pt-10 pb-20 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-8 text-sm">
            <ol class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a></li>
                <li>/</li>
                <li><a href="{{ route('news') }}" class="hover:text-blue-600">Berita</a></li>
                <li>/</li>
                @if($article->category)
                <li><a href="{{ route('category', $article->category->slug) }}" class="hover:text-blue-600">{{ $article->category->name }}</a></li>
                <li>/</li>
                @endif
                <li class="text-slate-700 dark:text-slate-300">{{ Str::limit($article->title, 50) }}</li>
            </ol>
        </nav>

        <!-- Article Header -->
        <header class="mb-12">
            <div class="flex items-center gap-3 mb-6 text-sm">
                @if($article->category)
                    <a href="{{ route('category', $article->category->slug) }}" 
                       class="px-3 py-1 rounded-full text-white font-medium hover:opacity-80 transition-opacity"
                       style="background-color: {{ $article->category->color ?? '#3B82F6' }}">
                        {{ $article->category->name }}
                    </a>
                    <span class="text-slate-400">•</span>
                @endif
                <time class="text-slate-600 dark:text-slate-400">
                    {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : $article->created_at->translatedFormat('d F Y') }}
                </time>
                <span class="text-slate-400">•</span>
                <span class="text-slate-600 dark:text-slate-400">
                    {{ ceil(str_word_count(strip_tags($article->content)) / 200) }} menit baca
                </span>
                @if($article->is_featured)
                    <span class="text-slate-400">•</span>
                    <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 rounded-full">
                        Featured
                    </span>
                @endif
            </div>
            
            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white leading-tight mb-6">
                {{ $article->title }}
            </h1>
            
            @if($article->excerpt)
                <p class="text-xl text-slate-600 dark:text-slate-400 leading-relaxed mb-6">
                    {{ $article->excerpt }}
                </p>
            @endif
            
            <div class="flex items-center gap-4 text-sm text-slate-600 dark:text-slate-400">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span>{{ $article->user->name ?? 'Admin' }}</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>{{ number_format($article->view_count) }} views</span>
                    </div>
                    <button onclick="shareArticle()" class="flex items-center gap-1 hover:text-blue-600 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                        </svg>
                        Bagikan
                    </button>
                </div>
            </div>

            <!-- Tags -->
            @if($article->tags->count() > 0)
                <div class="mt-6 flex flex-wrap gap-2">
                    @foreach($article->tags as $tag)
                        <a href="{{ route('tag', $tag->slug) }}" 
                           class="px-3 py-1 text-xs rounded-full text-white hover:opacity-80 transition-opacity"
                           style="background-color: {{ $tag->color ?? '#10B981' }}">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </header>

        <!-- Featured Image -->
        @if($article->image)
            <div class="mb-12 rounded-2xl overflow-hidden shadow-2xl">
                <img src="{{ Storage::url($article->image) }}" 
                     alt="{{ $article->title }}" 
                     class="w-full h-96 lg:h-[500px] object-cover">
            </div>
        @endif

        <!-- Article Content -->
        <div class="prose prose-lg dark:prose-invert max-w-none prose-p:mb-6 prose-h2:mb-8 prose-h2:mt-12 prose-h3:mb-6 prose-h3:mt-10 prose-ul:mb-6 prose-ol:mb-6 prose-blockquote:mb-8 prose-img:mb-8 article-content">
            <div class="leading-relaxed space-y-6">
                {!! $article->content !!}
            </div>
        </div>

        <!-- Social Share -->
        <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Bagikan artikel ini:</span>
                    <div class="flex gap-2">
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(request()->url()) }}" 
                           target="_blank"
                           class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                           target="_blank"
                           class="w-10 h-10 bg-blue-800 text-white rounded-full flex items-center justify-center hover:bg-blue-900 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . request()->url()) }}" 
                           target="_blank"
                           class="w-10 h-10 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.085"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <a href="{{ route('news') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Berita
                </a>
            </div>
        </div>

        <!-- Related Articles -->
        @if($relatedArticles->count() > 0)
        <section class="mt-16 pt-12 border-t border-slate-200 dark:border-slate-700">
            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-8">Artikel Terkait</h3>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($relatedArticles as $related)
                    <article class="group">
                        <div class="aspect-video rounded-xl overflow-hidden mb-4">
                            <a href="{{ route('news.detail', ['slug' => $related->slug]) }}">
                                <img src="{{ $related->image ? Storage::url($related->image) : 'https://images.unsplash.com/photo-1582740554463-dbbbbdc94043?auto=format&fit=crop&w=400&q=80' }}" 
                                     alt="{{ $related->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </a>
                        </div>
                        <div class="space-y-2">
                            @if($related->category)
                                <span class="text-xs px-2 py-1 rounded-full text-white" style="background-color: {{ $related->category->color ?? '#3B82F6' }}">
                                    {{ $related->category->name }}
                                </span>
                            @endif
                            <h4 class="font-semibold text-slate-900 dark:text-white group-hover:text-blue-600 transition-colors duration-200">
                                <a href="{{ route('news.detail', ['slug' => $related->slug]) }}">{{ $related->title }}</a>
                            </h4>
                            <p class="text-sm text-slate-600 dark:text-slate-400">
                                {{ Str::limit($related->excerpt ?: strip_tags($related->content), 100) }}
                            </p>
                            <div class="text-xs text-slate-500 dark:text-slate-400">
                                {{ $related->published_at ? $related->published_at->translatedFormat('d F Y') : $related->created_at->translatedFormat('d F Y') }}
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
        @endif
    </article>

    <!-- JavaScript for sharing functionality -->
    <script>
        function shareArticle() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $article->title }}',
                    text: '{{ $article->excerpt ?: Str::limit(strip_tags($article->content), 100) }}',
                    url: window.location.href
                });
            } else {
                // Fallback - copy to clipboard
                navigator.clipboard.writeText(window.location.href).then(function() {
                    alert('Link artikel berhasil disalin!');
                });
            }
        }
    </script>

    <!-- Custom CSS for better content spacing -->
    <style>
        .article-content p {
            margin-bottom: 1.5rem !important;
            line-height: 1.8 !important;
        }
        
        .article-content h1,
        .article-content h2 {
            margin-top: 3rem !important;
            margin-bottom: 1.5rem !important;
        }
        
        .article-content h3,
        .article-content h4 {
            margin-top: 2.5rem !important;
            margin-bottom: 1.25rem !important;
        }
        
        .article-content ul,
        .article-content ol {
            margin-bottom: 1.5rem !important;
        }
        
        .article-content li {
            margin-bottom: 0.5rem !important;
        }
        
        .article-content blockquote {
            margin: 2rem 0 !important;
            padding: 1.5rem !important;
        }
        
        .article-content img {
            margin: 2rem 0 !important;
        }
        
        .article-content figure {
            margin: 2rem 0 !important;
        }
    </style>
</x-layouts.app>
