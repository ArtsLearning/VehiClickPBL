@extends('admin.layouts.base')

@section('content')
<div class="relative w-full h-screen bg-cover bg-center" style="background-image: url('/images/background.png');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-center px-4">
        <h1 class="text-4xl md:text-6xl font-bold text-black mb-6 animate-fade-in">
            Selamat Datang di Halaman Admin
        </h1>
        <p class="text-lg md:text-2xl">
                Kelola semua data dengan mudah dan cepat.
            </p>
        <img src="/images/logo.png" alt="Logo Admin" class="w-24 md:w-32 animate-fade-in-up">
    </div>
</div>
@endsection