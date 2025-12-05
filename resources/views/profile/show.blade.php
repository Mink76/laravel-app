

@extends('layouts.main')

@section('content')
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .profile-card {
        animation: fadeIn 0.6s ease-in-out;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .tab-button.active {
        @apply border-indigo-500 text-indigo-600;
    }

    .activity-item {
        border-left: 3px solid #4f46e5;
        transition: all 0.3s ease;
    }

    .activity-item:hover {
        border-left-color: #6366f1;
        background-color: #f8fafc;
    }

    .stat-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>

<div class="max-w-6xl mx-auto profile-card">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-t-2xl p-8 text-white text-center">
        <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center text-indigo-600 text-4xl font-bold shadow-lg">
            {{ substr(auth()->user()->name, 0, 1) }}
        </div>
        <h1 class="text-3xl font-bold mb-2">{{ auth()->user()->name }}</h1>
        <p class="text-indigo-100">{{ auth()->user()->email }}</p>
        @if(auth()->user()->isAdmin())
            <span class="inline-block mt-3 px-4 py-1 bg-red-500 text-white text-sm font-semibold rounded-full shadow-lg">
                👑 Administrator
            </span>
        @else
            <span class="inline-block mt-3 px-4 py-1 bg-white text-indigo-600 text-sm font-semibold rounded-full shadow-lg">
                👤 User
            </span>
        @endif
    </div>

    <!-- Content -->
    <div class="bg-white rounded-b-2xl shadow-xl border border-gray-200 overflow-hidden">
        <!-- Tabs -->
        <div class="border-b border-gray-200">
            <nav class="flex -mb-px">
                <button onclick="switchTab('account')" class="tab-button active px-6 py-4 text-sm font-medium border-b-2 border-indigo-500 text-indigo-600 transition-colors duration-200">
                    Informasi Akun
                </button>
                <button onclick="switchTab('activity')" class="tab-button px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 border-b-2 border-transparent hover:border-gray-300 transition-colors duration-200">
                    Aktivitas
                </button>
                <button onclick="switchTab('statistics')" class="tab-button px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 border-b-2 border-transparent hover:border-gray-300 transition-colors duration-200">
                    Statistik
                </button>
            </nav>
        </div>

        <!-- Tab Content -->
        <div class="p-8">
            <!-- Informasi Akun Tab -->
            <div id="account-tab" class="tab-content active">
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama -->
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <label class="text-sm font-medium text-gray-500 mb-1 block">Nama Lengkap</label>
                            <p class="text-lg font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                        </div>

                        <!-- Email -->
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <label class="text-sm font-medium text-gray-500 mb-1 block">Email</label>
                            <p class="text-lg font-semibold text-gray-900">{{ auth()->user()->email }}</p>
                        </div>

                        <!-- Role -->
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <label class="text-sm font-medium text-gray-500 mb-1 block">Role</label>
                            <p class="text-lg font-semibold text-gray-900 capitalize">{{ auth()->user()->role }}</p>
                        </div>

                        <!-- Tanggal Bergabung -->
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <label class="text-sm font-medium text-gray-500 mb-1 block">Bergabung Sejak</label>
                            <p class="text-lg font-semibold text-gray-900">{{ auth()->user()->created_at->format('d F Y') }}</p>
                        </div>
                    </div>

                    <!-- Statistik User -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <!-- Total Posts -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200 stat-card">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Total Posts</p>
                                    <p class="text-3xl font-bold text-indigo-600 mt-2">
                                        {{ auth()->user()->posts()->count() }}
                                    </p>
                                </div>
                                <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Post Terbaru -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6 border border-green-200 stat-card">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Post Terbaru</p>
                                    <p class="text-3xl font-bold text-green-600 mt-2">
                                        {{ auth()->user()->posts()->latest()->first() ? auth()->user()->posts()->latest()->first()->created_at->diffForHumans() : '-' }}
                                    </p>
                                </div>
                                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Akun Aktif -->
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-200 stat-card">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Status Akun</p>
                                    <p class="text-2xl font-bold text-purple-600 mt-2">Aktif</p>
                                </div>
                                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Profile
                        </a>

                        <a href="{{ route('posts.index') }}" class="inline-flex items-center px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-lg shadow-sm border border-gray-300 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Lihat Semua Post
                        </a>

                        @can('create', App\Models\Post::class)
                            <a href="{{ route('posts.create') }}" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm transition">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Buat Post Baru
                            </a>
                        @endcan
                    </div>

                    <!-- Recent Posts -->
                    @if(auth()->user()->posts()->count() > 0)
                        <div class="mt-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Post Terbaru Saya</h3>
                            <div class="space-y-3">
                                @foreach(auth()->user()->posts()->latest()->take(5)->get() as $post)
                                    <a href="{{ route('posts.show', $post) }}" class="block bg-gray-50 hover:bg-gray-100 rounded-lg p-4 border border-gray-200 transition">
                                        <div class="flex items-center justify-between">
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-900">{{ $post->title }}</h4>
                                                <p class="text-sm text-gray-500 mt-1">{{ Str::limit($post->content, 100) }}</p>
                                            </div>
                                            <div class="ml-4 text-right">
                                                <p class="text-xs text-gray-400">{{ $post->created_at->format('d M Y') }}</p>
                                                @if($post->category)
                                                    <span class="inline-block mt-1 px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded">
                                                        {{ $post->category->name }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="mt-8 text-center py-12 bg-gray-50 rounded-lg border border-gray-200">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada post</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat post pertama Anda.</p>
                            <div class="mt-6">
                                <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Buat Post Baru
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Aktivitas Tab -->
            <div id="activity-tab" class="tab-content">
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Riwayat Aktivitas</h3>
                    
                    <!-- Filter Activities -->
                    <div class="flex flex-wrap gap-4 mb-6">
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium transition hover:bg-indigo-700">
                            Semua Aktivitas
                        </button>
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition hover:bg-gray-300">
                            Postingan
                        </button>
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition hover:bg-gray-300">
                            Komentar
                        </button>
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition hover:bg-gray-300">
                            Login
                        </button>
                    </div>

                    <!-- Activities List -->
                    <div class="space-y-4">
                        @php
                            $activities = [
                                ['type' => 'post', 'action' => 'Membuat post baru', 'title' => 'Laravel + React Tutorial', 'time' => '2 jam yang lalu', 'icon' => '📝'],
                                ['type' => 'comment', 'action' => 'Memberikan komentar', 'title' => 'Pada post "JavaScript Tips"', 'time' => '5 jam yang lalu', 'icon' => '💬'],
                                ['type' => 'login', 'action' => 'Login ke sistem', 'title' => 'Dari IP 192.168.1.1', 'time' => '1 hari yang lalu', 'icon' => '🔐'],
                                ['type' => 'post', 'action' => 'Memperbarui post', 'title' => 'Vue.js Best Practices', 'time' => '2 hari yang lalu', 'icon' => '✏️'],
                                ['type' => 'profile', 'action' => 'Memperbarui profil', 'title' => 'Mengubah foto profil', 'time' => '3 hari yang lalu', 'icon' => '👤'],
                            ];
                        @endphp

                        @foreach($activities as $activity)
                            <div class="activity-item bg-white rounded-lg p-4 border border-gray-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 text-lg">
                                        {{ $activity['icon'] }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between">
                                            <h4 class="font-semibold text-gray-900">{{ $activity['action'] }}</h4>
                                            <span class="text-sm text-gray-500">{{ $activity['time'] }}</span>
                                        </div>
                                        <p class="text-gray-600 mt-1">{{ $activity['title'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Load More -->
                    <div class="text-center mt-8">
                        <button class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition">
                            Muat Lebih Banyak Aktivitas
                        </button>
                    </div>
                </div>
            </div>

            <!-- Statistik Tab -->
            <div id="statistics-tab" class="tab-content">
                <div class="space-y-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Statistik Pengguna</h3>
                    
                    <!-- Overview Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="stat-card bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <p class="text-3xl font-bold text-blue-600">{{ auth()->user()->posts()->count() }}</p>
                                <p class="text-sm text-gray-600 mt-1">Total Post</p>
                            </div>
                        </div>

                        <div class="stat-card bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6 border border-green-200">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                    </svg>
                                </div>
                                <p class="text-3xl font-bold text-green-600">24</p>
                                <p class="text-sm text-gray-600 mt-1">Total Komentar</p>
                            </div>
                        </div>

                        <div class="stat-card bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-200">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <p class="text-3xl font-bold text-purple-600">1.2K</p>
                                <p class="text-sm text-gray-600 mt-1">Total Views</p>
                            </div>
                        </div>

                        <div class="stat-card bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border border-orange-200">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <p class="text-3xl font-bold text-orange-600">89%</p>
                                <p class="text-sm text-gray-600 mt-1">Aktifitas</p>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Posting Activity -->
                        <div class="stat-card bg-white rounded-xl p-6 border border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Posting</h4>
                            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                                <p class="text-gray-500">Grafik aktivitas posting akan ditampilkan di sini</p>
                            </div>
                        </div>

                        <!-- Category Distribution -->
                        <div class="stat-card bg-white rounded-xl p-6 border border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Distribusi Kategori</h4>
                            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                                <p class="text-gray-500">Grafik distribusi kategori akan ditampilkan di sini</p>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Stats -->
                    <div class="stat-card bg-white rounded-xl p-6 border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Statistik Bulanan</h4>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 text-sm font-medium text-gray-500">Bulan</th>
                                        <th class="text-center py-3 text-sm font-medium text-gray-500">Post</th>
                                        <th class="text-center py-3 text-sm font-medium text-gray-500">Komentar</th>
                                        <th class="text-center py-3 text-sm font-medium text-gray-500">Views</th>
                                        <th class="text-center py-3 text-sm font-medium text-gray-500">Aktifitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $monthlyStats = [
                                            ['month' => 'Januari 2024', 'posts' => 5, 'comments' => 12, 'views' => 324, 'activity' => '85%'],
                                            ['month' => 'Februari 2024', 'posts' => 3, 'comments' => 8, 'views' => 287, 'activity' => '78%'],
                                            ['month' => 'Maret 2024', 'posts' => 7, 'comments' => 15, 'views' => 456, 'activity' => '92%'],
                                            ['month' => 'April 2024', 'posts' => 4, 'comments' => 10, 'views' => 389, 'activity' => '81%'],
                                        ];
                                    @endphp
                                    @foreach($monthlyStats as $stat)
                                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                                            <td class="py-3 text-sm font-medium text-gray-900">{{ $stat['month'] }}</td>
                                            <td class="py-3 text-sm text-center text-gray-600">{{ $stat['posts'] }}</td>
                                            <td class="py-3 text-sm text-center text-gray-600">{{ $stat['comments'] }}</td>
                                            <td class="py-3 text-sm text-center text-gray-600">{{ $stat['views'] }}</td>
                                            <td class="py-3 text-sm text-center">
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                                    {{ $stat['activity'] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });

        // Remove active class from all buttons
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('active', 'border-indigo-500', 'text-indigo-600');
            button.classList.add('text-gray-500', 'border-transparent');
        });

        // Show selected tab content
        document.getElementById(tabName + '-tab').classList.add('active');

        // Add active class to clicked button
        event.target.classList.add('active', 'border-indigo-500', 'text-indigo-600');
        event.target.classList.remove('text-gray-500', 'border-transparent');
    }

    // Initialize first tab as active
    document.addEventListener('DOMContentLoaded', function() {
        switchTab('account');
    });
</script>

@endsection
