@extends('layouts.app')
@section('content')
<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-400 leading-tight">
            {{ __('Profil Saya') }}
        </h2>
    </x-slot>
    <style>
        body {
            background-color: #0f1419;
            background-image: 
                radial-gradient(at 40% 20%, rgba(255, 107, 53, 0.1) 0px, transparent 50%),
                radial-gradient(at 80% 0%, rgba(247, 147, 30, 0.1) 0px, transparent 50%),
                radial-gradient(at 0% 50%, rgba(255, 107, 53, 0.05) 0px, transparent 50%);
            min-height: 100vh;
            color: #e5e7eb;
        }
        
        .active-link {
            font-weight: bold;
            color: #f97316; /* Orange-500 */
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
        
        .glow-orange {
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
        }
        
        .dark-card {
            background: linear-gradient(145deg, #1f2937, #111827);
            border: 1px solid #374151;
            box-shadow: 
                0 10px 25px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .dark-card:hover {
            border-color: #f97316;
            box-shadow: 
                0 10px 25px rgba(0, 0, 0, 0.3),
                0 0 20px rgba(249, 115, 22, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
        
        .input-dark {
            background-color: #374151;
            border: 1px solid #4b5563;
            color: #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .input-dark:focus {
            background-color: #4b5563;
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
            outline: none;
        }
        
        .input-dark::placeholder {
            color: #9ca3af;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #f97316, #ea580c);
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #ea580c, #dc2626);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(249, 115, 22, 0.4);
        }
        
        .btn-secondary {
            background: rgba(75, 85, 99, 0.8);
            border: 1px solid #6b7280;
            color: #e5e7eb;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: rgba(107, 114, 128, 0.9);
            border-color: #9ca3af;
            color: white;
            transform: translateY(-1px);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }
        
        .btn-danger:hover {
            background: linear-gradient(135deg, #b91c1c, #991b1b);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }
        
        .text-primary {
            color: #f97316;
        }
        
        .text-secondary {
            color: #9ca3af;
        }
        
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #f97316, transparent);
            margin: 2rem 0;
        }
        
        /* Profile container improvements */
        .profile-container {
            overflow-y: visible;
            margin-top: 0;
        }
        
        .sidebar-section {
            position: static;
            height: fit-content;
            min-height: auto;
            align-self: flex-start;
        }
        
        .main-content {
            overflow-y: visible;
            height: auto;
            flex: 1;
        }
        
        /* Form styling */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #f3f4f6;
            font-weight: 500;
        }
        
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid #22c55e;
            color: #22c55e;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid #ef4444;
            color: #ef4444;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar-section {
                height: auto;
                margin-bottom: 2rem;
            }
        }
        
        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #1f2937;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #f97316;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #ea580c;
        }
    </style>
    
    <div class="profile-container flex flex-col md:flex-row max-w-7xl mx-auto py-6 px-4 gap-6 items-start">
        {{-- Main Content --}}
        <div class="main-content w-full space-y-8">
            {{-- Welcome Section --}}
            <div class="dark-card p-6 rounded-xl">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-16 h-16 bg-gradient-orange rounded-full flex items-center justify-center text-2xl font-bold">
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
                    <div class="w-10 h-10 bg-gradient-orange rounded-lg flex items-center justify-center">
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
                    <div class="w-10 h-10 bg-gradient-orange rounded-lg flex items-center justify-center">
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

    {{-- Custom styling untuk form elements --}}
    <style>
        /* Override form styling untuk tema dark */
        .profile-container input[type="text"],
        .profile-container input[type="email"],
        .profile-container input[type="password"] {
            @apply input-dark rounded-lg px-4 py-3 w-full;
        }
        
        .profile-container label {
            @apply form-label;
        }
        
        .profile-container button[type="submit"] {
            @apply btn-primary px-6 py-3 rounded-lg;
        }
        
        .profile-container .btn-secondary {
            @apply px-6 py-3 rounded-lg;
        }
        
        .profile-container .text-red-600 {
            @apply btn-danger px-6 py-3 rounded-lg;
        }
        
        /* Success and error messages */
        .profile-container .bg-green-100 {
            @apply alert-success;
        }
        
        .profile-container .bg-red-100 {
            @apply alert-error;
        }
        
        /* Form spacing */
        .profile-container .space-y-6 > * + * {
            margin-top: 1.5rem;
        }
        
        .profile-container .mt-4 {
            margin-top: 1rem;
        }
        
        .profile-container .mb-4 {
            margin-bottom: 1rem;
        }
        
        /* Text colors for dark theme */
        .profile-container .text-gray-700 {
            color: #e5e7eb;
        }
        
        .profile-container .text-gray-600 {
            color: #9ca3af;
        }
        
        .profile-container .text-sm {
            font-size: 0.875rem;
        }
        
        /* Card improvements */
        .profile-container .bg-white {
            background: transparent;
        }
        
        /* Animation untuk hover effects */
        .profile-container .dark-card {
            transition: all 0.3s ease;
        }
        
        /* Mobile responsiveness */
        @media (max-width: 640px) {
            .profile-container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .dark-card {
                padding: 1.5rem;
            }
            
            .text-2xl {
                font-size: 1.5rem;
            }
        }
    </style>
</x-layout>
@endsection