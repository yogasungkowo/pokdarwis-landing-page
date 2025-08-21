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
                    <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-6 py-3 rounded-lg shadow focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-600 dark:focus-visible:ring-offset-slate-900">Kirim Pesan</button>
                </form>
                <div class="pt-4 space-y-3 text-sm">
                    <div><span class="font-medium">Email:</span> <a href="mailto:info@pokdarwis.test" class="text-blue-600">info@pokdarwis.test</a></div>
                    <div><span class="font-medium">WhatsApp:</span> <a href="https://wa.me/6281234567890" class="text-blue-600" target="_blank" rel="noopener">+62 812-3456-7890</a></div>
                    <div class="flex gap-3 items-center">
                        <span class="font-medium">Media Sosial:</span>
                        <a href="#" class="hover:text-blue-600">IG</a>
                        <a href="#" class="hover:text-blue-600">FB</a>
                        <a href="#" class="hover:text-blue-600">YT</a>
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
