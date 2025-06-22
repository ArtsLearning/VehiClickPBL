@extends('layouts.app')

@section('content')
<style>
    .profile-wrapper {
        min-height: calc(100vh - 80px);
        padding: 2rem 1rem;
    }

    .profile-wrapper input,
    .profile-wrapper textarea,
    .profile-wrapper select {
        color: black !important;
        background-color: white !important;
    }

    .profile-wrapper input:focus,
    .profile-wrapper textarea:focus,
    .profile-wrapper select:focus {
        color: black !important;
        background-color: white !important;
        border-color: #f97316 !important;
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1) !important;
        outline: none !important;
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
        background: linear-gradient(135deg, #ff6b35, #f7931e);
        color: white;
        transition: all 0.3s ease;
    }

    .gradient-orange:hover {
        background: linear-gradient(135deg, #f7931e, #ff6b35);
        transform: translateY(-2px);
    }

    .dark-card {
        background: linear-gradient(145deg, #1f2937, #111827);
        border: 1px solid #374151;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3),
                    inset 0 1px 0 rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .dark-card:hover {
        border-color: #f97316;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3),
                    0 0 20px rgba(249, 115, 22, 0.2),
                    inset 0 1px 0 rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }

    .btn-primary {
        background: linear-gradient(135deg, #f97316, #ea580c);
        border: none;
        color: white;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #ea580c, #dc2626);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(249, 115, 22, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #b91c1c, #991b1b);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
    }

    .divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, #f97316, transparent);
        margin: 2rem 0;
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
                <div class="dark-card p-6 rounded-xl">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 gradient-orange rounded-full flex items-center justify-center text-2xl font-bold">
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
                        <div class="w-10 h-10 gradient-orange rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Informasi Profil</h2>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>

                {{-- Update Password --}}
                <div class="dark-card p-6 rounded-xl">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 gradient-orange rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Ubah Kata Sandi</h2>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>

                {{-- Delete Account --}}
                <div class="dark-card p-6 rounded-xl border-red-800">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
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
