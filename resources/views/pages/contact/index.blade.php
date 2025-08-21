<x-layouts.app :title="__('Kontak & Lokasi')">
    <section class="pt-10 pb-20 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-10">{{ __('Kontak & Lokasi') }}</h1>
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="space-y-8">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Hubungi Kami</h2>
                    <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400">Silakan kirim pesan untuk kolaborasi, relawan, atau informasi lebih lanjut.</p>
                </div>
                <form class="space-y-5">
                    <div class="space-y-1">
                        <label class="text-xs font-medium uppercase tracking-wide">Nama</label>
                        <input type="text" class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" />
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-medium uppercase tracking-wide">Email</label>
                        <input type="email" class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" />
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-medium uppercase tracking-wide">Subjek</label>
                        <input type="text" class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" />
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-medium uppercase tracking-wide">Pesan</label>
                        <textarea rows="5" class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                    <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-6 py-3 rounded-lg shadow focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-600 dark:focus-visible:ring-offset-slate-900 transition-all duration-200 hover:scale-105 hover:shadow-lg">Kirim Pesan</button>
                </form>
                <div class="pt-4 space-y-3 text-sm">
                    <div><span class="font-medium">Email:</span> <a href="mailto:info@pokdarwis.test" class="text-blue-600">info@pokdarwis.test</a></div>
                    <div><span class="font-medium">WhatsApp:</span> <a href="https://wa.me/6281234567890" class="text-blue-600" target="_blank" rel="noopener">+62 812-3456-7890</a></div>
                    <div class="flex gap-3 items-center">
                        <span class="font-medium">Media Sosial:</span>
                        <a href="#" class="hover:text-blue-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="hover:text-blue-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="hover:text-blue-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="space-y-8">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Lokasi</h2>
                    <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400 mb-4">Sekretariat Pokdarwis berlokasi di kawasan pesisir Nusantara. Silakan gunakan peta untuk navigasi.</p>
                    <div class="rounded-xl overflow-hidden aspect-video ring-1 ring-slate-200 dark:ring-slate-700">
                        <iframe class="w-full h-full" src="https://www.openstreetmap.org/export/embed.html?bbox=110.35%2C-7.82%2C110.38%2C-7.80&amp;layer=mapnik" allowfullscreen loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
