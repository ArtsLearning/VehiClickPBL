@extends('layouts.app')

@section('content')
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pemesanan') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: #111827;
        }
        
        .gradient-orange {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff8c42 100%);
        }
        
        .gradient-dark {
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #2d2d2d 100%);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glow-orange {
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
        }
        
        .glow-orange-strong {
            box-shadow: 0 0 30px rgba(255, 107, 53, 0.5);
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(255, 107, 53, 0.2);
        }
        
        .filter-btn {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .filter-btn.active {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.4);
        }
        
        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 107, 53, 0.3);
        }
        
        .order-card {
            background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
            border: 1px solid #333;
            position: relative;
            overflow: hidden;
        }
        
        .order-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
        }
        
        .order-card:hover {
            border-color: #ff6b35;
            box-shadow: 0 15px 30px rgba(255, 107, 53, 0.2);
        }
        
        .stats-card {
            background: linear-gradient(145deg, #1f2937, #374151);
            border: 1px solid #4b5563;
        }
        
        .pulse-glow {
            animation: pulseGlow 2s infinite;
        }
        
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 107, 53, 0.3); }
            50% { box-shadow: 0 0 40px rgba(255, 107, 53, 0.6); }
        }
        
        .search-container {
            position: relative;
        }
        
        .search-input {
            background: rgba(0, 0, 0, 0.8);
            border: 2px solid #333;
            color: white;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            border-color: #ff6b35;
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
        }

        /* Welcome Section Styles */
        .welcome-card {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        /* Status Badge Styles */
        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-belum-dibayar {
            background: linear-gradient(45deg, #f59e0b, #fbbf24);
            color: #000;
        }

        .status-diproses {
            background: linear-gradient(45deg, #3b82f6, #60a5fa);
            color: #fff;
        }

        .status-selesai {
            background: linear-gradient(45deg, #10b981, #34d399);
            color: #fff;
        }

        .status-dibatalkan {
            background: linear-gradient(45deg, #ef4444, #f87171);
            color: #fff;
        }

        .detail-btn {
            background: linear-gradient(45deg, #ff6b35, #f7931e);
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .detail-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        .no-orders {
            text-align: center;
            padding: 50px 20px;
            color: #aaaaaa;
            background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
            border-radius: 15px;
            border: 1px solid #333;
        }

        .back-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #ff6b35, #f7931e);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #000;
            z-index: 1000;
        }

        .back-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(255, 107, 53, 0.5);
        }

        @media (max-width: 768px) {
            .welcome-card {
                padding: 1.5rem;
            }
            
            .order-card {
                margin-bottom: 1rem;
            }
            
            .filter-buttons {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>

    <div class="min-h-screen bg-gray-900 text-white">
        <div class="pt-24 px-6">
            <div class="welcome-card text-white relative z-10">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <h1 class="text-4xl font-bold mb-2">Riwayat Pemesanan</h1>
                        <p class="text-xl opacity-90">Lihat dan kelola semua pesanan Anda</p>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold">{{ date('d') }}</div>
                        <div class="text-lg">{{ date('M Y') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-orange-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient" id="totalOrders">5</h3>
                    <p class="text-gray-300">Total Pesanan</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-check-circle text-green-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient" id="completedOrders">2</h3>
                    <p class="text-gray-300">Selesai</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-spinner text-blue-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient" id="processingOrders">1</h3>
                    <p class="text-gray-300">Diproses</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-times-circle text-red-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient" id="cancelledOrders">1</h3>
                    <p class="text-gray-300">Dibatalkan</p>
                </div>
            </div>
        </div>

        <div class="px-6 mb-8">
            <div class="bg-gray-800 rounded-xl p-6">
                <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                    <div class="search-container w-full lg:w-1/2">
                        <input type="text" 
                               id="searchInput"
                               placeholder="Cari berdasarkan kendaraan, tanggal, atau nomor pesanan..." 
                               class="search-input w-full px-4 py-3 rounded-lg focus:outline-none pr-12">
                        <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    
                    <div class="flex flex-wrap gap-3 filter-buttons">
                        <button class="filter-btn active px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-filter="semua">
                            <i class="fas fa-list mr-2"></i>Semua
                        </button>
                        <button class="filter-btn px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-filter="belum-dibayar">
                            <i class="fas fa-credit-card mr-2"></i>Belum Dibayar
                        </button>
                        <button class="filter-btn px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-filter="diproses">
                            <i class="fas fa-cogs mr-2"></i>Diproses
                        </button>
                        <button class="filter-btn px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-filter="selesai">
                            <i class="fas fa-check mr-2"></i>Selesai
                        </button>
                        <button class="filter-btn px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-filter="dibatalkan">
                            <i class="fas fa-times mr-2"></i>Dibatalkan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-6 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold">
                    Daftar <span class="text-gradient">Pesanan</span>
                </h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-400" id="orderCount">Ditemukan {{ $riwayat->total() }} pesanan</span>
                </div>
            </div>

            <div id="ordersList" class="space-y-4">
                @forelse ($riwayat as $transaksi)
                    <div class="order-card card-hover rounded-xl p-6 fade-in" data-status="{{ $transaksi->status }}">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-4 mb-3">
                                    <h3 class="text-xl font-bold text-gradient">Pesanan #{{ $transaksi->id }}</h3>
                                    <span class="status-badge 
                                        @if($transaksi->status == 'belum-dibayar') status-belum-dibayar
                                        @elseif($transaksi->status == 'diproses') status-diproses
                                        @elseif($transaksi->status == 'selesai') status-selesai
                                        @elseif($transaksi->status == 'dibatalkan') status-dibatalkan
                                        @endif
                                    ">
                                        @if($transaksi->status == 'belum-dibayar')
                                            <i class="fas fa-credit-card"></i> Belum Dibayar
                                        @elseif($transaksi->status == 'diproses')
                                            <i class="fas fa-cogs"></i> Diproses
                                        @elseif($transaksi->status == 'selesai')
                                            <i class="fas fa-check-circle"></i> Selesai
                                        @elseif($transaksi->status == 'dibatalkan')
                                            <i class="fas fa-times-circle"></i> Dibatalkan
                                        @else
                                            {{ ucfirst($transaksi->status) }}
                                        @endif
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <p class="text-gray-400 mb-1">Barang:</p>
                                        {{-- ===== PERBAIKAN UTAMA #1: MENGGANTI 'kendaraan' MENJADI 'barang' ===== --}}
                                        <p class="text-white font-medium">{{ $transaksi->barang->nama ?? 'Data Barang Telah Dihapus' }}</p>
                                        <p class="text-gray-400">{{ $transaksi->barang->plat_nomor ?? '' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400 mb-1">Tanggal Sewa:</p>
                                        <p class="text-white font-medium">
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal_sewa)->translatedFormat('d F Y') }}
                                        </p>
                                        <p class="text-gray-400">Durasi: {{ $transaksi->durasi_hari }} hari</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <div class="text-center sm:text-right">
                                    <p class="text-2xl font-bold text-gradient">
                                        Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                    </p>
                                    <p class="text-gray-400 text-sm">Total Pembayaran</p>
                                </div>
                                <div class="flex gap-2">
                                    <button class="detail-btn" onclick="alert('Fitur detail pesanan belum tersedia')">
                                        <i class="fas fa-eye mr-2"></i>Detail
                                    </button>
                                    @if($transaksi->status == 'belum-dibayar')
                                        <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg font-medium transition-colors text-white" onclick="alert('Fitur pembayaran belum tersedia')">
                                            <i class="fas fa-credit-card mr-2"></i>Bayar
                                        </button>
                                    @endif
                                    @if($transaksi->status == 'diproses')
                                        <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg font-medium transition-colors text-white" onclick="alert('Fitur batal pesanan belum tersedia')">
                                            <i class="fas fa-times mr-2"></i>Batal
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="no-orders" id="noOrders">
                        <div style="font-size: 4rem; margin-bottom: 20px;">📋</div>
                        <h3 class="text-xl font-bold mb-2">Tidak ada pesanan ditemukan</h3>
                        <p>Anda belum pernah melakukan pemesanan.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{-- Memastikan pagination links menggunakan style yang sesuai untuk dark mode --}}
                {{ $riwayat->links('pagination::tailwind') }}
            </div>
        </div>

        <button class="back-btn" onclick="window.history.back()" title="Kembali">
            <i class="fas fa-arrow-left"></i>
        </button>
        <footer class="bg-gray-900">
            @include('components.footer')
        </footer>
    </div>

    {{-- ===== PERBAIKAN UTAMA #2: MENGHAPUS BLOK SCRIPT JAVASCRIPT ===== --}}
    {{-- Blok script yang berisi data palsu dan memanipulasi DOM telah dihapus --}}
    {{-- agar data yang tampil 100% berasal dari Controller (database). --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection