@extends('layouts.main')

@section('content')
<style>
    /* === ANIMASI === */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-40px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    /* === CONTACT PAGE === */
    .contact-page {
        min-height: 60vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .contact-header {
        text-align: center;
        margin-bottom: 2rem;
        animation: fadeInDown 1s ease-in-out;
    }

    .contact-card {
        background: white;
        padding: 2.5rem;
        border-radius: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
        text-align: center;
        animation: fadeInUp 1s ease-in-out;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.2);
    }

    .contact-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        animation: pulse 2s infinite;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .info-item {
        padding: 1rem;
        margin: 1rem 0;
        border-radius: 0.75rem;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        transition: all 0.3s ease;
        border-left: 4px solid #667eea;
    }

    .info-item:hover {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        transform: translateX(5px);
        border-left-color: #764ba2;
    }

    .btn-contact {
        background: linear-gradient(90deg, #667eea, #764ba2);
        color: white;
        font-weight: 600;
        padding: 0.875rem 2rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-contact:hover {
        background: linear-gradient(90deg, #764ba2, #667eea);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        color: white;
    }

    /* === GRADIENT TEXT === */
    .gradient-text {
        background: linear-gradient(90deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<div class="contact-page py-8">
    <!-- Header -->
    <div class="contact-header max-w-2xl mx-auto px-4">
        <div class="mb-4">
            <svg class="w-16 h-16 mx-auto text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
        <h1 class="text-4xl font-bold mb-3">
            <span class="gradient-text">Hubungi Kami</span>
        </h1>
        <p class="text-lg text-gray-600 leading-relaxed">
            Jika Anda memiliki pertanyaan, masukan, atau kerja sama, jangan ragu untuk menghubungi kami melalui kontak berikut.
        </p>
    </div>

    <!-- Contact Card -->
    <div class="contact-card mx-4 md:mx-auto mt-8">
        <!-- Icon -->
        <div class="contact-icon">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Person!</h2>

        <!-- Contact Info Items -->
        <div class="space-y-4">
            <!-- Email -->
            <div class="info-item text-left">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500 font-medium">Email</p>
                        <a href="mailto:mohirsan@usm.ac.id" class="text-base font-semibold text-gray-900 hover:text-indigo-600 transition">
                            mohirsannurkhayan@gmail.com
                        </a>
                    </div>
                </div>
            </div>

            <!-- Phone -->
            <div class="info-item text-left">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500 font-medium">Telepon</p>
                        <a href="tel:+6281229816299" class="text-base font-semibold text-gray-900 hover:text-indigo-600 transition">
                            +62 81229816299
                        </a>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="info-item text-left">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500 font-medium">Alamat</p>
                        <p class="text-base font-semibold text-gray-900">
                            Jl. Sendang Coyo RT. 004/RW. 001<br>
                            Grobogan, Jawa Tengah
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <a href="mailto:mohirsan@usm.ac.id" class="btn-contact">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Kirim Email Sekarang
            </a>
        </div>
    </div>

    <!-- Additional Info Cards -->
    
</div>

@endsection