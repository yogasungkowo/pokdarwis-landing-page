@props(['title' => 'Pokdarwis'])
<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">

    <head>
        <script>
            // Intercept attempts to set data-theme on elements and translate to class-based theme
            (function () {
                try {
                    const orig = Element.prototype.setAttribute;
                    Element.prototype.setAttribute = function (name, value) {
                        if (String(name).toLowerCase() === 'data-theme') {
                            const v = String(value || '').toLowerCase();
                            if (v === 'dark' || v === 'true') document.documentElement.classList.add('dark');
                            else document.documentElement.classList.remove('dark');
                            // don't leave the attribute on the element
                            return this;
                        }
                        return orig.apply(this, arguments);
                    };
                } catch (e) {
                    // ignore if prototype can't be changed
                }
            })();
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }} - Komunitas Laut</title>
        <meta name="description" content="Pokdarwis - Komunitas sadar wisata dan pelestari ekosistem laut." />
        <link rel="icon" type="image/svg+xml" href="/images/logo.svg" />

        <!-- SEO Meta Tags -->
        @if (isset($meta))
            @foreach ($meta as $property => $content)
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

                const shouldBeDark = savedTheme === 'true' || (savedTheme === null && prefersDark);
                
                if (shouldBeDark) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }

                console.log('Dark mode status:', {
                    savedTheme,
                    prefersDark,
                    shouldBeDark,
                    isDarkActive: document.documentElement.classList.contains('dark')
                });
            })();
        </script>
        <!-- Ensure localStorage darkMode exists (so production has persisted preference even before Alpine runs) -->
        <script>
            (function () {
                try {
                    if (localStorage.getItem('darkMode') === null) {
                        const hasClass = document.documentElement.classList.contains('dark');
                        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                        const shouldDark = hasClass || prefersDark;
                        localStorage.setItem('darkMode', shouldDark ? 'true' : 'false');
                    }
                } catch (e) {
                    // ignore
                }
            })();
        </script>

        <!-- Sync any data-theme attribute (from third-party scripts) into class-based theme -->
        <script>
            (function () {
                function syncThemeFromAttr(val) {
                    if (!val) return;
                    const theme = String(val).toLowerCase();
                    if (theme === 'dark' || theme === 'true') {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                    try { document.documentElement.removeAttribute('data-theme'); } catch (e) {}
                }

                // initial sync
                const current = document.documentElement.getAttribute('data-theme');
                if (current) syncThemeFromAttr(current);

                // watch for future changes from vendor scripts and convert immediately
                try {
                    const mo = new MutationObserver(function (mutations) {
                        for (const m of mutations) {
                            if (m.type === 'attributes' && m.attributeName === 'data-theme') {
                                const v = document.documentElement.getAttribute('data-theme');
                                syncThemeFromAttr(v);
                            }
                        }
                    });
                    mo.observe(document.documentElement, { attributes: true });
                } catch (e) {
                    // ignore in old browsers
                }
            })();
        </script>
    </head>

    <body class="antialiased bg-sky-50 text-slate-700 font-sans selection:bg-sky-200/60 dark:bg-slate-900 dark:text-slate-200">
        <x-partials.navbar />
        <main class="min-h-[70vh]">{{ $slot }}</main>
        <x-partials.footer />
    </body>

</html>
