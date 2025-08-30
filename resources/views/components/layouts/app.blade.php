@props(['title' => 'Pokdarwis'])
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - Komunitas Laut</title>
    <meta name="description" content="Pokdarwis - Komunitas sadar wisata dan pelestari ekosistem laut." />
    <link rel="icon" type="image/svg+xml" href="/images/logo.svg" />
    
    <!-- SEO Meta Tags -->
    @if(isset($meta))
        @foreach($meta as $property => $content)
            <meta property="{{ $property }}" content="{{ $content }}" />
        @endforeach
    @endif

    @stack('styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Dark Mode Script (inline to prevent flash) -->
    <script>
        (function() {
            // Check user preference first, then system preference
            const savedTheme = localStorage.getItem('darkMode');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            // Apply dark mode if:
            // 1. User explicitly chose dark mode, OR
            // 2. No user preference set AND system prefers dark
            if (savedTheme === 'true' || (savedTheme === null && prefersDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            
            // Debug untuk memastikan dark mode terdeteksi
            console.log('Dark mode status:', {
                savedTheme,
                prefersDark,
                isDarkActive: document.documentElement.classList.contains('dark')
            });
        })();
    </script>
</head>
<body class="antialiased bg-sky-50 text-slate-700 font-sans selection:bg-sky-200/60 dark:bg-slate-900 dark:text-slate-200">
    <x-partials.navbar />
    <main class="min-h-[70vh]">{{ $slot }}</main>
    <x-partials.footer />
</body>
</html>
