@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 25%, #2d1b0a 50%, #1a1a1a 75%, #0a0a0a 100%);
        background-attachment: fixed;
        min-height: 100vh;
    }

    .profile-wrapper {
        min-height: calc(100vh - 80px);
        padding: 2rem 1rem;
        position: relative;
    }

    .profile-wrapper::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 80%, rgba(249, 115, 22, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(234, 88, 12, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(255, 107, 53, 0.05) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .profile-wrapper > * {
        position: relative;
        z-index: 1;
    }

    .profile-wrapper input,
    .profile-wrapper textarea,
    .profile-wrapper select {
        color: #f3f4f6 !important;
        background: linear-gradient(145deg, #1f2937, #111827) !important;
        border: 1px solid #374151 !important;
        border-radius: 0.75rem !important;
        box-shadow: 
            inset 0 2px 4px rgba(0, 0, 0, 0.3),
            0 1px 2px rgba(0, 0, 0, 0.1) !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    .profile-wrapper input:focus,
    .profile-wrapper textarea:focus,
    .profile-wrapper select:focus {
        color: #ffffff !important;
        background: linear-gradient(145deg, #374151, #1f2937) !important;
        border-color: #f97316 !important;
        box-shadow: 
            inset 0 2px 4px rgba(0, 0, 0, 0.3),
            0 0 0 3px rgba(249, 115, 22, 0.2),
            0 0 20px rgba(249, 115, 22, 0.1) !important;
        outline: none !important;
        transform: translateY(-1px) !important;
    }

    .profile-wrapper input::placeholder,
    .profile-wrapper textarea::placeholder {
        color: #9ca3af !important;
    }

    .profile-wrapper h2,
    .profile-wrapper label,
    .profile-wrapper p,
    .profile-wrapper .text-gray-900,
    .profile-wrapper .text-gray-800,
    .profile-wrapper .text-gray-700,
    .profile-wrapper .text-gray-600,
    .profile-wrapper .text-gray-500,
    .profile-wrapper .text-sm,
    .profile-wrapper .text-base {
        color: #f3f4f6 !important;
    }

    .gradient-orange {
        background: linear-gradient(135deg, #ff6b35 0%, #f97316 50%, #ea580c 100%);
        color: white;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 
            0 4px 15px rgba(249, 115, 22, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .gradient-orange::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s;
    }

    .gradient-orange:hover::before {
        left: 100%;
    }

    .gradient-orange:hover {
        background: linear-gradient(135deg, #ea580c 0%, #dc2626 50%, #b91c1c 100%);
        transform: translateY(-3px) scale(1.02);
        box-shadow: 
            0 8px 25px rgba(249, 115, 22, 0.4),
            0 0 30px rgba(249, 115, 22, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .dark-card {
        background: linear-gradient(145deg, #1f2937 0%, #111827 50%, #0f172a 100%);
        border: 1px solid #374151;
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 
            0 10px 25px rgba(0, 0, 0, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.1),
            0 1px 2px rgba(0, 0, 0, 0.3);
    }

    .dark-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(249, 115, 22, 0.5), transparent);
        transition: all 0.3s ease;
    }

    .dark-card:hover {
        border-color: #f97316;
        transform: translateY(-5px) scale(1.01);
        box-shadow: 
            0 20px 40px rgba(0, 0, 0, 0.6),
            0 0 30px rgba(249, 115, 22, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.15),
            0 1px 2px rgba(0, 0, 0, 0.3);
    }

    .dark-card:hover::before {
        background: linear-gradient(90deg, transparent, rgba(249, 115, 22, 0.8), transparent);
        box-shadow: 0 0 10px rgba(249, 115, 22, 0.3);
    }

    .btn-primary {
        background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #dc2626 100%);
        border: none;
        color: white;
        font-weight: 600;
        position: relative;
        overflow: hidden;
        border-radius: 0.75rem;
        box-shadow: 
            0 4px 15px rgba(249, 115, 22, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #ea580c 0%, #dc2626 50%, #b91c1c 100%);
        transform: translateY(-2px) scale(1.02);
        box-shadow: 
            0 8px 25px rgba(249, 115, 22, 0.5),
            0 0 20px rgba(249, 115, 22, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .btn-danger {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
        color: white;
        font-weight: 600;
        position: relative;
        overflow: hidden;
        border-radius: 0.75rem;
        box-shadow: 
            0 4px 15px rgba(220, 38, 38, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-danger::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s;
    }

    .btn-danger:hover::before {
        left: 100%;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 50%, #7f1d1d 100%);
        transform: translateY(-2px) scale(1.02);
        box-shadow: 
            0 8px 25px rgba(220, 38, 38, 0.5),
            0 0 20px rgba(220, 38, 38, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .divider {
        height: 2px;
        background: linear-gradient(90deg, transparent, #f97316 20%, #ea580c 50%, #f97316 80%, transparent);
        margin: 2rem 0;
        border-radius: 1px;
        position: relative;
        overflow: hidden;
    }

    .divider::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .text-secondary {
        color: #9ca3af;
    }

    .text-red-400 {
        color: #f87171;
    }

    .rounded-xl {
        border-radius: 1rem;
    }

    /* Enhanced Glow Effects */
    .glow-orange {
        box-shadow: 0 0 20px rgba(249, 115, 22, 0.3);
        animation: pulse-glow 2s infinite alternate;
    }

    @keyframes pulse-glow {
        0% {
            box-shadow: 0 0 20px rgba(249, 115, 22, 0.3);
        }
        100% {
            box-shadow: 0 0 30px rgba(249, 115, 22, 0.5);
        }
    }

    /* Enhanced Avatar */
    .avatar-enhanced {
        background: linear-gradient(135deg, #ff6b35 0%, #f97316 50%, #ea580c 100%);
        box-shadow: 
            0 0 20px rgba(249, 115, 22, 0.4),
            inset 0 2px 4px rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .avatar-enhanced::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: conic-gradient(transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: rotate 4s linear infinite;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Enhanced Section Headers */
    .section-icon {
        background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        box-shadow: 
            0 4px 15px rgba(249, 115, 22, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    /* Danger Zone Enhancement */
    .danger-card {
        border: 1px solid #dc2626;
        background: linear-gradient(145deg, #1f1f1f 0%, #1a1a1a 50%, #0f0f0f 100%);
        position: relative;
    }

    .danger-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(220, 38, 38, 0.8), transparent);
    }

    .danger-icon {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        box-shadow: 
            0 4px 15px rgba(220, 38, 38, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }
</style>

<div class="profile-wrapper">
    <x-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-orange-400 leading-tight">
                {{ __('Profil Saya') }}
            </h2>
        </x-slot>

        <div class="flex flex-col md:flex-row max-w-7xl mx-auto py-6 px-4 gap-6 items-start">
            <div class="w-full space-y-8">

                {{-- Welcome Card --}}
                <div class="dark-card p-6 rounded-xl glow-orange">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 avatar-enhanced rounded-full flex items-center justify-center text-2xl font-bold relative z-10">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Selamat datang, {{ Auth::user()->name ?? 'User' }}!</h1>
                            <p class="text-secondary">Kelola informasi profil Anda di sini</p>
                        </div>
                    </div>
                    <div class="divider"></div>
                </div>

                {{-- Update Profile --}}
                <div class="dark-card p-6 rounded-xl">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 section-icon rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Informasi Profil</h2>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>

                {{-- Verifikasi KTP --}}
                <div class="dark-card p-6 rounded-xl">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 section-icon rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 11-11.8 2H4a1 1 0 100 2h2.07a6 6 0 1111.93-2h-1.2zM10 2a1 1 0 00-1 1v1H8a1 1 0 100 2h1v1a1 1 0 102 0V6h1a1 1 0 100-2h-1V3a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Verifikasi KTP</h2>
                    </div>

                    <p class="text-sm text-gray-300 mb-4">
                        Unggah foto KTP dan foto diri sambil memegang KTP untuk verifikasi identitas Anda.
                    </p>

                    @include('profile.partials.verifikasi-ktp')
                </div>


                {{-- Update Password --}}
                <div class="dark-card p-6 rounded-xl">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 section-icon rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Ubah Kata Sandi</h2>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>

                {{-- Delete Account --}}
                <div class="dark-card danger-card p-6 rounded-xl">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 danger-icon rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Zona Berbahaya</h2>
                            <p class="text-red-400 text-sm">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>

            </div>
        </div>
    </x-layout>
</div>
@endsection