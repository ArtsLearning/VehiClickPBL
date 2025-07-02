@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    
    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        overflow-x: hidden;
    }
    
    .gradient-orange {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff8c42 100%);
    }
    
    .gradient-dark {
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #2a2a2a 100%);
    }
    
    .gradient-bg {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 25%, #2d2d2d 50%, #1a1a1a 75%, #000000 100%);
        position: relative;
        overflow: hidden;
    }
    
    .gradient-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 80%, rgba(255, 107, 53, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(255, 140, 66, 0.1) 0%, transparent 50%);
        animation: gradientShift 8s ease-in-out infinite;
    }
    
    @keyframes gradientShift {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 0.8; }
    }
    
    .text-gradient {
        background: linear-gradient(135deg, #ff6b35, #f7931e, #ff8c42);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientText 3s ease-in-out infinite;
    }
    
    @keyframes gradientText {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .glow-orange {
        box-shadow: 0 0 30px rgba(255, 107, 53, 0.4);
    }
    
    .glow-orange-strong {
        box-shadow: 0 0 50px rgba(255, 107, 53, 0.6), 0 0 100px rgba(255, 107, 53, 0.2);
    }
    
    .card-payment {
        background: linear-gradient(145deg, #1a1a1a 0%, #2d2d2d 100%);
        border: 1px solid rgba(255, 107, 53, 0.2);
        backdrop-filter: blur(10px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .card-payment::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 107, 53, 0.1), transparent);
        transition: left 0.6s;
    }
    
    .card-payment:hover::before {
        left: 100%;
    }
    
    .card-payment:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 30px 60px rgba(255, 107, 53, 0.3);
        border-color: rgba(255, 107, 53, 0.5);
    }
    
    .info-card {
        background: linear-gradient(145deg, #0f0f0f 0%, #1a1a1a 100%);
        border: 1px solid rgba(255, 107, 53, 0.1);
        transition: all 0.3s ease;
    }
    
    .info-card:hover {
        border-color: rgba(255, 107, 53, 0.3);
        transform: translateX(5px);
    }
    
    .btn-pay {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff8c42 100%);
        border: none;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .btn-pay::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s;
    }
    
    .btn-pay:hover::before {
        left: 100%;
    }
    
    .btn-pay:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(255, 107, 53, 0.4);
    }
    
    .btn-pay:active {
        transform: translateY(0);
    }
    
    .pulse-glow {
        animation: pulseGlow 2s infinite;
    }
    
    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 0 20px rgba(255, 107, 53, 0.3); }
        50% { box-shadow: 0 0 40px rgba(255, 107, 53, 0.6); }
    }
    
    .slide-in-up {
        animation: slideInUp 0.8s ease-out;
    }
    
    .slide-in-left {
        animation: slideInLeft 0.8s ease-out;
    }
    
    .slide-in-right {
        animation: slideInRight 0.8s ease-out;
    }
    
    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    .floating-particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    
    .particle {
        position: absolute;
        background: #ff6b35;
        border-radius: 50%;
        opacity: 0.3;
        animation: particleFloat 12s infinite linear;
    }
    
    .particle:nth-child(1) { left: 10%; animation-delay: 0s; width: 4px; height: 4px; }
    .particle:nth-child(2) { left: 20%; animation-delay: 2s; width: 6px; height: 6px; }
    .particle:nth-child(3) { left: 30%; animation-delay: 4s; width: 3px; height: 3px; }
    .particle:nth-child(4) { left: 40%; animation-delay: 6s; width: 5px; height: 5px; }
    .particle:nth-child(5) { left: 50%; animation-delay: 8s; width: 4px; height: 4px; }
    .particle:nth-child(6) { left: 60%; animation-delay: 10s; width: 6px; height: 6px; }
    .particle:nth-child(7) { left: 70%; animation-delay: 1s; width: 3px; height: 3px; }
    .particle:nth-child(8) { left: 80%; animation-delay: 3s; width: 5px; height: 5px; }
    .particle:nth-child(9) { left: 90%; animation-delay: 5s; width: 4px; height: 4px; }
    
    @keyframes particleFloat {
        0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
        10% { opacity: 0.3; }
        90% { opacity: 0.3; }
        100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
    }
    
    .icon-bounce {
        animation: iconBounce 2s infinite;
    }
    
    @keyframes iconBounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }
    
    .price-highlight {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ff6b35, #f7931e, #ff8c42);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 0 30px rgba(255, 107, 53, 0.5);
        animation: priceGlow 2s ease-in-out infinite alternate;
    }
    
    @keyframes priceGlow {
        from { filter: brightness(1); }
        to { filter: brightness(1.2); }
    }
    
    .loading-spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 2px solid #ffffff;
        border-top: 2px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-right: 8px;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .btn-pay.loading .loading-spinner {
        display: inline-block;
    }
    
    .btn-pay.loading {
        pointer-events: none;
        opacity: 0.7;
    }

    .rating-stars {
    direction: rtl; /* Balik arah agar hover bekerja dengan benar */
}
.rating-stars label {
    font-size: 2.5rem; /* Ukuran bintang */
    color: #4B5563; /* Warna bintang mati (abu-abu) */
    cursor: pointer;
    transition: color 0.2s ease-in-out;
}
.rating-stars input:checked ~ label,
.rating-stars:not(:checked) > label:hover,
.rating-stars:not(:checked) > label:hover ~ label {
    color: #FBBF24; /* Warna bintang aktif (kuning) */
}
.rating-stars input:checked + label:hover,
.rating-stars input:checked ~ label:hover,
.rating-stars label:hover ~ input:checked ~ label,
.rating-stars input:checked ~ label:hover ~ label {
    color: #F59E0B; /* Warna bintang hover saat sudah dipilih (kuning lebih gelap) */
}

