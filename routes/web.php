<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

// News routes with controller
Route::get('/berita', [NewsController::class, 'index'])->name('news');
Route::get('/berita/{slug}', [NewsController::class, 'detail'])->name('news.detail');
Route::get('/kategori/{slug}', [NewsController::class, 'category'])->name('category');
Route::get('/tag/{slug}', [NewsController::class, 'tag'])->name('tag');

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
