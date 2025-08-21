# Views Structure Documentation

## Struktur Folder Views

```
resources/views/
├── components/
│   ├── layouts/
│   │   └── app.blade.php              # Layout utama aplikasi
│   └── partials/
│       ├── navbar.blade.php           # Komponen navigasi
│       └── footer.blade.php           # Komponen footer
├── pages/
│   ├── home/
│   │   └── index.blade.php            # Halaman beranda utama
│   ├── about/
│   │   └── index.blade.php            # Halaman tentang organisasi
│   ├── activities/
│   │   └── index.blade.php            # Halaman program & kegiatan
│   ├── news/
│   │   ├── index.blade.php            # Daftar berita
│   │   ├── detail.blade.php           # Detail artikel berita
│   │   ├── category.blade.php         # Halaman kategori berita
│   │   └── tag.blade.php              # Halaman tag berita
│   ├── health/
│   │   └── malaria.blade.php          # Halaman edukasi malaria
│   └── contact/
│       └── index.blade.php            # Halaman kontak
└── welcome.blade.php                  # Default Laravel welcome page
```

## Penjelasan Struktur

### 📁 **components/**
Berisi komponen-komponen yang dapat digunakan kembali di seluruh aplikasi.

- **layouts/**: Layout utama untuk wrapping semua halaman
- **partials/**: Komponen-komponen kecil seperti navbar, footer, dll

### 📁 **pages/**
Berisi semua halaman utama yang dapat diakses user, diorganisir berdasarkan fitur.

#### 🏠 **home/**
- `index.blade.php`: Halaman beranda dengan hero section, program unggulan, statistik, dan CTA

#### ℹ️ **about/**  
- `index.blade.php`: Informasi tentang POKDARWIS, visi misi, tim, dan sejarah

#### 🎯 **activities/**
- `index.blade.php`: Daftar program dan kegiatan konservasi yang dilakukan

#### 📰 **news/**
- `index.blade.php`: Daftar semua berita dan artikel
- `detail.blade.php`: Halaman detail artikel individual
- `category.blade.php`: Halaman berita berdasarkan kategori
- `tag.blade.php`: Halaman berita berdasarkan tag

#### 🏥 **health/**
- `malaria.blade.php`: Halaman edukasi pencegahan dan penanganan malaria

#### 📞 **contact/**
- `index.blade.php`: Form kontak dan informasi komunikasi

## Routing Mapping

```php
// Home
Route::get('/')                     -> pages.home.index
Route::get('/tentang')              -> pages.about.index
Route::get('/kegiatan')             -> pages.activities.index

// News & Content
Route::get('/berita')               -> pages.news.index
Route::get('/berita/{slug}')        -> pages.news.detail
Route::get('/kategori/{slug}')      -> pages.news.category
Route::get('/tag/{slug}')           -> pages.news.tag

// Health & Contact
Route::get('/edukasi-malaria')      -> pages.health.malaria
Route::get('/kontak')               -> pages.contact.index
```

## Konvensi Penamaan

1. **Folder**: Menggunakan kebab-case (lowercase dengan dash)
2. **File**: Menggunakan kebab-case untuk multi-word, `index.blade.php` untuk halaman utama
3. **Layout**: Semua halaman menggunakan `<x-layouts.app>`
4. **Route Names**: Menggunakan dot notation yang sesuai dengan struktur folder

## Keuntungan Struktur Ini

✅ **Maintainable**: Mudah mencari dan mengedit file berdasarkan fitur  
✅ **Scalable**: Mudah menambah halaman baru tanpa mengacaukan struktur  
✅ **Organized**: Pengelompokan logis berdasarkan functionality  
✅ **Consistent**: Pola penamaan yang konsisten di seluruh aplikasi  
✅ **Reusable**: Komponen dapat digunakan kembali dengan mudah

## Panduan Pengembangan

### Menambah Halaman Baru
1. Buat folder di `pages/` sesuai kategori fitur
2. Buat file `index.blade.php` untuk halaman utama kategori
3. Update routes di `routes/web.php`
4. Gunakan layout `<x-layouts.app>` dengan title yang sesuai

### Menambah Komponen Baru
1. Buat file di `components/partials/`
2. Gunakan penamaan yang deskriptif
3. Pastikan komponen reusable dan tidak terikat dengan satu halaman

### Best Practices
- Selalu gunakan layout utama `<x-layouts.app>`
- Berikan title yang spesifik untuk setiap halaman
- Pisahkan logic PHP yang kompleks ke Controller jika diperlukan
- Gunakan konsistensi dalam penulisan class CSS Tailwind
