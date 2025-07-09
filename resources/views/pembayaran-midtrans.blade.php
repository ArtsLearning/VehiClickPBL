{{-- Debug Info --}}
@if(!isset($pemesanan))
    <div style="color:red">PEMESANAN NOT SET</div>
@endif
@if(!isset($snapToken))
    <div style="color:red">SNAP TOKEN NOT SET</div>
@endif

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

<div class="min-h-screen gradient-bg flex flex-col justify-center items-center text-white px-4 py-8 pt-24 relative">
    <!-- Floating Particles -->
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Header -->
    <div class="text-center mb-8 slide-in-up">
        <h1 class="text-5xl font-bold text-gradient mb-4">
            💳 Pembayaran Aman
        </h1>
        <p class="text-gray-300 text-lg">Selesaikan transaksi Anda dengan mudah dan aman</p>
    </div>

    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Customer Information -->
        <div class="slide-in-left">
            <div class="info-card rounded-2xl p-6 mb-6">
                <h2 class="text-2xl font-bold text-gradient mb-6 flex items-center">
                    <span class="mr-3 text-3xl icon-bounce">👤</span>
                    Informasi Pelanggan
                </h2>
                
                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-gray-800 rounded-lg border-l-4 border-orange-500">
                        <div class="text-orange-500 text-xl mr-4">📝</div>
                        <div>
                            <p class="text-gray-400 text-sm">Nama Lengkap</p>
                            <p class="text-white font-semibold text-lg">{{ $pemesanan->nama ?? 'Tidak tersedia' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-4 bg-gray-800 rounded-lg border-l-4 border-orange-500">
                        <div class="text-orange-500 text-xl mr-4">📧</div>
                        <div>
                            <p class="text-gray-400 text-sm">Email</p>
                            <p class="text-white font-semibold text-lg">{{ $pemesanan->email ?? 'Tidak tersedia' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-4 bg-gray-800 rounded-lg border-l-4 border-orange-500">
                        <div class="text-orange-500 text-xl mr-4">📍</div>
                        <div>
                            <p class="text-gray-400 text-sm">Alamat</p>
                            <p class="text-white font-semibold text-lg">
                                @if(isset($pemesanan->pickup_method) && $pemesanan->pickup_method === 'pickup')
                                    Ambil di tempat

                                @elseif(auth()->check() && auth()->user()->status_verifikasi_alamat === 'terverifikasi' && empty($pemesanan->alamat_detail))
                                    @php
                                        $alamatLengkap = '';
                                        $user = auth()->user();

                                        if (!empty($user->alamat_detail)) {
                                            $alamatLengkap .= $user->alamat_detail;
                                        }
                                        if (!empty($user->nama_kelurahan)) {
                                            $alamatLengkap .= ', ' . $user->nama_kelurahan;
                                        }
                                        if (!empty($user->nama_kecamatan)) {
                                            $alamatLengkap .= ', ' . $user->nama_kecamatan;
                                        }
                                        if (!empty($user->nama_kabupaten)) {
                                            $alamatLengkap .= ', ' . $user->nama_kabupaten;
                                        }
                                        if (!empty($user->nama_provinsi)) {
                                            $alamatLengkap .= ', ' . $user->nama_provinsi;
                                        }
                                        if (!empty($user->kodepos)) {
                                            $alamatLengkap .= ' ' . $user->kodepos;
                                        }
                                    @endphp
                                    {{ trim($alamatLengkap, ', ') }} <span class="text-green-400 text-sm">(Terverifikasi dari profil)</span>

                                @elseif(!empty($pemesanan->alamat_detail) || !empty($pemesanan->nama_provinsi))
                                    @php
                                        $alamatLengkap = '';
                                        if (!empty($pemesanan->alamat_detail)) {
                                            $alamatLengkap .= $pemesanan->alamat_detail;
                                        }
                                        if (!empty($pemesanan->nama_kelurahan)) {
                                            $alamatLengkap .= ', ' . $pemesanan->nama_kelurahan;
                                        }
                                        if (!empty($pemesanan->nama_kecamatan)) {
                                            $alamatLengkap .= ', ' . $pemesanan->nama_kecamatan;
                                        }
                                        if (!empty($pemesanan->nama_kabupaten)) {
                                            $alamatLengkap .= ', ' . $pemesanan->nama_kabupaten;
                                        }
                                        if (!empty($pemesanan->nama_provinsi)) {
                                            $alamatLengkap .= ', ' . $pemesanan->nama_provinsi;
                                        }
                                        if (!empty($pemesanan->kodepos)) {
                                            $alamatLengkap .= ' ' . $pemesanan->kodepos;
                                        }
                                    @endphp
                                    {{ trim($alamatLengkap, ', ') }}
                                @else
                                    Ambil di tempat
                                @endif

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Card -->
        <div class="slide-in-right">
            <div class="card-payment rounded-2xl p-8 text-center glow-orange-strong">
                <div class="mb-6">
                    <div class="text-6xl mb-4 icon-bounce">💰</div>
                    <h2 class="text-3xl font-bold text-gradient mb-2">Total Pembayaran</h2>
                    <p class="text-gray-400">Halo <span class="text-orange-500 font-semibold">{{ $pemesanan->nama ?? 'Customer' }}</span>, silakan selesaikan pembayaran</p>
                </div>

                <div class="mb-8 p-6 bg-gray-900 rounded-xl border border-orange-500/20">
                    <div class="price-highlight">
                        Rp {{ number_format($pemesanan->total_harga ?? 0, 0, ',', '.') }}
                    </div>
                    <p class="text-gray-400 mt-2">Pembayaran akan diproses dengan aman melalui Midtrans</p>
                </div>

                <div class="space-y-4">
                    <button id="pay-button" class="btn-pay w-full py-4 px-8 rounded-xl text-lg font-bold transition-all duration-300 pulse-glow">
                        <span class="loading-spinner"></span>
                        <span class="btn-text">🚀 Bayar Sekarang</span>
                    </button>
                    
                    <div class="flex items-center justify-center space-x-4 text-sm text-gray-400">
                        <div class="flex items-center">
                            <span class="text-green-500 mr-1">🔒</span>
                            SSL Terenkripsi
                        </div>
                        <div class="flex items-center">
                            <span class="text-green-500 mr-1">✅</span>
                            100% Aman
                        </div>
                        <div class="flex items-center">
                            <span class="text-green-500 mr-1">⚡</span>
                            Proses Instan
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="mt-8 p-4 bg-gray-900/50 rounded-xl">
                    <p class="text-gray-400 text-sm mb-3">Metode Pembayaran Tersedia:</p>
                    <div class="flex flex-wrap justify-center gap-2">
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-500 rounded-full text-xs">💳 Kartu Kredit</span>
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-500 rounded-full text-xs">🏦 Transfer Bank</span>
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-500 rounded-full text-xs">📱 E-Wallet</span>
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-500 rounded-full text-xs">🏪 Minimarket</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Info -->
    <div class="mt-12 text-center text-gray-400 slide-in-up">
        <p class="text-sm">
            <span class="text-orange-500">🛡️</span> 
            Transaksi Anda dilindungi dengan teknologi enkripsi terdepan
        </p>
    </div>
</div>

<!-- Midtrans Snap -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const payButton = document.getElementById('pay-button');
        const btnText = payButton.querySelector('.btn-text');
        
        payButton.addEventListener('click', function () {
            // Show loading state
            payButton.classList.add('loading');
            btnText.textContent = 'Memproses...';
            
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    console.log('Payment success:', result);
                    
                    // Show success message
                    payButton.classList.remove('loading');
                    btnText.textContent = '✅ Payment Berhasil!';
                    payButton.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                    
                    setTimeout(() => {
                        alert("🎉 Pembayaran berhasil! Terima kasih atas kepercayaan Anda.");
                        window.location.href = "/";
                    }, 1500);
                },
                onPending: function(result){
                    console.log('Payment pending:', result);
                    
                    payButton.classList.remove('loading');
                    btnText.textContent = '⏳ Menunggu Pembayaran';
                    payButton.style.background = 'linear-gradient(135deg, #f59e0b, #d97706)';
                    
                    setTimeout(() => {
                        alert("⏳ Pembayaran sedang diproses. Mohon tunggu konfirmasi.");
                        window.location.href = "/";
                    }, 1500);
                },
                onError: function(result){
                    console.log('Payment error:', result);
                    
                    payButton.classList.remove('loading');
                    btnText.textContent = '❌ Pembayaran Gagal';
                    payButton.style.background = 'linear-gradient(135deg, #ef4444, #dc2626)';
                    
                    setTimeout(() => {
                        alert("❌ Pembayaran gagal! Silakan coba lagi.");
                        // Reset button
                        btnText.textContent = '🚀 Bayar Sekarang';
                        payButton.style.background = 'linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff8c42 100%)';
                    }, 2000);
                },
                onClose: function(){
                    console.log('Payment popup closed');
                    
                    payButton.classList.remove('loading');
                    btnText.textContent = '🚀 Bayar Sekarang';
                }
            });
        });
    });
    
</script>
@endsection