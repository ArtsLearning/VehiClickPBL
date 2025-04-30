@extends('layouts.app')

@section('content')
    <div class="relative w-screen h-screen ">
        <div id="moving-bg" 
             class="absolute top-[-5%] left-[-5%] w-[110%] h-[65%] bg-cover bg-center transition-transform duration-200 ease-out"
             style="background-image: url('{{ asset('images/background.png') }}');">
        </div>

   <!-- Hero Section -->
   <section class="relative h-96">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1519846880284-eb28fd138ff7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');">
            <div class="absolute inset-0 bg-black opacity-40"></div>
        </div>
        
        <!-- Hero Content -->
        <div class="relative h-full flex flex-col justify-center px-8 text-white">
            <h3 class="text-orange-500 text-2xl font-bold">VehiClick</h3>
            <h1 class="text-4xl font-bold mt-2">Solusi Praktis untuk Perjalanan <br/>Bebas Ribet: Klik, Sewa, & <br/><span class="text-orange-500">Berangkat!</span></h1>
            <p class="mt-4 max-w-xl">Nikmati kemudahan menyewa kendaraan untuk perjalanan Anda. Kami menyediakan layanan rental mobil dan motor dengan proses cepat dan mudah.</p>
            <a href="/produk" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded w-40 mt-6 inline-block text-center">
                Jelajahi
            </a>
        </div>
    </section>

    <!-- Featured Section -->
    @include('components.card_index')

    <!-- Benefits Section -->
    <section class="py-12 px-8 bg-gray-100">
        <h3 class="text-lg text-center mb-6 text-orange-500 font-bold">BENEFITS</h3>
        
        <div class="flex flex-col md:flex-row gap-8 items-center">
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold mb-6">Benefit Terbaik Bisa Anda Dapatkan Di Platform Kami</h2>
            </div>
            
            <div class="md:w-1/2">
                <div class="mb-6">
                    <div class="flex items-start mb-2">
                        <div class="bg-orange-500 h-6 w-6 rounded-full flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <p><span class="font-bold">Aplikasi berkualitas</span> dan mudah untuk yang mengerti, serta yang masih baru dengan dunia rental.</p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <div class="flex items-start mb-2">
                        <div class="bg-orange-500 h-6 w-6 rounded-full flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <p><span class="font-bold">Harga sangat terjangkau</span></p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <div class="flex items-start mb-2">
                        <div class="bg-orange-500 h-6 w-6 rounded-full flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <p><span class="font-bold">Proses yang fleksibilitas</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('components.footer')
    </div>
@endsection

