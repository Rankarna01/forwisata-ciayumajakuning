<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Wisata\WisataController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Kategori\KategoriController; 
use App\Http\Controllers\Slider\SliderController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\LandingController;

// Route untuk pengunjung (Nanti diarahkan ke Landing Page)
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/wisatas', [LandingController::class, 'allWisata'])->name('wisata.all');
Route::get('/events', [LandingController::class, 'allEvent'])->name('event.all');
Route::get('/wisata/{id}', [LandingController::class, 'showWisata'])->name('wisata.show');
Route::get('/event/{id}', [LandingController::class, 'showEvent'])->name('event.show');

// Route Auth (Hanya bisa diakses jika belum login / guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
});

// Route Admin (Hanya bisa diakses jika sudah login)
// Route Admin (Hanya bisa diakses jika sudah login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    
    // Prefix /admin untuk semua route panel
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Wisata (AJAX CRUD)
        Route::get('/wisata/data', [WisataController::class, 'getData'])->name('wisata.data'); // Untuk DataTables
        Route::resource('wisata', WisataController::class)->except(['create']);
        
        // Event (Tambahkan ini)
        Route::get('/event/data', [EventController::class, 'getData'])->name('event.data');
        Route::resource('event', EventController::class)->except(['create']);

        Route::get('/kategori/data', [KategoriController::class, 'getData'])->name('kategori.data');
        Route::resource('kategori', KategoriController::class)->except(['create']);

        Route::get('/slider/data', [SliderController::class, 'getData'])->name('slider.data');
        Route::resource('slider', SliderController::class)->except(['create']);

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');
    });
});