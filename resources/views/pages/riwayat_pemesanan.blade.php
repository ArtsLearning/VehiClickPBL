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
        <!-- Header Section -->
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

        <!-- Quick Stats Overview -->
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

        <!-- Search and Filter Section -->
        <div class="px-6 mb-8">
            <div class="bg-gray-800 rounded-xl p-6">
                <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                    <!-- Search Bar -->
                    <div class="search-container w-full lg:w-1/2">
                        <input type="text" 
                               id="searchInput"
                               placeholder="Cari berdasarkan kendaraan, tanggal, atau nomor pesanan..." 
                               class="search-input w-full px-4 py-3 rounded-lg focus:outline-none pr-12">
                        <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    
                    <!-- Category Filters -->
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

        <!-- Orders Section -->
        <div class="px-6 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold">
                    Daftar <span class="text-gradient">Pesanan</span>
                </h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-400" id="orderCount">Ditemukan 5 pesanan</span>
                </div>
            </div>

            <!-- Orders List -->
            <div id="ordersList" class="space-y-4">
                <!-- Orders will be populated by JavaScript -->
            </div>

            <!-- No Orders Found -->
            <div class="no-orders" id="noOrders" style="display: none;">
                <div style="font-size: 4rem; margin-bottom: 20px;">📋</div>
                <h3 class="text-xl font-bold mb-2">Tidak ada pesanan ditemukan</h3>
                <p>Belum ada pesanan dengan filter yang dipilih</p>
            </div>
        </div>

        <!-- Back Button -->
        <button class="back-btn" onclick="window.history.back()" title="Kembali">
            <i class="fas fa-arrow-left"></i>
        </button>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900">
        @include('components.footer')
    </footer>

    <script>
        // Sample data for orders (in real app, this would come from Laravel backend)
        const orders = [
            {
                id: 1,
                date: '15 April 2025',
                vehicle: 'Honda Beat 2018',
                licensePlate: 'B 1234 ABC',
                price: 'Rp. 120.000',
                status: 'diproses',
                duration: '2 hari',
                bookingDate: '13 April 2025'
            },
            {
                id: 2,
                date: '20 April 2025',
                vehicle: 'Toyota Calya 2023',
                licensePlate: 'B 5678 DEF',
                price: 'Rp. 420.000',
                status: 'selesai',
                duration: '3 hari',
                bookingDate: '17 April 2025'
            },
            {
                id: 3,
                date: '22 April 2025',
                vehicle: 'All New Avanza G 2023',
                licensePlate: 'B 9012 GHI',
                price: 'Rp. 450.000',
                status: 'dibatalkan',
                duration: '2 hari',
                bookingDate: '20 April 2025'
            },
            {
                id: 4,
                date: '25 April 2025',
                vehicle: 'Honda Vario 125 2022',
                licensePlate: 'B 3456 JKL',
                price: 'Rp. 85.000',
                status: 'belum-dibayar',
                duration: '1 hari',
                bookingDate: '24 April 2025'
            },
            {
                id: 5,
                date: '28 April 2025',
                vehicle: 'Suzuki Ertiga 2023',
                licensePlate: 'B 7890 MNO',
                price: 'Rp. 380.000',
                status: 'selesai',
                duration: '4 hari',
                bookingDate: '24 April 2025'
            }
        ];

        let currentFilter = 'semua';
        let filteredOrders = orders;

        // Function to get status text and icon
        function getStatusInfo(status) {
            const statusInfo = {
                'belum-dibayar': { text: 'Belum Dibayar', icon: 'fas fa-credit-card' },
                'diproses': { text: 'Diproses', icon: 'fas fa-cogs' },
                'selesai': { text: 'Selesai', icon: 'fas fa-check-circle' },
                'dibatalkan': { text: 'Dibatalkan', icon: 'fas fa-times-circle' }
            };
            return statusInfo[status] || { text: status, icon: 'fas fa-question' };
        }

        // Function to display orders
        function displayOrders(ordersToShow) {
            const ordersList = document.getElementById('ordersList');
            const noOrders = document.getElementById('noOrders');
            const orderCount = document.getElementById('orderCount');

            if (ordersToShow.length === 0) {
                ordersList.style.display = 'none';
                noOrders.style.display = 'block';
                orderCount.textContent = 'Tidak ada pesanan ditemukan';
                return;
            }

            ordersList.style.display = 'block';
            noOrders.style.display = 'none';
            orderCount.textContent = `Ditemukan ${ordersToShow.length} pesanan`;

            ordersList.innerHTML = ordersToShow.map(order => {
                const statusInfo = getStatusInfo(order.status);
                return `
                    <div class="order-card card-hover rounded-xl p-6 fade-in" data-status="${order.status}">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                            <!-- Order Info -->
                            <div class="flex-1">
                                <div class="flex items-center gap-4 mb-3">
                                    <h3 class="text-xl font-bold text-gradient">Pesanan #${order.id}</h3>
                                    <span class="status-badge status-${order.status}">
                                        <i class="${statusInfo.icon}"></i>
                                        ${statusInfo.text}
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <p class="text-gray-400 mb-1">Kendaraan:</p>
                                        <p class="text-white font-medium">${order.vehicle}</p>
                                        <p class="text-gray-400">${order.licensePlate}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400 mb-1">Tanggal Sewa:</p>
                                        <p class="text-white font-medium">${order.date}</p>
                                        <p class="text-gray-400">Durasi: ${order.duration}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Price and Actions -->
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <div class="text-center sm:text-right">
                                    <p class="text-2xl font-bold text-gradient">${order.price}</p>
                                    <p class="text-gray-400 text-sm">Total Pembayaran</p>
                                </div>
                                
                                <div class="flex gap-2">
                                    <button class="detail-btn" onclick="showOrderDetail(${order.id})">
                                        <i class="fas fa-eye mr-2"></i>Detail
                                    </button>
                                    ${order.status === 'belum-dibayar' ? 
                                        `<button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg font-medium transition-colors text-white" onclick="payOrder(${order.id})">
                                            <i class="fas fa-credit-card mr-2"></i>Bayar
                                        </button>` : ''
                                    }
                                    ${order.status === 'diproses' ? 
                                        `<button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg font-medium transition-colors text-white" onclick="cancelOrder(${order.id})">
                                            <i class="fas fa-times mr-2"></i>Batal
                                        </button>` : ''
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            // Add animation to cards
            setTimeout(() => {
                document.querySelectorAll('.order-card').forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            }, 50);
        }

        // Function to filter orders
        function filterOrders(filter) {
            currentFilter = filter;
            
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelector(`[data-filter="${filter}"]`).classList.add('active');

            // Filter orders
            if (filter === 'semua') {
                filteredOrders = orders;
            } else {
                filteredOrders = orders.filter(order => order.status === filter);
            }

            displayOrders(filteredOrders);
            updateStats();
        }

        // Function to search orders
        function searchOrders(query) {
            const searchTerm = query.toLowerCase();
            const searchResults = filteredOrders.filter(order => 
                order.vehicle.toLowerCase().includes(searchTerm) ||
                order.date.toLowerCase().includes(searchTerm) ||
                order.id.toString().includes(searchTerm) ||
                order.licensePlate.toLowerCase().includes(searchTerm)
            );
            displayOrders(searchResults);
        }

        // Function to update statistics
        function updateStats() {
            const stats = {
                total: orders.length,
                selesai: orders.filter(o => o.status === 'selesai').length,
                diproses: orders.filter(o => o.status === 'diproses').length,
                dibatalkan: orders.filter(o => o.status === 'dibatalkan').length
            };

            document.getElementById('totalOrders').textContent = stats.total;
            document.getElementById('completedOrders').textContent = stats.selesai;
            document.getElementById('processingOrders').textContent = stats.diproses;
            document.getElementById('cancelledOrders').textContent = stats.dibatalkan;
        }

        // Function to show order detail
        function showOrderDetail(orderId) {
            const order = orders.find(o => o.id === orderId);
            if (order) {
                const statusInfo = getStatusInfo(order.status);
                alert(`Detail Pesanan #${order.id}\n\nKendaraan: ${order.vehicle}\nPlat Nomor: ${order.licensePlate}\nTanggal Booking: ${order.bookingDate}\nTanggal Sewa: ${order.date}\nDurasi: ${order.duration}\nTotal: ${order.price}\nStatus: ${statusInfo.text}\n\n(Dalam aplikasi nyata, ini akan membuka halaman detail)`);
            }
        }

        // Function to pay order
        function payOrder(orderId) {
            const order = orders.find(o => o.id === orderId);
            if (order) {
                if (confirm(`Lanjutkan pembayaran untuk ${order.vehicle}?\nTotal: ${order.price}`)) {
                    // In real app, redirect to payment gateway
                    alert('Redirecting to payment gateway...');
                }
            }
        }

        // Function to cancel order
        function cancelOrder(orderId) {
            const order = orders.find(o => o.id === orderId);
            if (order) {
                if (confirm(`Apakah Anda yakin ingin membatalkan pesanan ${order.vehicle}?`)) {
                    order.status = 'dibatalkan';
                    displayOrders(filteredOrders);
                    updateStats();
                    alert('Pesanan berhasil dibatalkan');
                }
            }
        }

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            // Display all orders initially
            displayOrders(orders);
            updateStats();

            // Setup filter buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    filterOrders(filter);
                });
            });

            // Setup search input
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', function() {
                searchOrders(this.value);
            });

            // Initialize card animations
            document.querySelectorAll('.order-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease';
            });
        });
    </script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection