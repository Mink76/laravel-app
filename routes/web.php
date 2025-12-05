<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ============================================
// DEFAULT LARAVEL WELCOME PAGE
// ============================================

Route::get('/', function () {
    return view('welcome', ['nama' => 'Moh Irsan Nur Khayan', 'nim' => 'G.211.23.0026']);
});

// ============================================
// PUBLIC ROUTES (Guest bisa akses)
// ============================================

// Guest HANYA bisa lihat daftar post
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// ============================================
// PROTECTED ROUTES (Harus login)
// ============================================

Route::middleware(['auth'])->group(function () {
    
    // Pages - HANYA untuk user yang login
    Route::get('/home', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    
    // Post Management - CREATE (Semua user login bisa)
    // PENTING: Route /posts/create HARUS DI ATAS /posts/{post}
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    
    // Profile Routes - LENGKAP
    Route::get('/profile', function () {
        return view('profile.show');
    })->name('profile.show');
    
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Dashboard & Profile (dari Breeze)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ============================================
// PUBLIC ROUTES - Detail Post (Guest bisa akses)
// ============================================

// PENTING: Route /posts/{post} HARUS DI BAWAH /posts/create
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// ============================================
// ADMIN ONLY ROUTES (Hanya Admin bisa akses)
// ============================================

Route::middleware(['auth', 'admin'])->group(function () {
    // Post Management - EDIT & DELETE (HANYA ADMIN)
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';