@extends('layouts.app')

@section('content')
<style>
    * {
        font-family: 'Poppins', sans-serif;
    }

    .main-container {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 50%, #2d2d2d 100%);
        min-height: 100vh;
    }

    .gradient-orange {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff8c42 100%);
        position: relative;
        overflow: hidden;
    }

    .gradient-orange::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }

    .gradient-orange:hover::before {
        left: 100%;
    }

    .text-gradient {
        background: linear-gradient(135deg, #ff6b35, #f7931e, #ff8c42);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 200% 200%;
        animation: gradientShift 3s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .glow-orange {
        box-shadow: 0 0 30px rgba(255, 107, 53, 0.3), 0 0 60px rgba(255, 107, 53, 0.1);
    }

    .glow-orange-strong {
        box-shadow: 0 0 40px rgba(255, 107, 53, 0.6), 0 0 80px rgba(255, 107, 53, 0.3);
    }

    .card-hover {
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
        position: relative;
    }

    .card-hover:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 25px 50px rgba(255, 107, 53, 0.3);
    }

    .glass-effect {
        background: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 107, 53, 0.2);
    }

    .input-glow {
        transition: all 0.3s ease;
        position: relative;
    }

    .input-glow:focus {
        box-shadow: 0 0 0 2px rgba(255, 107, 53, 0.3), 0 0 20px rgba(255, 107, 53, 0.2);
        border-color: #ff6b35;
        transform: translateY(-2px);
    }

    .pulse-animation {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .floating {
        animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .neon-border {
        border: 2px solid transparent;
        background: linear-gradient(45deg, #ff6b35, #f7931e) border-box;
        -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: exclude;
        mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
        mask-composite: exclude;
    }

    .sparkle {
        position: relative;
        overflow: hidden;
    }

    .sparkle::after {
        display: none;
    }

    @keyframes sparkle {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .summary-card {
        background: linear-gradient(145deg, rgba(0, 0, 0, 0.9), rgba(20, 20, 20, 0.9));
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 107, 53, 0.3);
        position: relative;
    }

    .summary-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #ff6b35, #f7931e, #ff8c42);
        border-radius: 12px 12px 0 0;
    }

    .icon-bounce {
        animation: iconBounce 2s ease-in-out infinite;
    }

    @keyframes iconBounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .text-shadow {
        text-shadow: 0 0 10px rgba(255, 107, 53, 0.5);
    }

    .detail-item {
        transition: all 0.3s ease;
        padding: 8px;
        border-radius: 6px;
    }

    .detail-item:hover {
        background: rgba(255, 107, 53, 0.1);
        transform: translateX(5px);
    }
</style>

<div class="main-container min-h-screen pt-32 pb-20 px-6 relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-orange-500 rounded-full filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-orange-400 rounded-full filter blur-3xl opacity-20 animate-pulse delay-1000"></div>
        <div class="absolute top-3/4 left-1/2 w-64 h-64 bg-yellow-600 rounded-full filter blur-3xl opacity-15 animate-pulse delay-500"></div>
    </div>

    <div class="max-w-6xl mx-auto relative z-10">
        <!-- Header -->
        <div class="text-center mb-12 floating">
            <h1 class="text-6xl font-bold text-gradient mb-4 text-shadow">Pembayaran</h1>
            <div class="w-24 h-1 bg-gradient-to-r from-orange-400 to-yellow-400 mx-auto rounded-full"></div>
            <p class="text-gray-300 mt-4 text-lg">Selesaikan pembayaran Anda dengan aman dan mudah</p>
        </div>

        <div class="glass-effect rounded-3xl p-12 card-hover glow-orange sparkle">
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- FORM PEMBAYARAN -->
                <div class="space-y-8">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-gradient mb-2">Informasi Pembayaran</h3>
                        <p class="text-gray-400">Masukkan detail untuk melanjutkan</p>
                    </div>

                    <form method="POST" action="{{ route('payment.process') }}" class="space-y-8">
                        @csrf

                        <div class="relative">
                            <label class="block mb-3 text-lg font-semibold text-gray-200 flex items-center">
                                <i class="fas fa-user mr-2 text-orange-400 icon-bounce"></i>
                                Nama Pemesan
                            </label>
                            <input type="text" name="nama" 
                                   class="w-full px-6 py-4 rounded-2xl bg-black/60 border border-gray-700 focus:outline-none text-white input-glow backdrop-blur-sm" 
                                   value="{{ isset($order['nama']) ? $order['nama'] : '' }}" 
                                   {{ isset($order['nama']) ? 'readonly' : 'required' }}>
                        </div>

                        <div class="relative">
                            <label class="block mb-3 text-lg font-semibold text-gray-200 flex items-center">
                                <i class="fas fa-envelope mr-2 text-orange-400 icon-bounce"></i>
                                Email
                            </label>
                            <input type="email" name="email" 
                                   class="w-full px-6 py-4 rounded-2xl bg-black/60 border border-gray-700 focus:outline-none text-white input-glow backdrop-blur-sm" 
                                   value="{{ isset($order['email']) ? $order['email'] : '' }}" 
                                   {{ isset($order['email']) ? 'readonly' : 'required' }}>
                        </div>

                        <div class="text-center pt-6">
                            <button type="submit" class="gradient-orange text-black font-bold py-4 px-12 rounded-full transition-all duration-300 hover:glow-orange-strong hover:scale-110 pulse-animation text-lg relative z-10">
                                <i class="fas fa-credit-card mr-3 icon-bounce"></i> 
                                Bayar Sekarang
                            </button>
                        </div>
                    </form>
                </div>

                <!-- RINGKASAN PEMBAYARAN -->
                <div class="summary-card rounded-2xl p-8 shadow-2xl">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-gradient mb-2">Ringkasan Pembayaran</h3>
                        <div class="w-16 h-1 bg-gradient-to-r from-orange-400 to-yellow-400 mx-auto rounded-full"></div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="detail-item">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 flex items-center">
                                    <i class="fas fa-hashtag mr-2 text-orange-400"></i>
                                    ID Pemesanan
                                </span>
                                <span class="font-semibold text-white">{{ $invoice }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 flex items-center">
                                    <i class="fas fa-user mr-2 text-orange-400"></i>
                                    Nama
                                </span>
                                <span class="font-semibold text-white">{{ $order->nama }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 flex items-center">
                                    <i class="fas fa-envelope mr-2 text-orange-400"></i>
                                    Email
                                </span>
                                <span class="font-semibold text-white text-sm">{{ $order->email }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 flex items-center">
                                    <i class="fas fa-truck mr-2 text-orange-400"></i>
                                    Metode Pengambilan
                                </span>
                                <span class="font-semibold text-white">{{ ucfirst($order->pickup_method) }}</span>
                            </div>
                        </div>

                        @if($order->pickup_method === 'delivery')
                            <div class="detail-item">
                                <div class="space-y-1">
                                    <span class="text-gray-400 flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2 text-orange-400"></i>
                                        Alamat Pengiriman
                                    </span>
                                    <div class="text-white text-sm pl-6 leading-relaxed">
                                        {{ $order->alamat_detail }},<br>
                                        {{ $order->kelurahan }}, {{ $order->kecamatan }},<br>
                                        {{ $order->kabupaten }}, {{ $order->provinsi }}<br>
                                        {{ $order->kodepos }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="detail-item">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 flex items-center">
                                    <i class="fas fa-motorcycle mr-2 text-orange-400"></i>
                                    Kendaraan
                                </span>
                                <span class="font-semibold text-white">{{ $order->nama_kendaraan }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 flex items-center">
                                    <i class="fas fa-calendar mr-2 text-orange-400"></i>
                                    Tanggal Sewa
                                </span>
                                <span class="font-semibold text-white text-sm">{{ $order->tanggal_mulai }} s/d {{ $order->tanggal_selesai }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 flex items-center">
                                    <i class="fas fa-clock mr-2 text-orange-400"></i>
                                    Durasi
                                </span>
                                <span class="font-semibold text-white">{{ $order->durasi }} Hari</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-600 pt-4 mt-6">
                            <div class="detail-item neon-border rounded-xl p-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-orange-400 font-bold text-lg flex items-center">
                                        <i class="fas fa-money-bill-wave mr-2"></i>
                                        Total Harga
                                    </span>
                                    <span class="font-bold text-2xl text-gradient">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-12 text-center">
                <div class="flex items-center justify-center space-x-2 text-gray-400 text-sm">
                    <i class="fas fa-shield-alt text-green-400"></i>
                    <span>Pembayaran Anda aman dan terenkripsi</span>
                    <span class="mx-2">•</span>
                    <i class="fas fa-headset text-blue-400"></i>
                    <span>Layanan pelanggan 24/7</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection