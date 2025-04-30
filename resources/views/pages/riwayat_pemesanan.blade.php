@extends('layouts.app')

@section('content')
<div class="relative w-screen min-h-screen overflow-hidden">
    <div id="moving-bg" 
        class="absolute top-[-5%] left-[-5%] w-[110%] h-[110%] bg-cover bg-center transition-transform duration-1000 -z-10"
        style="background-image: url('{{ asset('images/background.png') }}');">
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 pt-10">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-6xl mx-auto text-base">
            <div class="flex items-center mb-6">
                <h2 class="text-2xl font-bold">Riwayat <span class="text-orange-500">Pesanan</span></h2>
            </div>
            
            <p class="text-gray-700 mb-6">Lihat dan kelola semua pesanan Anda</p>
            
            <!-- Filter Tabs -->
            <div class="flex rounded-md border border-gray-300 mb-8 text-sm">
                <div class="flex-1 text-center py-3 bg-orange-500 text-white font-medium rounded-l-md cursor-pointer">Semua</div>
                <div class="flex-1 text-center py-3 text-gray-700 font-medium cursor-pointer">Belum Dibayar</div>
                <div class="flex-1 text-center py-3 text-gray-700 font-medium cursor-pointer">Diproses</div>
                <div class="flex-1 text-center py-3 text-gray-700 font-medium cursor-pointer">Selesai</div>
                <div class="flex-1 text-center py-3 text-gray-700 font-medium rounded-r-md cursor-pointer">Dibatalkan</div>
            </div>
            
            <!-- Order Items -->
            <div class="space-y-6">
                <!-- Order Item 1 -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="text-lg font-semibold">Pesanan #1</div>
                            <div class="text-gray-500 text-sm">15 April 2025</div>
                            <div class="inline-block bg-orange-500 text-black text-xs px-3 py-1 rounded-full mt-2">Diproses</div>
                        </div>
                        <div class="flex items-center justify-center flex-1">
                            <div class="text-gray-700 text-base">Honda Beat 2018</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-lg">Rp. 120.000,00</div>
                            <button onclick="showPaymentModal()" class="bg-orange-500 text-white px-4 py-2 rounded-md mt-2 text-sm hover:bg-orange-600">
                            Detail
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Order Item 2 -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="text-lg font-semibold">Pesanan #2</div>
                            <div class="text-gray-500 text-sm">20 April 2025</div>
                            <div class="inline-block bg-green-500 text-black text-xs px-3 py-1 rounded-full mt-2">Diproses</div>
                        </div>
                        <div class="flex items-center justify-center flex-1">
                            <div class="text-gray-700 text-base">Toyota Calya 2023</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-lg">Rp. 420.000,00</div>
                            <button class="bg-orange-500 text-white px-4 py-2 rounded-md mt-2 text-sm hover:bg-orange-600">Detail</button>
                        </div>
                    </div>
                </div>

                <!-- Order Item 3 -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="text-lg font-semibold">Pesanan #3</div>
                            <div class="text-gray-500 text-sm">22 April 2025</div>
                            <div class="inline-block bg-red-500 text-black text-xs px-3 py-1 rounded-full mt-2">Dibatalkan</div>
                        </div>
                        <div class="flex items-center justify-center flex-1">
                            <div class="text-gray-700 text-base">All New Avanza G 2023</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-lg">Rp. 450.000,00</div>
                            <button class="bg-orange-500 text-white px-4 py-2 rounded-md mt-2 text-sm hover:bg-orange-600">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Back Button -->
            <div class="flex justify-end mt-10">
                <button onclick="history.back()" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-400">
                    Kembali
                </button>
            </div>

            <!-- Modal Popup -->
            @include('components.pop-up_detail')

            <!-- Script untuk menampilkan modal -->
            <script>
            function showPaymentModal() {
                document.getElementById('paymentModal').classList.remove('hidden');
            }
            </script>

        </div>
    </div>
</div>
@endsection
