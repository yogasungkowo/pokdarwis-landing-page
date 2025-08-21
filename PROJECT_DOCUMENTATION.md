# POKDARWIS Landing Page - Project Documentation

## 📋 Deskripsi Proyek

Website landing page untuk **POKDARWIS** (Kelompok Sadar Wisata) yang berfokus pada konservasi terumbu karang dan pengembangan pariwisata berkelanjutan. Website ini menggunakan Laravel dengan TailwindCSS untuk styling dan Alpine.js untuk interaktivitas.

## 🎯 Fitur Utama

### 🏠 **Halaman Beranda**
- Hero section dengan call-to-action
- Program unggulan dengan grid cards
- Statistik pencapaian organisasi
- Preview berita terbaru
- CTA section untuk engagement

### ℹ️ **Tentang Kami**
- Informasi organisasi POKDARWIS
- Visi, misi, dan tujuan
- Tim dan struktur organisasi
- Sejarah dan pencapaian

### 🎯 **Program & Kegiatan**
- Daftar lengkap program konservasi
- Kegiatan pelestarian terumbu karang
- Program edukasi masyarakat
- Inisiatif pemberdayaan ekonomi

### 📰 **Berita & Artikel**
- Sistem berita lengkap dengan kategori dan tag
- Halaman detail artikel
- Filter berdasarkan kategori dan tag
- Sistem pagination
- Search functionality (ready for implementation)

### 🏥 **Edukasi Kesehatan**
- Halaman edukasi malaria
- Panduan pencegahan dan penanganan
- Informasi kesehatan masyarakat pesisir

### 📞 **Kontak**
- Form kontak interaktif
- Informasi lokasi dan komunikasi
- Integrasi peta (ready for implementation)

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 12**: Framework PHP modern
- **Blade**: Template engine
- **Vite**: Asset bundling

### Frontend
- **TailwindCSS**: Utility-first CSS framework
- **Alpine.js**: Lightweight JavaScript framework
- **Responsive Design**: Mobile-first approach

### Struktur & Organization
- **Component-based**: Reusable Blade components
- **Organized Views**: Structured folder hierarchy
- **Clean Routing**: RESTful URL patterns

## 📁 Struktur Proyek

```
pokdarwis-landing-page/
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   ├── app.js
│   │   └── bootstrap.js
│   └── views/
│       ├── components/
│       │   ├── layouts/
│       │   │   └── app.blade.php
│       │   └── partials/
│       │       ├── navbar.blade.php
│       │       └── footer.blade.php
│       └── pages/
│           ├── home/
│           ├── about/
│           ├── activities/
│           ├── news/
│           ├── health/
│           └── contact/
├── routes/
│   └── web.php
├── public/
├── package.json
├── composer.json
├── tailwind.config.js
└── vite.config.js
```

## 🎨 Design System

### Color Palette
- **Primary**: Sky blue (#0EA5E9) - Representing ocean and marine life
- **Secondary**: Slate gray (#64748B) - For text and subtle elements
- **Accent**: Gradients from sky to blue for visual appeal
- **Background**: White and light sky blue for clean appearance

### Typography
- **Font**: System fonts for optimal performance
- **Hierarchy**: Clear heading structure (h1-h6)
- **Responsive**: Fluid typography scaling

### Components
- **Cards**: Rounded corners with subtle shadows
- **Buttons**: Full rounded buttons with hover effects
- **Forms**: Clean inputs with focus states
- **Navigation**: Responsive navbar with mobile menu

## 🚀 Deployment & Setup

### Requirements
- PHP 8.1+
- Node.js 16+
- Composer

### Installation
```bash
# Clone repository
git clone <repository-url>

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Build assets
npm run build

# Start development server
php artisan serve
```

### Development
```bash
# Watch for changes (TailwindCSS + Vite)
npm run dev

# Production build
npm run build
```

## 📱 Responsiveness

Website dioptimalkan untuk berbagai ukuran layar:
- **Mobile**: 320px - 767px
- **Tablet**: 768px - 1023px  
- **Desktop**: 1024px+

Menggunakan pendekatan mobile-first dengan Tailwind responsive utilities.

## 🔗 Routing Structure

```php
/ (home)                -> pages.home.index
/tentang               -> pages.about.index
/kegiatan              -> pages.activities.index
/berita                -> pages.news.index
/berita/{slug}         -> pages.news.detail
/kategori/{slug}       -> pages.news.category
/tag/{slug}           -> pages.news.tag
/edukasi-malaria      -> pages.health.malaria
/kontak               -> pages.contact.index
/lang/{locale}        -> Language switching
```

## 🌐 Internationalization

- **Default**: Bahasa Indonesia (ID)
- **Secondary**: English (EN)
- **Switching**: Dynamic language switching
- **Ready**: Infrastructure siap untuk multiple languages

## 📈 SEO & Performance

### SEO Ready
- Semantic HTML structure
- Meta titles dan descriptions
- Proper heading hierarchy
- Alt texts untuk images
- Clean URL structure

### Performance
- Optimized images
- Minified CSS/JS
- Component-based architecture
- Efficient asset loading

## 🔄 Content Management

### News System
- **Categories**: Konservasi, Edukasi, Wisata, Kesehatan, Riset, UMKM
- **Tags**: Sistem tagging untuk artikel
- **Slugs**: SEO-friendly URLs
- **Pagination**: Built-in pagination system

### Static Content
- Easy content updates via Blade templates
- Modular component structure
- Reusable content blocks

## 🚀 Future Enhancements

### Phase 2 Features
- [ ] Admin panel untuk content management
- [ ] Database integration untuk dynamic content
- [ ] User authentication system
- [ ] Comment system untuk artikel
- [ ] Newsletter subscription
- [ ] Advanced search functionality
- [ ] Social media integration
- [ ] Google Maps integration
- [ ] Multi-language content management
- [ ] Analytics dashboard

### Technical Improvements
- [ ] Laravel Livewire untuk interaktivitas
- [ ] API development untuk mobile app
- [ ] Caching layer untuk performance
- [ ] Image optimization pipeline
- [ ] Progressive Web App (PWA)
- [ ] Automated testing suite

## 👥 Maintenance & Support

### Code Quality
- Clean, documented code
- Consistent naming conventions
- Modular architecture
- Easy to extend and maintain

### Browser Support
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## 📞 Contact & Support

Untuk pertanyaan teknis atau support, hubungi tim development atau buat issue di repository ini.

---

**POKDARWIS Landing Page** - Melestarikan Laut untuk Masa Depan 🌊
