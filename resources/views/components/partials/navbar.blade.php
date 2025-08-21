<nav x-data="{ open: false, scrolled: false }" 
     x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 10)" 
     :class="scrolled ? 'shadow-md bg-white/90 backdrop-blur dark:bg-slate-800/80' : 'bg-transparent'" 
     class="fixed top-0 inset-x-0 z-50 transition duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group shrink-0">
                <img src="/images/logo.png" alt="Logo Pokdarwis" class="h-10 w-auto" />
                <span class="font-bold text-xl bg-gradient-to-r from-sky-500 via-sky-600 to-sky-700 bg-clip-text text-transparent tracking-wide">Pokdarwis</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-6 font-medium">
                <a href="{{ route('home') }}" 
                   class="hover:text-sky-600 transition-colors duration-200 {{ request()->routeIs('home') ? 'text-sky-600 font-semibold' : '' }}">
                   Beranda
                </a>
                <a href="{{ route('about') }}" 
                   class="hover:text-sky-600 transition-colors duration-200 {{ request()->routeIs('about') ? 'text-sky-600 font-semibold' : '' }}">
                   Tentang
                </a>
                <a href="{{ route('activities') }}" 
                   class="hover:text-sky-600 transition-colors duration-200 {{ request()->routeIs('activities') ? 'text-sky-600 font-semibold' : '' }}">
                   Kegiatan
                </a>
                <a href="{{ route('malaria') }}" 
                   class="hover:text-sky-600 transition-colors duration-200 {{ request()->routeIs('malaria') ? 'text-sky-600 font-semibold' : '' }}">
                   Edukasi Malaria
                </a>
                <a href="{{ route('news') }}" 
                   class="hover:text-sky-600 transition-colors duration-200 {{ request()->routeIs('news') ? 'text-sky-600 font-semibold' : '' }}">
                   Berita
                </a>
                <a href="{{ route('contact') }}" 
                   class="hover:text-sky-600 transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-sky-600 font-semibold' : '' }}">
                   Kontak
                </a>
            </div>
            
            <!-- Desktop Right Menu -->
            <div class="hidden md:flex items-center gap-3">
                <div class="flex items-center gap-1 rounded-full bg-slate-100 dark:bg-slate-700 p-1 text-xs font-medium">
                    @php $loc = app()->getLocale(); @endphp
                    <a href="{{ route('lang.switch', ['locale' => 'id']) }}" 
                       class="px-2 py-1 rounded-full transition-all duration-200 {{ $loc==='id'?'bg-white dark:bg-slate-900 shadow text-sky-600':'' }}">
                       ID
                    </a>
                    <a href="{{ route('lang.switch', ['locale' => 'en']) }}" 
                       class="px-2 py-1 rounded-full transition-all duration-200 {{ $loc==='en'?'bg-white dark:bg-slate-900 shadow text-sky-600':'' }}">
                       EN
                    </a>
                </div>
                <a href="{{ route('activities') }}#pelestarian" 
                   class="inline-flex items-center rounded-full bg-sky-600 text-white px-5 py-2 text-sm shadow hover:bg-sky-700 focus-visible:outline focus-visible:outline-sky-600 transition-colors duration-200">
                   Kegiatan Kami
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <button @click="open = !open" 
                    type="button"
                    class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg hover:bg-sky-100 dark:hover:bg-slate-700 transition-colors duration-200"
                    :aria-expanded="open"
                    aria-label="Toggle menu">
                <svg x-show="!open" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     xmlns="http://www.w3.org/2000/svg" 
                     class="w-6 h-6" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     xmlns="http://www.w3.org/2000/svg" 
                     class="w-6 h-6" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="md:hidden border-t border-slate-200 dark:border-slate-700 bg-white/95 backdrop-blur dark:bg-slate-800/95"
         @click.away="open = false">
        <div class="px-4 py-4 space-y-2">
            <a @click="open = false" 
               href="{{ route('home') }}" 
               class="block py-3 px-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors duration-200 {{ request()->routeIs('home') ? 'text-sky-600 font-semibold bg-sky-50 dark:bg-sky-900/30' : '' }}">
               Beranda
            </a>
            <a @click="open = false" 
               href="{{ route('about') }}" 
               class="block py-3 px-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors duration-200 {{ request()->routeIs('about') ? 'text-sky-600 font-semibold bg-sky-50 dark:bg-sky-900/30' : '' }}">
               Tentang
            </a>
            <a @click="open = false" 
               href="{{ route('activities') }}" 
               class="block py-3 px-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors duration-200 {{ request()->routeIs('activities') ? 'text-sky-600 font-semibold bg-sky-50 dark:bg-sky-900/30' : '' }}">
               Kegiatan
            </a>
            <a @click="open = false" 
               href="{{ route('malaria') }}" 
               class="block py-3 px-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors duration-200 {{ request()->routeIs('malaria') ? 'text-sky-600 font-semibold bg-sky-50 dark:bg-sky-900/30' : '' }}">
               Edukasi Malaria
            </a>
            <a @click="open = false" 
               href="{{ route('news') }}" 
               class="block py-3 px-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors duration-200 {{ request()->routeIs('news') ? 'text-sky-600 font-semibold bg-sky-50 dark:bg-sky-900/30' : '' }}">
               Berita
            </a>
            <a @click="open = false" 
               href="{{ route('contact') }}" 
               class="block py-3 px-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-sky-600 font-semibold bg-sky-50 dark:bg-sky-900/30' : '' }}">
               Kontak
            </a>
            
            <!-- Mobile Language Switcher -->
            <div class="flex gap-2 pt-4 border-t border-slate-200 dark:border-slate-700">
                @php $loc = app()->getLocale(); @endphp
                <a href="{{ route('lang.switch', ['locale' => 'id']) }}" 
                   class="px-3 py-2 rounded-lg text-xs font-medium transition-colors duration-200 {{ $loc==='id' ? 'bg-sky-100 text-sky-700 dark:bg-sky-900/50 dark:text-sky-300' : 'bg-slate-200 dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600' }}">
                   ID
                </a>
                <a href="{{ route('lang.switch', ['locale' => 'en']) }}" 
                   class="px-3 py-2 rounded-lg text-xs font-medium transition-colors duration-200 {{ $loc==='en' ? 'bg-sky-100 text-sky-700 dark:bg-sky-900/50 dark:text-sky-300' : 'bg-slate-200 dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600' }}">
                   EN
                </a>
            </div>
            
            <!-- Mobile CTA Button -->
            <div class="pt-4">
                <a @click="open = false"
                   href="{{ route('activities') }}#pelestarian" 
                   class="block text-center py-3 px-4 rounded-lg bg-sky-600 text-white font-medium hover:bg-sky-700 transition-colors duration-200">
                   Kegiatan Kami
                </a>
            </div>
        </div>
    </div>
</nav>
<div class="h-16"></div>