/* ===== DESAIN TOMBOL AKSI BARU ===== */

/* Tombol Aksi Utama (Seperti Bayar Sekarang) */
.btn-primary-action {
    background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
    border: none;
    color: white;
    font-weight: 600;
    padding: 14px 28px;
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    cursor: pointer;
    box-shadow: 
        0 4px 15px rgba(249, 115, 22, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px; /* Jarak antara ikon dan teks */
}

.btn-primary-action:hover {
    transform: translateY(-3px);
    box-shadow: 
        0 8px 25px rgba(249, 115, 22, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

/* Tombol Aksi Destruktif (Seperti Batalkan Pesanan) */
.btn-destructive-action {
    background-color: transparent;
    border: none;
    color: #9ca3af; /* Warna abu-abu netral */
    font-weight: 600;
    padding: 10px 20px;
    border-radius: 12px;
    transition: all 0.3s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-destructive-action:hover {
    background-color: rgba(239, 68, 68, 0.1); /* Latar merah transparan saat hover */
    color: #ef4444; /* Teks merah saat hover */
}
</style>
<div class="min-h-screen pt-24 pb-10 px-4 bg-gradient-to-br from-gray-900 via-black to-gray-800 text-white relative overflow-hidden bg-pattern">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-orange-500/10 to-transparent"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-500/5 rounded-full blur-3xl"></div>
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-orange-400/5 rounded-full blur-2xl"></div>
    </div>

    <div class="max-w-5xl mx-auto relative z-10">
        <div class="text-center mb-12 fade-in-up">
            <h2 class="text-5xl font-bold mb-4 gradient-text">
                Riwayat Pemesanan
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-orange-400 to-orange-600 mx-auto rounded-full glow-effect"></div>
        </div>

        <form method="GET" action="{{ route('riwayat') }}" class="mb-8 text-center slide-in-left">
            <div class="inline-block relative">
                <select name="status" onchange="this.form.submit()" 
                        class="select-enhanced appearance-none px-6 py-3 pr-12 cursor-pointer">
                    <option value="all">🔍 Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                    <option value="process" {{ request('status') == 'process' ? 'selected' : '' }}>⚙️ Diproses</option>
                    <option value="disewa" {{ request('status') == 'disewa' ? 'selected' : '' }}> 🔑 Disewa</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>✅ Selesai</option>
                    <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>❌ Dibatalkan</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                    <svg class="w-5 h-5 text-orange-500 pulse-animation" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </form>

        @forelse($pemesanans as $index => $order)
        <div class="card-enhanced p-8 rounded-2xl mb-6 shadow-2xl relative slide-in-right" style="animation-delay: {{ $index * 0.1 }}s;">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-orange-500/10 to-transparent rounded-full blur-xl float-animation"></div>
            
            <div class="flex flex-col md:flex-row md:justify-between md:items-center relative z-10">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-2 h-8 bg-gradient-to-b from-orange-400 to-orange-600 rounded-full glow-effect"></div>
                        <h3 class="text-2xl font-bold text-orange-400 gradient-text">#INV-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</h3>
                    </div>
                    
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-5 h-5 text-orange-500 pulse-animation" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-300 font-medium">{{ \Carbon\Carbon::parse($order->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($order->tanggal_selesai)->format('d M Y') }}</p>
                    </div>
                    
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7a4 4 0 118 0v1h4a2 2 0 012 2v3a2 2 0 01-2 2H6a2 2 0 01-2-2v-3a2 2 0 012-2h4V7z"></path>
                        </svg>
                        <p class="text-white text-lg font-semibold">{{ $order->nama_kendaraan }}</p>
                    </div>
                    
                    {{-- ========================================================== --}}
                    {{-- ================= AWAL PENAMBAHAN PLAT NOMOR ================= --}}
                    {{-- ========================================================== --}}
                    <div class="flex items-center gap-2 -mt-2 mb-4 pl-7">
                        <span class="text-xs font-mono tracking-wider text-gray-300 bg-gray-700/50 px-3 py-1 rounded-md border border-gray-600">
                            {{ $order->barang->nomor_plat ?? 'N/A' }}
                        </span>
                    </div>
                    {{-- ========================================================== --}}
                    {{-- ================= AKHIR PENAMBAHAN PLAT NOMOR ================ --}}
                    {{-- ========================================================== --}}
                    
                    <div class="info-grid mb-4">
                        <div class="info-card">
                            <p class="text-gray-400 text-sm">Durasi Rental</p>
                            <p class="text-orange-400 font-bold text-lg">{{ $order->durasi }} hari</p>
                        </div>
                        <div class="info-card">
                            <p class="text-gray-400 text-sm">Total Pembayaran</p>
                            <p class="text-green-400 font-bold text-lg">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    
                    <div class="inline-flex items-center gap-2">
                        <span class="text-sm font-medium text-gray-300">Status:</span>
                        <span class="status-badge 
                            {{ $order->status == 'pending' ? 'status-pending' : 
                                ($order->status == 'process' ? 'status-process' :
                                ($order->status == 'disewa' ? 'status-onrent' :
                                ($order->status == 'completed' ? 'status-completed' : 'status-canceled'))) }}">
                            {{ $order->status == 'pending' ? '⏳ Pending' : 
                                ($order->status == 'process' ? '⚙️ Diproses' :
                                ($order->status == 'disewa' ? '🔑 Disewa' : 
                                ($order->status == 'completed' ? '✅ Selesai' : '❌ Dibatalkan'))) }}
                        </span>
                    </div>
                </div>

                <div class="mt-6 md:mt-0 md:ml-6 flex-shrink-0 flex flex-col items-center justify-center gap-4 w-full md:w-auto">

                    {{-- === TOMBOL AKSI UTAMA === --}}
                    @if($order->status == 'pending')
                        <form method="POST" action="{{ route('payment.snap', $order->id) }}" class="w-full">
                            @csrf
                            <button type="submit" class="btn-primary-action w-full">
                                <i class="fas fa-credit-card"></i>
                                <span>Bayar Sekarang</span>
                            </button>
                        </form>
                    
                    @elseif($order->status == 'completed' && !$ulasanDiberikan->contains($order->id))
                        {{-- Tombol Beri Ulasan --}}
                        <button type="button" 
                                class="btn-enhanced group relative overflow-hidden tombol-beri-ulasan w-full"
                                style="background: linear-gradient(135deg, #10B981 0%, #34D399 100%); box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);"
                                data-pesanan-id="{{ $order->id }}"
                                data-produk-id="{{ $order->barang_id }}"
                                data-nama-produk="{{ $order->nama_kendaraan }}">
                            <div class="relative flex items-center justify-center gap-2 z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                Beri Ulasan
                            </div>
                        </button>
                    @elseif($ulasanDiberikan->contains($order->id))
                         {{-- Tombol Ulasan Diberikan --}}
                        <button class="btn-enhanced group relative overflow-hidden w-full" disabled style="background: #4B5563; cursor: not-allowed; box-shadow: none;">
                            <div class="relative flex items-center justify-center gap-2 z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Ulasan Diberikan
                            </div>
                        </button>
                    @endif
                
                    {{-- === TOMBOL AKSI KEDUA (LACAK / BATAL) === --}}
                    @if($order->status == 'pending')
                        {{-- Tombol Batalkan --}}
                        <form method="POST" action="{{ route('pesanan.cancel', $order->id) }}" class="cancel-form w-full">
                            @csrf
                            <button type="submit" class="btn-destructive-action w-full">
                                <i class="fas fa-times-circle"></i>
                                <span>Batalkan</span>
                            </button>
                        </form>
                    @elseif($order->status != 'canceled')
                         {{-- Tombol Lacak --}}
                        <button type="button" 
                                class="tombol-tracking btn-secondary-enhanced group"
                                data-pesanan-id="{{ $order->id }}">
                            <div class="relative flex items-center justify-center gap-2 z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Lacak Pesanan</span>
                            </div>
                        </button>
                    @endif
                </div>
                
            </div>
        </div>
        @empty
        <div class="empty-state fade-in-up">
            <div class="empty-state-icon glow-effect">
                <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <p class="text-gray-400 text-lg mb-2">Belum ada riwayat pemesanan</p>
            <p class="text-gray-500 text-sm">Mulai petualangan Anda dengan menyewa kendaraan!</p>
        </div>
        @endforelse

        <div class="mt-12 text-center">
            <div class="inline-block bg-gray-800/50 backdrop-blur-sm rounded-xl p-2 border border-orange-500/20">
                {{ $pemesanans->links() }}
            </div>
        </div>
    </div>
</div>

<style>
/* ===== CUSTOM VARIABLES ===== */
:root {
    --primary-orange: #f97316;
    --secondary-orange: #ea580c;
    --accent-orange: #fb923c;
    --dark-bg: #0f0f0f;
    --card-bg: rgba(31, 41, 55, 0.8);
    --border-color: rgba(249, 115, 22, 0.2);
    --text-primary: #ffffff;
    --text-secondary: #9ca3af;
    --shadow-glow: rgba(249, 115, 22, 0.3);
}

/* ===== GLOBAL STYLES ===== */
* {
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    background: linear-gradient(135deg, #111827 0%, #000000 50%, #1f2937 100%);
    overflow-x: hidden;
}


/* ===== ANIMATIONS ===== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 0.2;
    }
    50% {
        opacity: 0.4;
    }
}

@keyframes shine {
    0% {
        transform: translateX(-100%) skewX(-12deg);
    }
    100% {
        transform: translateX(200%) skewX(-12deg);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes glow {
    0%, 100% {
        box-shadow: 0 0 20px rgba(249, 115, 22, 0.2);
    }
    50% {
        box-shadow: 0 0 30px rgba(249, 115, 22, 0.4);
    }
}

@keyframes gradientShift {
    0%, 100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* ===== UTILITY CLASSES ===== */
.fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}

.slide-in-left {
    animation: slideInLeft 0.8s ease-out forwards;
}

.slide-in-right {
    animation: slideInRight 0.8s ease-out forwards;
}

.float-animation {
    animation: float 3s ease-in-out infinite;
}

.pulse-animation {
    animation: pulse 2s ease-in-out infinite;
}

.glow-effect {
    animation: glow 2s ease-in-out infinite;
}

/* ===== BACKGROUND PATTERNS ===== */
.bg-pattern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 20%, rgba(249, 115, 22, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(234, 88, 12, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 60%, rgba(251, 146, 60, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

/* ===== GRADIENT TEXT ===== */
.gradient-text {
    background: linear-gradient(135deg, var(--accent-orange) 0%, var(--primary-orange) 50%, var(--secondary-orange) 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% 200%;
    animation: gradientShift 3s ease infinite;
}

/* ===== CARD STYLES ===== */
.card-enhanced {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    background: linear-gradient(135deg, 
        rgba(31, 41, 55, 0.9) 0%, 
        rgba(17, 24, 39, 0.8) 50%, 
        rgba(0, 0, 0, 0.9) 100%);
    border: 1px solid var(--border-color);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.card-enhanced::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent, 
        rgba(249, 115, 22, 0.1), 
        transparent);
    transition: left 0.6s ease;
}

.card-enhanced:hover::before {
    left: 100%;
}

.card-enhanced:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.3),
        0 0 30px rgba(249, 115, 22, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    border-color: rgba(249, 115, 22, 0.5);
}

/* ===== BUTTON STYLES ===== */
.btn-enhanced {
    position: relative;
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
    border: none;
    color: white;
    font-weight: 600;
    padding: 14px 28px;
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    cursor: pointer;
    box-shadow: 
        0 4px 15px rgba(249, 115, 22, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

.btn-enhanced::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent, 
        rgba(255, 255, 255, 0.3), 
        transparent);
    transition: left 0.6s ease;
}

.btn-enhanced:hover::before {
    left: 100%;
}

.btn-enhanced:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 
        0 8px 25px rgba(249, 115, 22, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

.btn-enhanced:active {
    transform: translateY(0) scale(0.98);
}

.btn-secondary-enhanced {
    position: relative;
    background: transparent;
    border: 2px solid var(--border-color);
    color: var(--accent-orange);
    font-weight: 600;
    padding: 8px 20px;
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    cursor: pointer;
}

.btn-secondary-enhanced:hover {
    background: var(--primary-orange);
    border-color: var(--primary-orange);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(249, 115, 22, 0.4);
}

/* ===== SELECT DROPDOWN ===== */
.select-enhanced {
    background: linear-gradient(135deg, 
        rgba(31, 41, 55, 0.9) 0%, 
        rgba(17, 24, 39, 0.9) 100%);
    border: 2px solid var(--border-color);
    color: var(--text-primary);
    padding: 12px 16px;
    border-radius: 12px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.select-enhanced:hover {
    border-color: rgba(249, 115, 22, 0.5);
    box-shadow: 0 0 20px rgba(249, 115, 22, 0.2);
}

.select-enhanced:focus {
    border-color: var(--primary-orange);
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.3);
    outline: none;
}

.select-enhanced option {
    background: rgba(31, 41, 55, 0.95);
    color: var(--text-primary);
    padding: 10px;
}

/* ===== STATUS BADGES ===== */
.status-badge {
    position: relative;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    border: 2px solid;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
}

.status-pending {
    background: rgba(251, 191, 36, 0.2);
    color: #fbbf24;
    border-color: rgba(251, 191, 36, 0.5);
}

.status-process {
    background: rgba(59, 130, 246, 0.2);
    color: #3b82f6;
    border-color: rgba(59, 130, 246, 0.5);
}

.status-completed {
    background: rgba(34, 197, 94, 0.2);
    color: #22c55e;
    border-color: rgba(34, 197, 94, 0.5);
}

.status-canceled {
    background: rgba(239, 68, 68, 0.2);
    color: #ef4444;
    border-color: rgba(239, 68, 68, 0.5);
}

.status-onrent {
    background: rgba(249, 115, 22, 0.2); /* Warna oranye/kuning */
    color: #f97316;
    border-color: rgba(249, 115, 22, 0.5);
}

/* ===== INFO GRID STYLES ===== */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
}

.info-card {
    background: rgba(31, 41, 55, 0.5);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 16px;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
}

.info-card:hover {
    background: rgba(31, 41, 55, 0.7);
    border-color: rgba(249, 115, 22, 0.4);
    transform: translateY(-2px);
}

/* ===== EMPTY STATE ===== */
.empty-state {
    text-align: center;
    padding: 80px 20px;
}

.empty-state-icon {
    width: 120px;
    height: 120px;
    margin: 0 auto 24px;
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.2) 0%, rgba(234, 88, 12, 0.2) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: float 3s ease-in-out infinite;
}

/* ===== PAGINATION STYLES ===== */
.pagination {
    display: flex;
    align-items: center;
    gap: 8px;
    justify-content: center;
}

.pagination .page-item {
    transition: all 0.3s ease;
}

.pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    background: rgba(31, 41, 55, 0.8);
    color: var(--text-secondary);
    border: 1px solid var(--border-color);
    border-radius: 10px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
}

.pagination .page-link:hover {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(249, 115, 22, 0.3);
    border-color: var(--primary-orange);
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
    color: white;
    border-color: var(--primary-orange);
    box-shadow: 0 0 20px rgba(249, 115, 22, 0.4);
}

.pagination .page-item.disabled .page-link {
    background: rgba(31, 41, 55, 0.3);
    color: #6b7280;
    cursor: not-allowed;
    opacity: 0.5;
}

.pagination .page-item.disabled .page-link:hover {
    background: rgba(31, 41, 55, 0.3);
    color: #6b7280;
    transform: none;
    box-shadow: none;
}

/* ===== LOADING STATES ===== */
.loading {
    opacity: 0.7;
    pointer-events: none;
    position: relative;
}

.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid transparent;
    border-top: 2px solid var(--primary-orange);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .card-enhanced {
        margin: 16px 0;
        padding: 20px !important;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .btn-enhanced {
        width: 100%;
        margin-top: 16px;
    }
    
    .pagination .page-link {
        width: 40px;
        height: 40px;
        font-size: 14px;
    }
    
    .gradient-text {
        font-size: 3rem !important;
    }
}

@media (max-width: 480px) {
    .gradient-text {
        font-size: 2.5rem !important;
    }
    
    .empty-state-icon {
        width: 80px;
        height: 80px;
    }
    
    .pagination {
        gap: 4px;
    }
    
    .pagination .page-link {
        width: 36px;
        height: 36px;
        font-size: 12px;
    }
    
    .card-enhanced {
        padding: 16px !important;
    }
    
    .info-card {
        padding: 12px;
    }
}

/* ===== ENHANCED FEATURES ===== */
.order-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
    color: white;
    padding: 16px 24px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(249, 115, 22, 0.4);
    z-index: 1000;
    transform: translateX(100%);
    transition: transform 0.3s ease;
}

.order-notification.show {
    transform: translateX(0);
}

.filter-badge {
    display: inline-block;
    background: rgba(249, 115, 22, 0.2);
    color: var(--primary-orange);
    padding: 4px 12px;
    border-radius: 16px;
    font-size: 0.75rem;
    font-weight: 600;
    margin-left: 8px;
    border: 1px solid rgba(249, 115, 22, 0.3);
}

.search-highlight {
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.3) 0%, rgba(234, 88, 12, 0.3) 100%);
    padding: 2px 6px;
    border-radius: 4px;
}

/* ===== ACCESSIBILITY ENHANCEMENTS ===== */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}

/* ===== PRINT STYLES ===== */
@media print {
    .card-enhanced {
        background: white !important;
        color: black !important;
        box-shadow: none !important;
        border: 1px solid #ccc !important;
    }
    
    .btn-enhanced,
    .pagination {
        display: none !important;
    }
    
    .gradient-text {
        color: black !important;
        -webkit-text-fill-color: black !important;
    }
}

/* ===== MODAL & TRACKING STYLES ===== */
#trackingModal.flex {
    display: flex;
}
#trackingModal.hidden {
    display: none;
}
.tracking-item {
    position: relative;
    padding-left: 30px; 
    padding-bottom: 20px;
    border-left: 2px solid var(--border-color);
}
.tracking-item:last-child {
    border-left: 2px solid transparent;
    padding-bottom: 0;
}
.tracking-item::before {
    content: '';
    position: absolute;
    left: -9px;
    top: 4px;
    width: 16px;
    height: 16px;
    background: var(--dark-bg);
    border: 3px solid var(--primary-orange);
    border-radius: 50%;
    z-index: 1;
}

