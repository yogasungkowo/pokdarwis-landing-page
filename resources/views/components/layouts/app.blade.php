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
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-sky-50 text-slate-700 font-sans selection:bg-sky-200/60 dark:bg-slate-900 dark:text-slate-200">
    <x-partials.navbar />
    <main class="min-h-[70vh]">{{ $slot }}</main>
    <x-partials.footer />
</body>
</html>
