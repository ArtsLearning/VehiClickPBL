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
</style>
<div class="min-h-screen pt-24 pb-10 px-4 bg-gradient-to-br from-gray-900 via-black to-gray-800 text-white relative overflow-hidden bg-pattern">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-orange-500/10 to-transparent"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-500/5 rounded-full blur-3xl"></div>
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-orange-400/5 rounded-full blur-2xl"></div>
    </div>

    <div class="max-w-5xl mx-auto relative z-10">
        <!-- Header with Gradient Text -->
        <div class="text-center mb-12 fade-in-up">
            <h2 class="text-5xl font-bold mb-4 gradient-text">
                Riwayat Pemesanan
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-orange-400 to-orange-600 mx-auto rounded-full glow-effect"></div>
        </div>

        <!-- Enhanced Filter Form -->
        <form method="GET" action="{{ route('riwayat') }}" class="mb-8 text-center slide-in-left">
            <div class="inline-block relative">
                <select name="status" onchange="this.form.submit()" 
                        class="select-enhanced appearance-none px-6 py-3 pr-12 cursor-pointer">
                    <option value="all">🔍 Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                    <option value="process" {{ request('status') == 'process' ? 'selected' : '' }}>⚙️ Diproses</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>✅ Selesai</option>
                    <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>❌ Dibatalkan</option>
                </select>
                <!-- Custom Arrow -->
                <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                    <svg class="w-5 h-5 text-orange-500 pulse-animation" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </form>

        <!-- Enhanced Order Cards -->
        @forelse($pemesanans as $index => $order)
        <div class="card-enhanced p-8 rounded-2xl mb-6 shadow-2xl relative slide-in-right" style="animation-delay: {{ $index * 0.1 }}s;">
            
            <!-- Subtle Background Glow -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-orange-500/10 to-transparent rounded-full blur-xl float-animation"></div>
            
            <div class="flex flex-col md:flex-row md:justify-between md:items-center relative z-10">
                <div class="flex-1">
                    <!-- Invoice Header -->
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-2 h-8 bg-gradient-to-b from-orange-400 to-orange-600 rounded-full glow-effect"></div>
                        <h3 class="text-2xl font-bold text-orange-400 gradient-text">#INV-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</h3>
                    </div>
                    
                    <!-- Date Range -->
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-5 h-5 text-orange-500 pulse-animation" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-300 font-medium">{{ \Carbon\Carbon::parse($order->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($order->tanggal_selesai)->format('d M Y') }}</p>
                    </div>
                    
                    <!-- Vehicle Name -->
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7a4 4 0 118 0v1h4a2 2 0 012 2v3a2 2 0 01-2 2H6a2 2 0 01-2-2v-3a2 2 0 012-2h4V7z"></path>
                        </svg>
                        <p class="text-white text-lg font-semibold">{{ $order->nama_kendaraan }}</p>
                    </div>
                    
                    <!-- Duration & Total in Grid -->
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
                    
                    <!-- Status Badge -->
                    <div class="inline-flex items-center gap-2">
                        <span class="text-sm font-medium text-gray-300">Status:</span>
                        <span class="status-badge 
                            {{ $order->status == 'pending' ? 'status-pending' : 
                               ($order->status == 'process' ? 'status-process' : 
                               ($order->status == 'completed' ? 'status-completed' : 'status-canceled')) }}">
                            {{ $order->status == 'pending' ? '⏳ Pending' : 
                               ($order->status == 'process' ? '⚙️ Diproses' : 
                               ($order->status == 'completed' ? '✅ Selesai' : '❌ Dibatalkan')) }}
                        </span>
                    </div>
                </div>

                <!-- Payment Button -->
                @if($order->status == 'pending')
                <div class="mt-6 md:mt-0 md:ml-6">
                    <form method="POST" action="{{ route('payment.snap', $order->id) }}">
                        @csrf
                        <button type="submit" class="btn-enhanced group relative overflow-hidden">
                            <div class="relative flex items-center gap-2 z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                Bayar Sekarang
                            </div>
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        @empty
        <!-- Empty State -->
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

        <!-- Enhanced Pagination -->
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

/* ===== CUSTOM SCROLLBAR ===== */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(31, 41, 55, 0.5);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, var(--primary-orange), var(--secondary-orange));
    border-radius: 4px;
    transition: all 0.3s ease;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, var(--accent-orange), var(--primary-orange));
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
        opacity: 1;
    }
    50% {
        opacity: 0.7;
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced loading state for forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            if (button) {
                button.classList.add('loading');
                button.disabled = true;
                
                // Optional: Add loading text
                const originalText = button.textContent;
                button.textContent = 'Processing...';
                
                // Re-enable button after form processing (adjust timeout as needed)
                setTimeout(() => {
                    button.classList.remove('loading');
                    button.disabled = false;
                    button.textContent = originalText;
                }, 3000);
            }
        });
    });
    
    // Auto-hide notifications
    const notifications = document.querySelectorAll('.order-notification');
    notifications.forEach(notification => {
        setTimeout(() => {
            notification.classList.add('show');
            setTimeout(() => {
                notification.classList.remove('show');
                // Optional: Remove from DOM after hiding
                setTimeout(() => {
                    notification.remove();
                }, 500); // Allow time for CSS transition
            }, 5000); // Show notification for 5 seconds
        }, 100); // Small delay before showing
    });
    
    // Enhanced notification system with close button
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
    
    // Form validation enhancement
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
    
    // Smooth scroll for anchor links
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
});
</script>
@endsection