@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    
    * {
        font-family: 'Poppins', sans-serif;
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
        box-shadow: 0 20px 40px rgba(255, 107, 53, 0.2);
    }
    
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .slide-in {
        animation: slideIn 0.6s ease-out;
    }
    
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .category-tab {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .category-tab::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 107, 53, 0.4), transparent);
        transition: left 0.5s;
    }
    
    .category-tab:hover::before {
        left: 100%;
    }
    
    .category-tab.active {
        background: linear-gradient(135deg, #ff6b35, #f7931e);
        color: white;
    }
    
    .filter-btn {
        transition: all 0.3s ease;
    }
    
    .filter-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(255, 107, 53, 0.3);
    }
    
    .vehicle-card {
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 107, 53, 0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .vehicle-card:hover {
        border-color: #ff6b35;
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(255, 107, 53, 0.3);
    }
    
    .price-tag {
        background: linear-gradient(135deg, #ff6b35, #f7931e);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
    }
    
    .availability-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .available {
        background: rgba(34, 197, 94, 0.9);
        color: white;
    }
    
    .unavailable {
        background: rgba(239, 68, 68, 0.9);
        color: white;
    }
    
    .search-bar {
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 107, 53, 0.3);
        transition: all 0.3s ease;
    }
    
    .search-bar:focus {
        border-color: #ff6b35;
        box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
        outline: none;
    }
    
    .particle {
        position: absolute;
        background: #ff6b35;
        border-radius: 50%;
        opacity: 0.6;
        animation: particleFloat 10s infinite linear;
    }
    
    @keyframes particleFloat {
        0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
        10% { opacity: 0.6; }
        90% { opacity: 0.6; }
        100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
    }
    
    .stats-card {
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 107, 53, 0.2);
        transition: all 0.3s ease;
    }
    
    .stats-card:hover {
        border-color: #ff6b35;
        box-shadow: 0 8px 24px rgba(255, 107, 53, 0.2);
    }
</style>

