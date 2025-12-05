@extends('layouts.main')

@section('content')
<style>
    /* === ANIMASI DASAR === */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    /* === HERO SECTION === */
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 4rem 2rem;
        border-radius: 1.5rem;
        box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
        animation: fadeInDown 1s ease-in-out;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: float 6s ease-in-out infinite;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 2rem;
    }

    .hero-btn {
        background: white;
        color: #667eea;
        padding: 0.875rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
    }

    .hero-btn:hover {
        background: #fbbf24;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(251, 191, 36, 0.4);
    }

    /* === FEATURE CARDS === */
    .feature-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.07);
        transition: all 0.4s ease;
        animation: fadeInUp 1s ease-in-out;
        height: 100%;
        border: 1px solid #e5e7eb;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        border-color: #667eea;
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        transition: transform 0.4s ease;
    }

    .feature-card:hover .feature-icon {
        transform: scale(1.15) rotate(5deg);
    }

    .feature-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.75rem;
    }

    .feature-text {
        color: #6b7280;
        line-height: 1.6;
    }

    /* === DESCRIPTION === */
    .description-box {
        background: white;
        border-left: 4px solid #667eea;
        border-right: 4px solid #667eea;
        padding: 1.5rem;
        border-radius: 0.5rem;
        margin: 2rem auto;
        max-width: 900px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    /* === RESPONSIVE === */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 1.875rem;
        }
        .hero-subtitle {
            font-size: 1rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section mb-8">
    <div class="hero-content text-center">
        <h1 class="hero-title">
            Selamat Datang di <span style="color: #fbbf24;">Aplikasi Laravel</span>
        </h1>
        <p class="hero-subtitle">
            Belajar Framework Laravel dengan Blade Template dan Konsep MVC
        </p>
        <a href="{{ route('posts.index') }}" class="hero-btn">
            <svg class="inline w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Lihat Semua Posts
        </a>
    </div>
</div>

<!-- Description -->
<!-- <div class="description-box">
    <p class="text-gray-800 text-center" style="line-height: 1.8;">
        Aplikasi ini dibuat sebagai bagian dari <strong>Praktikum Rekayasa Web</strong> menggunakan framework 
        <strong>Laravel versi 12</strong>. Proyek ini berfokus pada penerapan konsep 
        <strong>Model–View–Controller (MVC)</strong> dan penggunaan <strong>Blade Template Engine</strong> 
        untuk membangun tampilan web yang dinamis dan modern.
    </p>
</div> -->

<!-- Feature Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
    <!-- Card 1: Laravel -->
    <div class="feature-card">
        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Laravel Logo" class="feature-icon">
        <h3 class="feature-title text-center">Framework Laravel</h3>
        <p class="feature-text text-center">
            Menggunakan Laravel versi 12 untuk membangun backend yang kuat, efisien, dan mudah dikelola.
        </p>
    </div>

    <!-- Card 2: Tailwind CSS -->
    <div class="feature-card">
        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="Tailwind Logo" class="feature-icon">
        <h3 class="feature-title text-center">Desain Modern</h3>
        <p class="feature-text text-center">
            Tampilan dibuat menggunakan <strong>Tailwind CSS</strong> agar responsif, ringan, dan nyaman di semua perangkat.
        </p>
    </div>

    <!-- Card 3: CRUD -->
    <div class="feature-card">
        <img src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png" alt="CRUD Icon" class="feature-icon">
        <h3 class="feature-title text-center">CRUD Posts & Auth</h3>
        <p class="feature-text text-center">
            Aplikasi dilengkapi fitur <strong>CRUD</strong> (Create, Read, Update, Delete) untuk mengelola posts dengan sistem authentication & authorization.
        </p>
    </div>
</div>

<!-- Additional Features -->
<div class="mt-12 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-8 border border-indigo-100">
    <h2 class="text-2xl font-bold text-center text-gray-900 mb-6">Fitur Aplikasi</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-3xl mx-auto">
        <div class="flex items-start space-x-3">
            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <h4 class="font-semibold text-gray-900">Authentication</h4>
                <p class="text-sm text-gray-600">Login & Register dengan Laravel Breeze</p>
            </div>
        </div>
        
        <div class="flex items-start space-x-3">
            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <h4 class="font-semibold text-gray-900">Authorization</h4>
                <p class="text-sm text-gray-600">Role-based access (Guest, User, Admin)</p>
            </div>
        </div>
        
        <div class="flex items-start space-x-3">
            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <h4 class="font-semibold text-gray-900">Database Relations</h4>
                <p class="text-sm text-gray-600">One-to-Many (Users, Categories, Posts)</p>
            </div>
        </div>
        
        <div class="flex items-start space-x-3">
            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <h4 class="font-semibold text-gray-900">Responsive Design</h4>
                <p class="text-sm text-gray-600">Mobile-first dengan Tailwind CSS</p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="text-center mt-12">
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Siap untuk memulai?</h3>
    <div class="flex justify-center space-x-4">
        <a href="{{ route('posts.index') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition">
            Jelajahi Posts
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
        </a>
        
        @guest
            <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 bg-white hover:bg-gray-50 text-indigo-600 font-medium rounded-lg shadow-sm border border-indigo-200 transition">
                Daftar Sekarang
            </a>
        @endguest
    </div>
</div>

@endsection