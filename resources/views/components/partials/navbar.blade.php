<nav x-data="{ 
        open: false, 
        scrolled: false,
        darkMode: localStorage.getItem('darkMode') === 'true' || (localStorage.getItem('darkMode') === null && window.matchMedia('(prefers-color-scheme: dark)').matches),
        toggleDarkMode() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('darkMode', this.darkMode.toString());
            
            console.log('Toggling dark mode:', {
                newDarkMode: this.darkMode,
                storedValue: localStorage.getItem('darkMode')
            });
            
            if (this.darkMode) {
                document.documentElement.classList.add('dark');
                document.documentElement.setAttribute('data-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                document.documentElement.setAttribute('data-theme', 'light');
            }
        }
    }" 
     x-init="
        window.addEventListener('scroll', () => scrolled = window.scrollY > 10);
        
        // Sync with current state on mount
        const currentlyDark = document.documentElement.classList.contains('dark');
        darkMode = currentlyDark;
        
        console.log('Navbar initialized with dark mode:', {
            darkMode,
            currentlyDark,
            storedValue: localStorage.getItem('darkMode')
        });
     " 
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
                <!-- Dark Mode Toggle -->
                <button @click="toggleDarkMode()" 
                        type="button"
                        class="inline-flex items-center justify-center w-10 h-10 rounded-lg hover:bg-sky-100 dark:hover:bg-slate-700 transition-colors duration-200"
                        :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
                        aria-label="Toggle Dark Mode">
                    <!-- Sun Icon (Light Mode) -->
                    <svg x-show="darkMode" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-50"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-50"
                         xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5 text-yellow-500" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon Icon (Dark Mode) -->
                    <svg x-show="!darkMode" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-50"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-50"
                         xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5 text-slate-600 dark:text-slate-300" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
                
                <a href="{{ route('activities') }}#pelestarian" 
                   class="inline-flex items-center rounded-full bg-sky-600 text-white px-5 py-2 text-sm shadow hover:bg-sky-700 focus-visible:outline focus-visible:outline-sky-600 transition-colors duration-200">
                   Kegiatan Kami
                </a>
            </div>
            
            <!-- Mobile menu button & Dark mode toggle -->
            <div class="md:hidden flex items-center gap-2">
                <!-- Dark Mode Toggle Mobile (Icon only) -->
                <button @click="toggleDarkMode()" 
                        type="button"
                        class="inline-flex items-center justify-center w-10 h-10 rounded-lg hover:bg-sky-100 dark:hover:bg-slate-700 transition-colors duration-200"
                        :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
                        aria-label="Toggle Dark Mode">
                    <!-- Sun Icon -->
                    <svg x-show="darkMode" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-50"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-50"
                         xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5 text-yellow-500" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon Icon -->
                    <svg x-show="!darkMode" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-50"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-50"
                         xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5 text-slate-600 dark:text-slate-300" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
                
                <!-- Mobile menu hamburger -->
                <button @click="open = !open" 
                        type="button"
                        class="inline-flex items-center justify-center w-10 h-10 rounded-lg hover:bg-sky-100 dark:hover:bg-slate-700 transition-colors duration-200"
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

            <!-- Mobile CTA Button -->
            <div class="pt-4 space-y-3">
                <!-- Dark Mode Toggle Mobile -->
                <button @click="toggleDarkMode()" 
                        type="button"
                        class="flex items-center justify-between w-full py-3 px-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors duration-200"
                        :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
                    <span>Mode Tampilan</span>
                    <div class="flex items-center gap-2">
                        <span x-text="darkMode ? 'Gelap' : 'Terang'" class="text-sm text-slate-500 dark:text-slate-400"></span>
                        <div class="relative">
                            <!-- Sun Icon -->
                            <svg x-show="darkMode" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-50"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-50"
                                 xmlns="http://www.w3.org/2000/svg" 
                                 class="w-5 h-5 text-yellow-500" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <!-- Moon Icon -->
                            <svg x-show="!darkMode" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-50"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-50"
                                 xmlns="http://www.w3.org/2000/svg" 
                                 class="w-5 h-5 text-slate-600 dark:text-slate-300" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </div>
                    </div>
                </button>
                
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
