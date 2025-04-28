<header class="relative z-10 flex justify-between items-center px-6 py-3 bg-black bg-opacity-90">
    <div class="logo">
        <!-- Menampilkan logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
    </div>
    
    <nav class="hidden md:flex space-x-8">
        <a href="/index" class="text-white px-4 py-2 hover:text-orange-500 transition-colors duration-300">Beranda</a>
        <a href="/produk" class="text-white px-4 py-2 hover:text-orange-500 transition-colors duration-300">Produk</a>
        <a href="/tentang" class="text-white px-4 py-2 hover:text-orange-500 transition-colors duration-300">Tentang</a>
    </nav>

    <div class="flex items-center space-x-4">
        <a href="/login" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-1.5 rounded text-sm">Masuk</a>
        <a href="/daftar" class="bg-orange-300 hover:bg-orange-400 text-white px-4 py-1.5 rounded text-sm">Daftar</a>
        <a href="/profil" class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
        </a>
    </div>
</header>
