@extends('layouts.main')

@section('content')
<style>
    /* === ANIMASI === */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* === ABOUT SECTION === */
    .about-section {
        animation: fadeIn 1s ease-in-out;
        min-height: 60vh;
    }

    .about-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        animation: fadeInLeft 1s ease-in-out;
    }

    .about-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    /* === DEVELOPER IMAGE === */
    .developer-section {
        animation: fadeInRight 1s ease-in-out;
    }

    .developer-image {
        max-width: 300px;
        width: 100%;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.4s ease;
        border: 4px solid white;
    }

    .developer-image:hover {
        transform: scale(1.05) rotate(2deg);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.3);
    }

    /* === INFO LIST === */
    .info-list {
        list-style: none;
        padding: 0;
    }

    .info-list li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .info-list li:last-child {
        border-bottom: none;
    }

    /* === GRADIENT BACKGROUND === */
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 2rem;
        border-radius: 1rem;
        color: white;
        margin-bottom: 2rem;
    }
</style>

<div class="about-section py-8">
    <!-- Header Section -->
    <div class="gradient-bg text-center mb-8 shadow-xl">
        <h1 class="text-4xl font-bold mb-3">Tentang Saya</h1>
        <p class="text-lg opacity-90">Belajar. Membangun. Berkarya dengan Laravel & Tailwind CSS.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <!-- Kolom Kiri - Info -->
        <div class="lg:col-span-2">
            <div class="about-card bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="mb-6">
                    <h2 class="text-3xl font-bold text-indigo-600 mb-4">Halo! 👋</h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-4">
                        Saya <strong class="text-indigo-600">Moh Irsan Nur Khayan</strong>, seorang mahasiswa 
                        <strong>Teknik Informatika</strong> di <strong>Universitas Semarang</strong>. 
                        Saat ini saya sedang mempelajari dan mengembangkan aplikasi berbasis web menggunakan 
                        framework <strong class="text-indigo-600">Laravel 12</strong>.
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        Proyek ini merupakan bagian dari tugas <em>Praktikum Rekayasa Web</em>, dengan tujuan 
                        untuk menerapkan konsep <strong>MVC (Model–View–Controller)</strong> dan 
                        <strong>Blade Template</strong> dalam membangun aplikasi web yang dinamis, efisien, 
                        dan modern menggunakan <strong class="text-indigo-600">Tailwind CSS</strong>.
                    </p>
                </div>

                <hr class="my-6 border-gray-200">

                <!-- Informasi Pribadi -->
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Informasi Pribadi
                    </h3>
                    <ul class="info-list space-y-3">
                        <li class="flex items-start">
                            <span class="font-semibold text-gray-700 w-40">Nama:</span>
                            <span class="text-gray-600">Moh Irsan Nur Khayan</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-semibold text-gray-700 w-40">NIM:</span>
                            <span class="text-gray-600">G.211.23.0026</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-semibold text-gray-700 w-40">Program Studi:</span>
                            <span class="text-gray-600">Teknik Informatika</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-semibold text-gray-700 w-40">Fakultas:</span>
                            <span class="text-gray-600">Teknologi Informasi dan Komunikasi</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-semibold text-gray-700 w-40">Kampus:</span>
                            <span class="text-gray-600">Universitas Semarang</span>
                        </li>
                    </ul>
                </div>

                <!-- Quote -->
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 border-l-4 border-indigo-500 p-4 rounded-r-lg">
                    <p class="text-gray-700 italic">
                        <svg class="w-8 h-8 text-indigo-400 mb-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                        <span class="text-base">
                            "Dengan Laravel, saya belajar bagaimana logika backend, desain frontend, dan database 
                            bisa saling terhubung secara harmonis untuk menciptakan aplikasi web yang handal dan menarik."
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan - Profile Image -->
        <div class="lg:col-span-1">
            <div class="developer-section bg-white rounded-2xl shadow-lg p-6 border border-gray-100 text-center sticky top-8">
                <div class="mb-4">
                    <img src="https://img.fcbayern.com/image/upload/f_auto/q_auto/ar_1:1,c_fill,g_custom,w_768/v1719763484/cms/public/images/fcbayern-com/players/spielerportraits/ganzkoerper/manuel_neuer.png"
                         alt="Developer Image"
                         class="developer-image mx-auto mb-4">
                    <h4 class="text-xl font-bold text-gray-900 mb-1">Gue Mink's</h4>
                    <p class="text-sm text-gray-500 mb-4">Full Stack Web Developer</p>
                </div>

                <hr class="my-4 border-gray-200">

                <!-- Tech Stack -->
                <div class="text-left">
                    <h5 class="font-semibold text-gray-800 mb-3 text-center">Tech Stack</h5>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="bg-gray-50 rounded-lg p-2 text-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Laravel" class="h-8 mx-auto mb-1">
                            <p class="text-xs text-gray-600">Laravel</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-2 text-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="Tailwind" class="h-8 mx-auto mb-1">
                            <p class="text-xs text-gray-600">Tailwind</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-2 text-center">
                            <img src="https://badoystudio.com/wp-content/uploads/2022/10/mysql-icon.png" alt="MySQL" class="h-8 mx-auto mb-1">
                            <p class="text-xs text-gray-600">MySQL</p>
                        </div>
                    </div>
                </div>

                <hr class="my-4 border-gray-200">

                <!-- Social Links (Optional) -->
                <div>
                    <h5 class="font-semibold text-gray-800 mb-3">Connect</h5>
                    <div class="flex justify-center space-x-3">
                        <a href="#" class="w-10 h-10 bg-indigo-100 hover:bg-indigo-200 text-indigo-600 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-pink-100 hover:bg-pink-200 text-pink-600 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>

@endsection