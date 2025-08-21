<x-layouts.app :title="__('Edukasi Malaria')">
    <section class="pt-10 pb-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold mb-6 bg-gradient-to-r from-rose-600 to-orange-600 bg-clip-text text-transparent">{{ __('Edukasi Pencegahan Malaria') }}</h1>
            <p class="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
                Program komprehensif pencegahan malaria untuk masyarakat pesisir yang berisiko tinggi
            </p>
        </div>

        <!-- Banner Peringatan -->
        <div class="bg-gradient-to-r from-red-500 to-rose-500 rounded-2xl p-8 text-white mb-16">
            <div class="flex items-center gap-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.232 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-2">Malaria Masih Mengancam</h3>
                    <p class="text-lg opacity-90">Di wilayah pesisir Indonesia, kasus malaria masih terjadi. Pencegahan adalah kunci utama untuk melindungi keluarga Anda.</p>
                </div>
            </div>
        </div>

        <!-- Fakta dan Statistik -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Fakta Malaria di Indonesia</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $stats = [
                        ['number' => '11 Juta', 'label' => 'Penduduk Berisiko', 'desc' => 'Tinggal di daerah endemis'],
                        ['number' => '262,000', 'label' => 'Kasus per Tahun', 'desc' => 'Data tahun 2022'],
                        ['number' => '75%', 'label' => 'Kasus di Indonesia Timur', 'desc' => 'Papua, NTT, Maluku'],
                        ['number' => '100%', 'label' => 'Dapat Dicegah', 'desc' => 'Dengan langkah tepat']
                    ];
                @endphp
                @foreach($stats as $stat)
                    <div class="bg-white dark:bg-slate-800 rounded-xl p-6 shadow-lg text-center border border-slate-200 dark:border-slate-700">
                        <div class="text-3xl font-bold text-rose-600 dark:text-rose-400 mb-2">{{ $stat['number'] }}</div>
                        <div class="font-semibold text-slate-900 dark:text-white mb-1">{{ $stat['label'] }}</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">{{ $stat['desc'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Siklus Penularan -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Bagaimana Malaria Menular?</h2>
            <div class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 rounded-2xl p-8 lg:p-12">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <div class="space-y-4">
                            @php
                                $cycle_steps = [
                                    ['step' => '1', 'title' => 'Gigitan Nyamuk', 'desc' => 'Nyamuk Anopheles yang terinfeksi menggigit manusia pada malam hari'],
                                    ['step' => '2', 'title' => 'Masuk ke Darah', 'desc' => 'Parasit plasmodium masuk ke aliran darah melalui gigitan'],
                                    ['step' => '3', 'title' => 'Berkembang di Hati', 'desc' => 'Parasit berkembang biak di sel-sel hati selama 1-2 minggu'],
                                    ['step' => '4', 'title' => 'Gejala Muncul', 'desc' => 'Demam tinggi, menggigil, sakit kepala, dan berkeringat']
                                ];
                            @endphp
                            @foreach($cycle_steps as $step)
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-10 h-10 bg-rose-600 text-white rounded-full flex items-center justify-center font-bold">{{ $step['step'] }}</div>
                                    <div>
                                        <h4 class="font-semibold text-slate-900 dark:text-white mb-1">{{ $step['title'] }}</h4>
                                        <p class="text-slate-600 dark:text-slate-300">{{ $step['desc'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?auto=format&fit=crop&w=800&q=80" alt="Edukasi Malaria" class="rounded-2xl shadow-xl" />
                        <div class="absolute inset-0 bg-rose-600/10 rounded-2xl"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gejala Malaria -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Kenali Gejala Malaria</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $symptoms = [
                        ['icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1', 'title' => 'Demam Tinggi', 'desc' => 'Suhu tubuh di atas 38°C, bisa naik turun'],
                        ['icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'title' => 'Menggigil', 'desc' => 'Tubuh bergetar tak terkendali saat demam'],
                        ['icon' => 'M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Sakit Kepala', 'desc' => 'Nyeri kepala hebat dan pusing'],
                        ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Lemas', 'desc' => 'Tubuh terasa sangat lemah dan tidak bertenaga'],
                        ['icon' => 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Mual Muntah', 'desc' => 'Perut tidak nyaman dan muntah-muntah'],
                        ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'title' => 'Berkeringat', 'desc' => 'Keringat dingin berlebihan']
                    ];
                @endphp
                @foreach($symptoms as $symptom)
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-12 h-12 bg-rose-100 dark:bg-rose-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-rose-600 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $symptom['icon'] }}"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">{{ $symptom['title'] }}</h3>
                        <p class="text-slate-600 dark:text-slate-300">{{ $symptom['desc'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 p-6 bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 rounded-r-xl">
                <div class="flex items-start gap-3">
                    <svg class="flex-shrink-0 w-6 h-6 text-yellow-600 dark:text-yellow-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.232 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    <div>
                        <h4 class="font-semibold text-yellow-800 dark:text-yellow-200 mb-1">Peringatan Penting!</h4>
                        <p class="text-yellow-700 dark:text-yellow-300">Jika mengalami gejala-gejala di atas, segera periksakan diri ke puskesmas atau rumah sakit terdekat untuk diagnosis dan pengobatan yang tepat.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cara Pencegahan -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center text-slate-900 dark:text-white mb-12">Cara Mencegah Malaria</h2>
            <div class="grid lg:grid-cols-2 gap-8">
                @php
                    $prevention_methods = [
                        [
                            'category' => 'Perlindungan Diri',
                            'color' => 'emerald',
                            'methods' => [
                                'Gunakan kelambu berinsektisida saat tidur',
                                'Pakai baju lengan panjang pada malam hari',
                                'Gunakan obat nyamuk atau repelen',
                                'Hindari keluar rumah saat senja dan malam hari'
                            ]
                        ],
                        [
                            'category' => 'Pengendalian Lingkungan',
                            'color' => 'sky',
                            'methods' => [
                                'Bersihkan genangan air di sekitar rumah',
                                'Tutup rapat tempat penyimpanan air',
                                'Taburkan bubuk abate di bak mandi',
                                'Pasang kawat kasa pada jendela dan ventilasi'
                            ]
                        ]
                    ];
                @endphp
                @foreach($prevention_methods as $category)
                    <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-lg border border-slate-200 dark:border-slate-700">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-{{ $category['color'] }}-100 dark:bg-{{ $category['color'] }}-900 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-{{ $category['color'] }}-600 dark:text-{{ $category['color'] }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $category['category'] }}</h3>
                        </div>
                        <ul class="space-y-3">
                            @foreach($category['methods'] as $method)
                                <li class="flex items-start gap-3">
                                    <svg class="flex-shrink-0 w-5 h-5 text-{{ $category['color'] }}-600 dark:text-{{ $category['color'] }}-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700 dark:text-slate-300">{{ $method }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Program POKDARWIS -->
        <div class="bg-gradient-to-r from-emerald-600 to-blue-600 rounded-2xl p-8 lg:p-12 text-white mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Program Pencegahan Malaria POKDARWIS</h2>
                <p class="text-xl opacity-90">Langkah nyata yang telah kami lakukan untuk melindungi masyarakat pesisir</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $programs = [
                        ['title' => 'Distribusi Kelambu', 'desc' => '500+ kelambu berinsektisida dibagikan gratis ke keluarga berisiko tinggi'],
                        ['title' => 'Penyuluhan Rutin', 'desc' => 'Edukasi mingguan di 15 desa tentang pencegahan dan gejala malaria'],
                        ['title' => 'Pemeriksaan Gratis', 'desc' => 'Rapid test malaria gratis setiap bulan di pos kesehatan desa'],
                        ['title' => 'Pelatihan Kader', 'desc' => '50 kader desa dilatih mengenali gejala dan memberikan pertolongan pertama'],
                        ['title' => 'Monitoring Lingkungan', 'desc' => 'Pemantauan rutin tempat perindukan nyamuk di pemukiman'],
                        ['title' => 'Kemitraan Kesehatan', 'desc' => 'Kolaborasi dengan puskesmas dan rumah sakit untuk rujukan cepat']
                    ];
                @endphp
                @foreach($programs as $program)
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                        <h4 class="font-semibold text-xl mb-3">{{ $program['title'] }}</h4>
                        <p class="text-white/90">{{ $program['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 lg:p-12 shadow-lg">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">Lindungi Keluarga Anda</h2>
                <p class="text-lg text-slate-600 dark:text-slate-300 mb-8 max-w-2xl mx-auto">
                    Jangan tunggu sampai terlambat. Bergabunglah dengan program pencegahan malaria POKDARWIS dan dapatkan perlindungan untuk keluarga Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-rose-600 hover:bg-rose-700 text-white font-semibold rounded-xl transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2v-6a2 2 0 012-2h8z"></path>
                        </svg>
                        Konsultasi Gratis
                    </a>
                    <a href="#" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 font-semibold rounded-xl transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Unduh Panduan
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
