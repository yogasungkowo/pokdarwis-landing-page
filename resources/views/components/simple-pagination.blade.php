@if ($paginator->hasPages())
    <div class="flex items-center justify-center space-x-1">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 text-sm leading-4 text-slate-400 bg-slate-100 dark:bg-slate-700 rounded-lg cursor-not-allowed">
                ‹ Prev
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" 
               class="px-3 py-2 text-sm leading-4 text-slate-600 dark:text-slate-300 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-lg hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-blue-400 hover:border-blue-300 transition-all duration-200">
                ‹ Prev
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-3 py-2 text-sm leading-4 text-slate-700 dark:text-slate-300">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-2 text-sm leading-4 font-semibold text-white bg-blue-600 rounded-lg">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" 
                           class="px-3 py-2 text-sm leading-4 text-slate-600 dark:text-slate-300 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-lg hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-blue-400 hover:border-blue-300 transition-all duration-200">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" 
               class="px-3 py-2 text-sm leading-4 text-slate-600 dark:text-slate-300 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-lg hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-blue-400 hover:border-blue-300 transition-all duration-200">
                Next ›
            </a>
        @else
            <span class="px-3 py-2 text-sm leading-4 text-slate-400 bg-slate-100 dark:bg-slate-700 rounded-lg cursor-not-allowed">
                Next ›
            </span>
        @endif
    </div>
@endif
