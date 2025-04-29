@extends('layouts.app')

<body class="h-screen m-0 p-0">

    <div class="relative w-screen h-screen">
        <div id="moving-bg" 
             class="absolute top-0 left-0 w-full h-1/2 bg-cover bg-center transition-transform duration-200 ease-out"
             style="background-image: url('{{ asset('images/background.png') }}');">
        </div>

        <!-- Navbar -->
        @include('components.navbar')

        <main class="relative max-w-6xl mx-auto pt-36 px-4 sm:px-6 md:px-10 pb-14">
            <!-- Title -->
            <h1 class="text-center text-2xl sm:text-3xl md:text-4xl -mt-16 font-extrabold mb-6 text-white">
                Produk
            </h1>

            <!-- Search Card -->
            <form class="bg-gray-100 sm:p-6 space-y-4 mt-6 max-w-5xl mx-auto">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="kendaraan" class="block text-xs font-medium mb-1">Kendaraan</label>
                        <input type="text" id="kendaraan" placeholder="Kendaraan apa yang mau anda cari?" class="w-full text-xs h-7 px-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-500" />
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="tanggalMulai" class="block text-xs font-medium mb-1">Tanggal Mulai</label>
                        <input type="date" id="tanggalMulai" value="2025-03-21" class="w-full text-xs h-7 px-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-500" />
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="tanggalSelesai" class="block text-xs font-medium mb-1">Tanggal Selesai</label>
                        <input type="date" id="tanggalSelesai" value="2025-03-23" class="w-full text-xs h-7 px-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-500" />
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-orange-600 text-[10px] font-semibold text-white px-2 py-[3px] rounded hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500">Cari Kendaraan</button>
                </div>
            </form>

            <!-- Product Card -->
            <div class="max-w-7xl mx-auto mt-6 space-y-4 px-4 sm:px-6">
                <div class="bg-gray-100 p-4 flex flex-wrap items-center justify-between gap-4 hover:scale-[1.02]">
                    <div class="flex items-center gap-3">
                        <div aria-label="Placeholder for Toyota Calya 2023 vehicle image" class="w-[120px] h-[90px] bg-gray-300 flex items-center justify-center text-xs text-gray-600 select-none">Gambar Kendaraan</div>
                        <div>
                            <div class="text-[12px] font-bold mb-1">Toyota Calya 2023</div>
                            <div class="text-[11px]">Deskripsi<br />Toyota Calya 2023</div>
                        </div>
                    </div>
                    <div class="text-right min-w-[140px]">
                        <div class="text-[10px] font-semibold">Harga 1 Hari</div>
                        <div class="text-[12px] font-bold mb-1">Rp. 420.000,00</div>
                        <button class="bg-orange-600 text-[10px] font-semibold text-white px-2 py-[3px] rounded hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500">Sewa Sekarang</button>
                    </div>
                </div>

                <div class="bg-gray-100 p-4 flex flex-wrap items-center justify-between gap-4 hover:scale-[1.02]">
                    <div class="flex items-center gap-3">
                        <div aria-label="Placeholder for Honda Beat 2018 vehicle image" class="w-[120px] h-[90px] bg-gray-300 flex items-center justify-center text-xs text-gray-600 select-none">Gambar Kendaraan</div>
                        <div>
                            <div class="text-[12px] font-bold mb-1">Honda Beat 2018</div>
                            <div class="text-[11px]">Deskripsi<br />Honda Beat 2018</div>
                        </div>
                    </div>
                    <div class="text-right min-w-[140px]">
                        <div class="text-[10px] font-semibold">Harga 1 Hari</div>
                        <div class="text-[12px] font-bold mb-1">Rp. 120.000,00</div>
                        <button class="bg-orange-600 text-[10px] font-semibold text-white px-2 py-[3px] rounded hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500">Sewa Sekarang</button>
                    </div>
                </div>

                <div class="bg-gray-100 p-4 flex flex-wrap items-center justify-between gap-4 hover:scale-[1.02]">
                    <div class="flex items-center gap-3">
                        <div aria-label="Placeholder for All New Avanza G 2023 vehicle image" class="w-[120px] h-[90px] bg-gray-300 flex items-center justify-center text-xs text-gray-600 select-none">Gambar Kendaraan</div>
                        <div>
                            <div class="text-[12px] font-bold mb-1">All New Avanza G 2023</div>
                            <div class="text-[11px]">Deskripsi<br />All New Avanza G 2023</div>
                        </div>
                    </div>
                    <div class="text-right min-w-[140px]">
                        <div class="text-[10px] font-semibold">Harga 1 Hari</div>
                        <div class="text-[12px] font-bold mb-1">Rp. 450.000,00</div>
                        <button class="bg-orange-600 text-[10px] font-semibold text-white px-2 py-[3px] rounded hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500">Sewa Sekarang</button>
                    </div>
                </div>
            </div> 
        </main>

        <!-- Footer -->
        @include('components.footer')

    </div> 
</body>

