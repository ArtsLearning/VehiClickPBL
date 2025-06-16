@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Poppins', serif;
            }
            .text-gradient {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(255, 107, 53, 0.2);
        }
        .vehicle-card {
            background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
            border: 1px solid #333;
        }
        
        .vehicle-card:hover {
            border-color: #ff6b35;
        }
        .availability-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .available {
            background: #10b981;
            color: white;
        }
        
        .rented {
            background: #ef4444;
            color: white;
        }
        
        .maintenance {
            background: #f59e0b;
            color: white;
        }
    </style>

    <div class="bg-[#0a0e1a] min-h-screen text-white py-20">
        <div class="max-w-7xl mx-auto px-4 py-10">
    
            <!-- Title -->
            <h1 class="text-center text-white text-2xl font-extrabold mb-8">
                Produk
            </h1>

            <!-- Search Card -->
            <form action="#" class="bg-[#1c2533] rounded-lg p-6 max-w-5xl mx-auto mb-10 grid grid-cols-1 md:grid-cols-3 gap-6" method="get">
                <div class="col-span-1 md:col-span-3">
                    <label for="kendaraan" class="block text-xs font-medium mb-1 text-white">Kendaraan</label>
                    <input type="text" id="kendaraan" placeholder="Kendaraan apa yang mau anda cari?" class="w-full text-xs h-7 px-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-600">
                </div>
                <div>
                    <label for="tanggalMulai" class="block text-xs font-medium mb-1 text-white">Tanggal Mulai</label>
                    <input type="date" id="tanggalMulai" value="dd-mm-yyyy" class="w-full text-xs h-7 px-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-600">
                </div>
                <div>
                    <label for="tanggalSelesai" class="block text-xs font-medium mb-1 text-white">Tanggal Selesai</label>
                    <input type="date" id="tanggalSelesai" value="dd-mm-yyyy" class="w-full text-xs h-7 px-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-500 text-gray-600">
                </div>
                <div class="flex items-end justify-end">
                    <button type="submit" class="bg-[#f97316] text-xs font-semibold rounded px-4 py-1 hover:bg-[#e07b2f] transition-colors">Cari Kendaraan</button>
                </div>
            </form>
        
            <!-- Product Card -->
            @include('components.product_card')

            <!-- Footer -->
            @include('components.footer')

        </div>     
    </div>

@endsection

        <!-- <main class="relative max-w-6xl mx-auto pt-36 px-4 sm:px-6 md:px-10 pb-14">
            Title
            <h1 class="text-center text-2xl sm:text-3xl md:text-4xl -mt-16 font-extrabold mb-6 text-white">
                Produk
            </h1>

            Search Card
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

            Product Card 1
            <div class="max-w-7xl mx-auto mt-6 space-y-4 px-4 sm:px-6">
                <a href="/detail_kendaraan" class="block">
                    <div class="bg-gray-100 p-4 flex flex-wrap items-center justify-between gap-4 hover:scale-[1.02] transition-transform">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/calya2023.png') }}" alt="Toyota Calya 2023" class="w-[120px] h-[90px] object-cover rounded bg-gray-100" />
                            <div>
                                <div class="text-[12px] font-bold mb-1">Toyota Calya 2023</div>
                                <div class="text-[11px]">Deskripsi<br />Toyota Calya 2023</div>
                            </div>
                        </div>
                        <div class="text-right min-w-[140px]">
                            <div class="text-[10px] font-semibold">Harga 1 Hari</div>
                            <div class="text-[12px] font-bold mb-1">Rp. 420.000,00</div>
                            <span class="bg-orange-600 text-[10px] font-semibold text-white px-2 py-[3px] rounded hover:bg-orange-700">
                                Sewa Sekarang
                            </span>
                        </div>
                    </div>
                </a>

                Product Card 2
                <a href="/detail_kendaraan" class="block">
                    <div class="bg-gray-100 p-4 flex flex-wrap items-center justify-between gap-4 hover:scale-[1.02] transition-transform">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/beat2018.png') }}" alt="Honda Beat 2018" class="w-[120px] h-[90px] object-cover rounded bg-gray-100" />
                            <div>
                                <div class="text-[12px] font-bold mb-1">Honda Beat 2018</div>
                                <div class="text-[11px]">Deskripsi<br />Honda Beat 2018</div>
                            </div>
                        </div>
                        <div class="text-right min-w-[140px]">
                            <div class="text-[10px] font-semibold">Harga 1 Hari</div>
                            <div class="text-[12px] font-bold mb-1">Rp. 120.000,00</div>
                            <span class="bg-orange-600 text-[10px] font-semibold text-white px-2 py-[3px] rounded hover:bg-orange-700">
                                Sewa Sekarang
                            </span>
                        </div>
                    </div>
                </a>

                Product Card 3
                <a href="/detail_kendaraan" class="block">
                    <div class="bg-gray-100 p-4 flex flex-wrap items-center justify-between gap-4 hover:scale-[1.02] transition-transform">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/avanza2023.png') }}" alt="All New Avanza G 2023" class="w-[120px] h-[90px] object-cover rounded bg-gray-100" />
                            <div>
                                <div class="text-[12px] font-bold mb-1">All New Avanza G 2023</div>
                                <div class="text-[11px]">Deskripsi<br />All New Avanza G 2023</div>
                            </div>
                        </div>
                        <div class="text-right min-w-[140px]">
                            <div class="text-[10px] font-semibold">Harga 1 Hari</div>
                            <div class="text-[12px] font-bold mb-1">Rp. 450.000,00</div>
                            <span class="bg-orange-600 text-[10px] font-semibold text-white px-2 py-[3px] rounded hover:bg-orange-700">
                                Sewa Sekarang
                            </span>
                        </div>
                    </div>
                </a>

            </div> 
        </main> -->