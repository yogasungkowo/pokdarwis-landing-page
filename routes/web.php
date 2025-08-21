<?php

use Illuminate\Support\Facades\Route;

// Set locale di setiap route (hindari closure sebagai middleware dalam atribut route)
Route::get('/', function () {
    app()->setLocale(session('locale','id'));
    return view('pages.home.index');
})->name('home');

Route::get('/tentang', function () {
    app()->setLocale(session('locale','id'));
    return view('pages.about.index');
})->name('about');

Route::get('/kegiatan', function () {
    app()->setLocale(session('locale','id'));
    return view('pages.activities.index');
})->name('activities');

Route::get('/edukasi-malaria', function () {
    app()->setLocale(session('locale','id'));
    return view('pages.health.malaria');
})->name('malaria');

Route::get('/berita', function () {
    app()->setLocale(session('locale','id'));
    return view('pages.news.index');
})->name('news');

Route::get('/berita/{slug}', function (string $slug) {
    app()->setLocale(session('locale','id'));
    return view('pages.news.detail', ['slug' => $slug]);
})->name('news.detail');

Route::get('/kategori/{slug}', function (string $slug) {
    app()->setLocale(session('locale','id'));
    return view('pages.news.category', ['slug' => $slug]);
})->name('category');

Route::get('/tag/{slug}', function (string $slug) {
    app()->setLocale(session('locale','id'));
    return view('pages.news.tag', ['slug' => $slug]);
})->name('tag');

Route::get('/kontak', function () {
    app()->setLocale(session('locale','id'));
    return view('pages.contact.index');
})->name('contact');

// Route ganti bahasa
Route::get('/lang/{locale}', function (string $locale) {
    if (! in_array($locale, ['id','en'])) abort(404);
    session(['locale'=>$locale]);
    return back();
})->name('lang.switch');