<div class="bg-gray-900 text-white min-h-screen overflow-x-hidden">
    <!-- Floating Particles -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="particle" style="left: 10%; width: 3px; height: 3px; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; width: 4px; height: 4px; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; width: 2px; height: 2px; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; width: 3px; height: 3px; animation-delay: 6s;"></div>
        <div class="particle" style="left: 50%; width: 4px; height: 4px; animation-delay: 1s;"></div>
        <div class="particle" style="left: 60%; width: 3px; height: 3px; animation-delay: 3s;"></div>
        <div class="particle" style="left: 70%; width: 2px; height: 2px; animation-delay: 5s;"></div>
        <div class="particle" style="left: 80%; width: 4px; height: 4px; animation-delay: 7s;"></div>
        <div class="particle" style="left: 90%; width: 3px; height: 3px; animation-delay: 2.5s;"></div>
    </div>

    <!-- Header Section -->
    <section class="gradient-dark py-20 px-8 relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 slide-in">
                <h1 class="text-6xl font-bold mb-6">
                    <span class="text-gradient">Pilih Kendaraan</span><br/>
                    Impian Anda
                </h1>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Temukan berbagai pilihan kendaraan premium untuk setiap kebutuhan perjalanan Anda
                </p>
                <div class="w-24 h-1 gradient-orange mx-auto rounded-full mt-6"></div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-black/50 backdrop-blur-sm rounded-2xl p-8 mb-12 border border-gray-800">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Search Bar -->
                    <div class="md:col-span-2">
                        <div class="relative">
                            <input type="text" placeholder="Cari kendaraan..." 
                                   class="w-full search-bar text-white px-6 py-4 pr-12 rounded-xl">
                            <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-orange-400"></i>
                        </div>
                    </div>
                    
                    <!-- Location Filter -->
                    <div>
                        <select class="w-full search-bar text-white px-6 py-4 rounded-xl">
                            <option value="">Semua Lokasi</option>
                            <option value="jakarta">Jakarta</option>
                            <option value="bandung">Bandung</option>
                            <option value="surabaya">Surabaya</option>
                            <option value="medan">Medan</option>
                        </select>
                    </div>
                    
                    <!-- Price Filter -->
                    <div>
                        <select class="w-full search-bar text-white px-6 py-4 rounded-xl">
                            <option value="">Semua Harga</option>
                            <option value="low">< Rp 200.000</option>
                            <option value="medium">Rp 200.000 - 500.000</option>
                            <option value="high">> Rp 500.000</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <div class="stats-card rounded-xl p-6 text-center">
                    <i class="fas fa-car text-orange-400 text-3xl mb-4"></i>
                    <h3 class="text-2xl font-bold text-gradient">150+</h3>
                    <p class="text-gray-300">Mobil Tersedia</p>
                </div>
                <div class="stats-card rounded-xl p-6 text-center">
                    <i class="fas fa-motorcycle text-orange-400 text-3xl mb-4"></i>
                    <h3 class="text-2xl font-bold text-gradient">75+</h3>
                    <p class="text-gray-300">Motor Tersedia</p>
                </div>
                <div class="stats-card rounded-xl p-6 text-center">
                    <i class="fas fa-truck text-orange-400 text-3xl mb-4"></i>
                    <h3 class="text-2xl font-bold text-gradient">30+</h3>
                    <p class="text-gray-300">Truk Tersedia</p>
                </div>
                <div class="stats-card rounded-xl p-6 text-center">
                    <i class="fas fa-users text-orange-400 text-3xl mb-4"></i>
                    <h3 class="text-2xl font-bold text-gradient">5000+</h3>
                    <p class="text-gray-300">Pelanggan Puas</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vehicle Categories Section -->
    <section class="py-16 px-8 bg-gray-900 relative">
        <div class="max-w-7xl mx-auto">
            <!-- Category Tabs -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button class="category-tab active px-8 py-4 rounded-full border-2 border-orange-400 font-semibold text-lg" 
                        onclick="showCategory('all')">
                    <i class="fas fa-th-large mr-2"></i>
                    Semua Kendaraan
                </button>
                <button class="category-tab px-8 py-4 rounded-full border-2 border-gray-600 hover:border-orange-400 font-semibold text-lg transition-all duration-300" 
                        onclick="showCategory('cars')">
                    <i class="fas fa-car mr-2"></i>
                    Mobil
                </button>
                <button class="category-tab px-8 py-4 rounded-full border-2 border-gray-600 hover:border-orange-400 font-semibold text-lg transition-all duration-300" 
                        onclick="showCategory('motorcycles')">
                    <i class="fas fa-motorcycle mr-2"></i>
                    Motor
                </button>
                <button class="category-tab px-8 py-4 rounded-full border-2 border-gray-600 hover:border-orange-400 font-semibold text-lg transition-all duration-300" 
                        onclick="showCategory('trucks')">
                    <i class="fas fa-truck mr-2"></i>
                    Truk
                </button>
            </div>

            <!-- Vehicle Grid -->
            <div id="vehicle-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <!-- Car Vehicles -->
                <div class="vehicle-card cars rounded-2xl overflow-hidden relative">
                    <div class="availability-badge available">Tersedia</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Toyota Camry" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Toyota Camry</h3>
                        <p class="text-gray-300 text-sm mb-4">Sedan Premium • Automatic • 5 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.9)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 450.000/hari</div>
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors duration-300">
                                Sewa
                            </button>
                        </div>
                    </div>
                </div>

                <div class="vehicle-card cars rounded-2xl overflow-hidden relative">
                    <div class="availability-badge available">Tersedia</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Honda Civic" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Honda Civic</h3>
                        <p class="text-gray-300 text-sm mb-4">Sedan Sport • Manual • 5 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.8)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 380.000/hari</div>
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors duration-300">
                                Sewa
                            </button>
                        </div>
                    </div>
                </div>

                <div class="vehicle-card cars rounded-2xl overflow-hidden relative">
                    <div class="availability-badge unavailable">Disewa</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1549924231-f129b911e442?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="BMW X5" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">BMW X5</h3>
                        <p class="text-gray-300 text-sm mb-4">SUV Luxury • Automatic • 7 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(5.0)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 850.000/hari</div>
                            <button class="bg-gray-600 text-gray-400 px-4 py-2 rounded-lg font-semibold cursor-not-allowed">
                                Tidak Tersedia
                            </button>
                        </div>
                    </div>
                </div>

                <div class="vehicle-card cars rounded-2xl overflow-hidden relative">
                    <div class="availability-badge available">Tersedia</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1494905998402-395d579af36f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Avanza" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Toyota Avanza</h3>
                        <p class="text-gray-300 text-sm mb-4">MPV • Manual • 7 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.5)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 280.000/hari</div>
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors duration-300">
                                Sewa
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Motorcycle Vehicles -->
                <div class="vehicle-card motorcycles rounded-2xl overflow-hidden relative">
                    <div class="availability-badge available">Tersedia</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Yamaha NMAX" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Yamaha NMAX</h3>
                        <p class="text-gray-300 text-sm mb-4">Scooter Premium • Automatic • 2 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.7)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 85.000/hari</div>
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors duration-300">
                                Sewa
                            </button>
                        </div>
                    </div>
                </div>

                <div class="vehicle-card motorcycles rounded-2xl overflow-hidden relative">
                    <div class="availability-badge available">Tersedia</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1609630875171-b1321377ee65?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Honda PCX" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Honda PCX</h3>
                        <p class="text-gray-300 text-sm mb-4">Scooter • Automatic • 2 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.6)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 75.000/hari</div>
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors duration-300">
                                Sewa
                            </button>
                        </div>
                    </div>
                </div>

                <div class="vehicle-card motorcycles rounded-2xl overflow-hidden relative">
                    <div class="availability-badge available">Tersedia</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Kawasaki Ninja" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Kawasaki Ninja</h3>
                        <p class="text-gray-300 text-sm mb-4">Sport Bike • Manual • 2 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.9)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 150.000/hari</div>
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors duration-300">
                                Sewa
                            </button>
                        </div>
                    </div>
                </div>

                <div class="vehicle-card motorcycles rounded-2xl overflow-hidden relative">
                    <div class="availability-badge unavailable">Disewa</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1591814468924-caf88d1232e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Vespa" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Vespa Primavera</h3>
                        <p class="text-gray-300 text-sm mb-4">Classic Scooter • Automatic • 2 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.8)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 120.000/hari</div>
                            <button class="bg-gray-600 text-gray-400 px-4 py-2 rounded-lg font-semibold cursor-not-allowed">
                                Tidak Tersedia
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Truck Vehicles -->
                <div class="vehicle-card trucks rounded-2xl overflow-hidden relative">
                    <div class="availability-badge available">Tersedia</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Isuzu Elf" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Isuzu Elf</h3>
                        <p class="text-gray-300 text-sm mb-4">Light Truck • Manual • 3 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.5)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 320.000/hari</div>
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors duration-300">
                                Sewa
                            </button>
                        </div>
                    </div>
                </div>

                <div class="vehicle-card trucks rounded-2xl overflow-hidden relative">
                    <div class="availability-badge available">Tersedia</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1586776730080-67a02c0ae813?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Mercedes Sprinter" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Mercedes Sprinter</h3>
                        <p class="text-gray-300 text-sm mb-4">Van • Automatic • 16 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.8)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 650.000/hari</div>
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors duration-300">
                                Sewa
                            </button>
                        </div>
                    </div>
                </div>

                <div class="vehicle-card trucks rounded-2xl overflow-hidden relative">
                    <div class="availability-badge available">Tersedia</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1562141961-401fb70c4f05?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Mitsubishi Fuso" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Mitsubishi Fuso</h3>
                        <p class="text-gray-300 text-sm mb-4">Medium Truck • Manual • 3 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.4)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 450.000/hari</div>
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors duration-300">
                                Sewa
                            </button>
                        </div>
                    </div>
                </div>

                <div class="vehicle-card trucks rounded-2xl overflow-hidden relative">
                    <div class="availability-badge unavailable">Disewa</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Pick Up Truck" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gradient">Toyota Hilux</h3>
                        <p class="text-gray-300 text-sm mb-4">Pick Up • Manual • 4 Seats</p>
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-300 text-sm">(4.7)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="price-tag">Rp 380.000/hari</div>
                            <button class="bg-gray-600 text-gray-400 px-4 py-2 rounded-lg font-semibold cursor-not-allowed">
                                Tidak Tersedia
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="gradient-orange hover:glow-orange-strong px-12 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 px-8 gradient-dark relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold mb-6">
                    Mengapa Memilih<br/>
                    <span class="text-gradient">VehiClick?</span>
                </h2>
                <div class="w-24 h-1 gradient-orange mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="card-hover bg-black/50 backdrop-blur-sm rounded-2xl p-8 text-center border border-gray-800 hover:border-orange-400">
                    <div class="w-16 h-16 gradient-orange rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gradient">Kendaraan Terjamin</h3>
                    <p class="text-gray-300">Semua kendaraan telah melalui inspeksi ketat dan dilengkapi dengan asuransi komprehensif untuk keamanan Anda.</p>
                </div>

                <div class="card-hover bg-black/50 backdrop-blur-sm rounded-2xl p-8 text-center border border-gray-800 hover:border-orange-400">
                    <div class="w-16 h-16 gradient-orange rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gradient">Layanan 24/7</h3>
                    <p class="text-gray-300">Customer service yang siap membantu Anda kapan saja dengan respon cepat dan solusi terbaik.</p>
                </div>

                <div class="card-hover bg-black/50 backdrop-blur-sm rounded-2xl p-8 text-center border border-gray-800 hover:border-orange-400">
                    <div class="w-16 h-16 gradient-orange rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gradient">Harga Transparan</h3>
                    <p class="text-gray-300">Tidak ada biaya tersembunyi. Semua biaya dijelaskan dengan jelas sebelum Anda melakukan pemesanan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-8 gradient-orange relative overflow-hidden">
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h2 class="text-5xl font-bold text-black mb-6">
                Siap Memulai Perjalanan Anda?
            </h2>
            <p class="text-xl text-gray-800 mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan ribuan pelanggan yang mempercayai VehiClick untuk kebutuhan transportasi mereka.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-black hover:bg-gray-800 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105 glow-orange-strong">
                    <i class="fas fa-rocket mr-2"></i>
                    Mulai Sewa Sekarang
                </button>
                <button class="border-2 border-black hover:bg-black hover:text-white text-black px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-phone mr-2"></i>
                    Hubungi Kami
                </button>
            </div>
        </div>
        
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-20 h-20 border-4 border-black rounded-full animate-spin"></div>
            <div class="absolute top-32 right-20 w-16 h-16 border-4 border-black rounded-full animate-ping"></div>
            <div class="absolute bottom-20 left-32 w-12 h-12 border-4 border-black rounded-full animate-bounce"></div>
        </div>
    </section>

    <footer>
        <!-- Footer -->
        @include('components.footer')
    </footer>
</div>

<script>
    // Category filtering functionality
    function showCategory(category) {
        const allVehicles = document.querySelectorAll('.vehicle-card');
        const categoryTabs = document.querySelectorAll('.category-tab');
        
        // Remove active class from all tabs
        categoryTabs.forEach(tab => {
            tab.classList.remove('active');
            tab.classList.add('border-gray-600');
            tab.classList.remove('gradient-orange');
        });
        
        // Add active class to clicked tab
        event.target.classList.add('active');
        event.target.classList.remove('border-gray-600');
        
        // Show/hide vehicles based on category
        allVehicles.forEach((vehicle, index) => {
            if (category === 'all') {
                vehicle.style.display = 'block';
                setTimeout(() => {
                    vehicle.style.opacity = '1';
                    vehicle.style.transform = 'translateY(0)';
                }, index * 100);
            } else {
                if (vehicle.classList.contains(category)) {
                    vehicle.style.display = 'block';
                    setTimeout(() => {
                        vehicle.style.opacity = '1';
                        vehicle.style.transform = 'translateY(0)';
                    }, index * 100);
                } else {
                    vehicle.style.opacity = '0';
                    vehicle.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        vehicle.style.display = 'none';
                    }, 300);
                }
            }
        });
    }

    // Initialize vehicles with animation
    window.addEventListener('load', () => {
        const vehicles = document.querySelectorAll('.vehicle-card');
        vehicles.forEach((vehicle, index) => {
            vehicle.style.opacity = '0';
            vehicle.style.transform = 'translateY(30px)';
            setTimeout(() => {
                vehicle.style.transition = 'all 0.6s ease-out';
                vehicle.style.opacity = '1';
                vehicle.style.transform = 'translateY(0)';
            }, index * 150);
        });
    });

    // Add interactive hover effects to vehicle cards
    document.querySelectorAll('.vehicle-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Search functionality
    const searchInput = document.querySelector('input[placeholder="Cari kendaraan..."]');
    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const vehicles = document.querySelectorAll('.vehicle-card');
        
        vehicles.forEach(vehicle => {
            const vehicleName = vehicle.querySelector('h3').textContent.toLowerCase();
            const vehicleDesc = vehicle.querySelector('p').textContent.toLowerCase();
            
            if (vehicleName.includes(searchTerm) || vehicleDesc.includes(searchTerm)) {
                vehicle.style.display = 'block';
                vehicle.style.opacity = '1';
                vehicle.style.transform = 'translateY(0)';
            } else {
                vehicle.style.opacity = '0';
                vehicle.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    vehicle.style.display = 'none';
                }, 300);
            }
        });
    });

    // Dynamic particle generation
    function createParticle() {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.width = Math.random() * 3 + 2 + 'px';
        particle.style.height = particle.style.width;
        particle.style.animationDelay = Math.random() * 10 + 's';
        
        document.querySelector('.fixed.inset-0').appendChild(particle);
        
        setTimeout(() => {
            particle.remove();
        }, 10000);
    }

    // Generate particles periodically
    setInterval(createParticle, 3000);

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading states to buttons
    document.querySelectorAll('button').forEach(button => {
        if (button.textContent.includes('Sewa')) {
            button.addEventListener('click', function() {
                const originalText = this.textContent;
                this.textContent = 'Memproses...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.textContent = originalText;
                    this.disabled = false;
                }, 2000);
            });
        }
    });
</script>

@endsection