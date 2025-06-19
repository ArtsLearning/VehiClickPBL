@extends('layouts.app')

@section('content')
<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Saya') }}
        </h2>
    </x-slot>

    <style>
        .active-link {
            font-weight: bold;
            color: #f97316; /* Tailwind orange-500 */
        }

        .gradient-orange {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
        }

        .glow-orange {
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
        }
        
        /* Perbaikan untuk scroll dan layout */
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
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar-section {
                height: auto;
                margin-bottom: 2rem;
            }
        }
    </style>

    <div class="profile-container flex flex-col md:flex-row max-w-7xl mx-auto py-6 px-4 gap-6 items-start">

        {{-- Main Content --}}
        <div class="main-content w-full md:w-3/4 space-y-8">

            {{-- Update Profile --}}
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Informasi Profil</h2>
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- Update Password --}}
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Ubah Kata Sandi</h2>
                @include('profile.partials.update-password-form')
            </div>

            {{-- Delete Account --}}
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Hapus Akun</h2>
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-layout>
@endsection