/* KODE BARU: Tombol di dalam Modal Konfirmasi */
.modal-btn {
    padding: 10px 24px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
}
.modal-btn-confirm {
    background-color: #ef4444; /* Merah */
    color: white;
}
.modal-btn-confirm:hover {
    background-color: #dc2626; /* Merah lebih gelap */
}
.modal-btn-cancel {
    background-color: #4b5563; /* Abu-abu */
    color: white;
}
.modal-btn-cancel:hover {
    background-color: #6b7280; /* Abu-abu lebih terang */
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced loading state for forms (KODE LAMA ANDA, TETAP ADA)
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            // Pengecualian untuk form pembatalan agar tidak mengubah teks tombolnya
            if (!this.classList.contains('cancel-form')) {
                const button = this.querySelector('button[type="submit"]');
                if (button) {
                    button.classList.add('loading');
                    button.disabled = true;
                    
                    const originalText = button.innerHTML;
                    button.textContent = 'Processing...';
                    
                    setTimeout(() => {
                        button.classList.remove('loading');
                        button.disabled = false;
                        button.innerHTML = originalText;
                    }, 3000);
                }
            }
        });
    });
    
    // Auto-hide notifications (KODE LAMA ANDA, TETAP ADA)
    const notifications = document.querySelectorAll('.order-notification');
    notifications.forEach(notification => {
        setTimeout(() => {
            notification.classList.add('show');
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }, 5000);
        }, 100);
    });
    
    // Enhanced notification system with close button (KODE LAMA ANDA, TETAP ADA)
    const closeButtons = document.querySelectorAll('.notification-close');
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const notification = this.closest('.order-notification');
            if (notification) {
                notification.classList.remove('show');
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }
        });
    });
    
    // Form validation enhancement (KODE LAMA ANDA, TETAP ADA)
    const inputs = document.querySelectorAll('input[required], textarea[required], select[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('error');
            } else {
                this.classList.remove('error');
            }
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('error') && this.value.trim()) {
                this.classList.remove('error');
            }
        });
    });
    
    // Smooth scroll for anchor links (KODE LAMA ANDA, TETAP ADA)
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // ==========================================================
    // ========== LOGIKA MODAL ULASAN (KODE LAMA ANDA) ==========
    // ==========================================================
    const ulasanModal = document.getElementById('ulasanModal');
    if (ulasanModal) {
        const closeUlasanModalBtn = document.getElementById('closeUlasanModal');
        const tombolBeriUlasan = document.querySelectorAll('.tombol-beri-ulasan');

        const modalIdPesanan = document.getElementById('modal_id_pesanan');
        const modalIdProduk = document.getElementById('modal_id_produk');
        const namaProdukModal = document.getElementById('namaProdukModal');

        tombolBeriUlasan.forEach(button => {
            button.addEventListener('click', function() {
                const pesananId = this.dataset.pesananId;
                const produkId = this.dataset.produkId;
                const namaProduk = this.dataset.namaProduk;

                modalIdPesanan.value = pesananId;
                modalIdProduk.value = produkId;
                namaProdukModal.textContent = `untuk kendaraan "${namaProduk}"`;

                ulasanModal.classList.remove('hidden');
                ulasanModal.classList.add('flex');
            });
        });

        function closeUlasanModal() {
            ulasanModal.classList.add('hidden');
            ulasanModal.classList.remove('flex');
        }

        if (closeUlasanModalBtn) {
            closeUlasanModalBtn.addEventListener('click', closeUlasanModal);
        }

        ulasanModal.addEventListener('click', function(event) {
            if (event.target === ulasanModal) {
                closeUlasanModal();
            }
        });
    }

    // ==========================================================
    // ========== LOGIKA MODAL TRACKING (KODE LAMA ANDA) ========
    // ==========================================================
    const trackingModal = document.getElementById('trackingModal');
    if (trackingModal) {
        const closeTrackingModalBtn = document.getElementById('closeTrackingModal');
        const tombolTracking = document.querySelectorAll('.tombol-tracking');
        const trackingHistoryContainer = document.getElementById('tracking-history-container');
        const trackingOrderId = document.getElementById('tracking-order-id');

        tombolTracking.forEach(button => {
            button.addEventListener('click', function() {
                const pesananId = this.dataset.pesananId;
                
                trackingOrderId.textContent = `#INV-${String(pesananId).padStart(4, '0')}`;
                trackingHistoryContainer.innerHTML = '<p class="text-center text-gray-500">Memuat riwayat...</p>';
                trackingModal.classList.remove('hidden');
                trackingModal.classList.add('flex');

                fetch(`/tracking/${pesananId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        let historyHtml = '';
                        if (data.length > 0) {
                            data.forEach(item => {
                                const date = new Date(item.created_at);
                                const formattedDate = date.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' }).replace(/\./g, ':');
                                historyHtml += `
                                    <div class="tracking-item">
                                        <p class="font-semibold text-white">${item.deskripsi}</p>
                                        <p class="text-sm text-gray-400">${formattedDate}</p>
                                    </div>
                                `;
                            });
                        } else {
                            historyHtml = '<p class="text-center text-gray-500">Belum ada riwayat untuk pesanan ini.</p>';
                        }
                        trackingHistoryContainer.innerHTML = historyHtml;
                    })
                    .catch(error => {
                        console.error('Error fetching tracking history:', error);
                        trackingHistoryContainer.innerHTML = '<p class="text-center text-red-500">Gagal memuat riwayat. Silakan coba lagi.</p>';
                    });
            });
        });

        function closeTrackingModal() {
            trackingModal.classList.add('hidden');
            trackingModal.classList.remove('flex');
        }

        if (closeTrackingModalBtn) {
            closeTrackingModalBtn.addEventListener('click', closeTrackingModal);
        }

        trackingModal.addEventListener('click', function(event) {
            if (event.target === trackingModal) {
                closeTrackingModal();
            }
        });
    }

    // KODE BARU: LOGIKA UNTUK MODAL KONFIRMASI PEMBATALAN
    const confirmationModal = document.getElementById('confirmationModal');
    if (confirmationModal) {
        const cancelForms = document.querySelectorAll('.cancel-form');
        const confirmBtn = document.getElementById('confirmCancelBtn');
        const cancelBtn = document.getElementById('cancelActionBtn');
        let formToSubmit = null;

        cancelForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah form submit secara langsung
                formToSubmit = this; // Simpan form yang akan di-submit
                confirmationModal.classList.remove('hidden');
                confirmationModal.classList.add('flex');
            });
        });

        // Saat tombol "Ya, Batalkan" di dalam modal diklik
        confirmBtn.addEventListener('click', function() {
            if (formToSubmit) {
                formToSubmit.submit(); // Submit form yang sudah disimpan
            }
        });

        // Fungsi untuk menutup modal konfirmasi
        function closeConfirmationModal() {
            confirmationModal.classList.add('hidden');
            confirmationModal.classList.remove('flex');
            formToSubmit = null; // Reset form
        }

        cancelBtn.addEventListener('click', closeConfirmationModal);
        confirmationModal.addEventListener('click', function(event) {
            if (event.target === confirmationModal) {
                closeConfirmationModal();
            }
        });
    }
});
</script>

<div id="ulasanModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden" style="backdrop-filter: blur(5px);">
    <div class="card-enhanced p-8 rounded-2xl shadow-2xl relative w-full max-w-lg mx-4 fade-in-up">
        <button id="closeUlasanModal" class="absolute top-4 right-4 text-gray-400 hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <div class="text-center mb-6">
            <h3 class="text-3xl font-bold gradient-text">Beri Ulasan Anda</h3>
            <p id="namaProdukModal" class="text-gray-400 mt-1">untuk kendaraan</p>
        </div>
        <form action="{{ route('ulasan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_pesanan" id="modal_id_pesanan">
            <input type="hidden" name="id_produk" id="modal_id_produk">
            <div class="mb-6">
                <label class="block text-gray-300 text-sm font-bold mb-2 text-center">Rating Anda</label>
                <div class="flex items-center justify-center gap-2 rating-stars">
                    <input type="radio" id="star5" name="rating" value="5" class="hidden" required/><label for="star5" title="Sempurna">★</label>
                    <input type="radio" id="star4" name="rating" value="4" class="hidden"/><label for="star4" title="Bagus">★</label>
                    <input type="radio" id="star3" name="rating" value="3" class="hidden"/><label for="star3" title="Cukup">★</label>
                    <input type="radio" id="star2" name="rating" value="2" class="hidden"/><label for="star2" title="Kurang">★</label>
                    <input type="radio" id="star1" name="rating" value="1" class="hidden"/><label for="star1" title="Buruk">★</label>
                </div>
            </div>
            <div class="mb-8">
                <label for="komentar" class="block text-gray-300 text-sm font-bold mb-2">Komentar Anda</label>
                <textarea name="komentar" id="komentar" rows="5" class="select-enhanced w-full" placeholder="Bagaimana pengalaman Anda dengan kendaraan ini?" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn-enhanced w-full">
                    Kirim Ulasan
                </button>
            </div>
        </form>
    </div>
</div>

<div id="trackingModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden" style="backdrop-filter: blur(5px);">
    <div class="card-enhanced p-8 rounded-2xl shadow-2xl relative w-full max-w-lg mx-4 fade-in-up">
        <button id="closeTrackingModal" class="absolute top-4 right-4 text-gray-400 hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <div class="text-center mb-6">
            <h3 class="text-3xl font-bold gradient-text">Riwayat Pesanan</h3>
            <p id="tracking-order-id" class="text-gray-400 mt-1">#INV-0000</p>
        </div>
        <div id="tracking-history-container" class="space-y-6">
            <div class="text-center py-8">
                <p class="text-gray-500">Memuat riwayat...</p>
            </div>
        </div>
    </div>
</div>

<div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden" style="backdrop-filter: blur(5px);">
    <div class="card-enhanced p-8 rounded-2xl shadow-2xl relative w-full max-w-md mx-4 fade-in-up">
        <div class="text-center mb-6">
            <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-red-500/10 rounded-full">
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-white">Konfirmasi Pembatalan</h3>
            <p class="text-gray-400 mt-2">Apakah Anda yakin ingin membatalkan pesanan ini? Tindakan ini tidak dapat diurungkan.</p>
        </div>
        <div class="flex items-center justify-center gap-4">
            <button id="cancelActionBtn" class="modal-btn modal-btn-cancel">Tidak, Kembali</button>
            <button id="confirmCancelBtn" class="modal-btn modal-btn-confirm">Ya, Batalkan</button>
        </div>
    </div>
</div>
@endsection