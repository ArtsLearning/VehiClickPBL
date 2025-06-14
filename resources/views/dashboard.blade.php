@extends('layouts.app')

@section('content')
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
        }
        
        .filter-btn.active {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.4);
        }
        
        .vehicle-card {
            background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
            border: 1px solid #333;
        }
        
        .vehicle-card:hover {
            border-color: #ff6b35;
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

        .recent-activity {
            background: linear-gradient(145deg, #1f2937, #374151);
            border: 1px solid #4b5563;
            border-radius: 12px;
            padding: 1.5rem;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: rgba(255, 107, 53, 0.05);
            border-radius: 8px;
            border-left: 4px solid #ff6b35;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: rgba(255, 107, 53, 0.1);
            transform: translateX(5px);
        }
    </style>

    <div class="min-h-screen bg-gray-900 text-white">
            <!-- Setelah navbar -->
            <div class="pt-24 px-6"> <!-- ganti p-6 menjadi pt-24 px-6 -->
                <div class="welcome-card text-white relative z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold mb-2">Welcome Back!</h1>
                            <p class="text-xl opacity-90">Ready to explore our vehicle collection?</p>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold">{{ date('d') }}</div>
                            <div class="text-lg">{{ date('M Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Quick Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-car text-orange-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient">32</h3>
                    <p class="text-gray-300">Available Cars</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-motorcycle text-orange-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient">18</h3>
                    <p class="text-gray-300">Available Motorcycles</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-truck text-orange-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient">8</h3>
                    <p class="text-gray-300">Available Trucks</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-orange-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient">2</h3>
                    <p class="text-gray-300">Active Rentals</p>
                </div>
            </div>

            <!-- My Rentals Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-bold mb-4">
                        My <span class="text-gradient">Active Rentals</span>
                    </h2>
                    <div class="space-y-4">
                        <div class="vehicle-card rounded-xl p-6 flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                                     alt="Toyota Camry" class="w-16 h-16 rounded-lg object-cover mr-4">
                                <div>
                                    <h3 class="text-lg font-bold">Toyota Camry 2023</h3>
                                    <p class="text-gray-400">B 1234 ABC</p>
                                    <p class="text-sm text-orange-400">Return: Dec 15, 2024</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl font-bold text-gradient">$80/day</p>
                                <button class="mt-2 bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Extend
                                </button>
                            </div>
                        </div>

                        <div class="vehicle-card rounded-xl p-6 flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                                     alt="Yamaha R1" class="w-16 h-16 rounded-lg object-cover mr-4">
                                <div>
                                    <h3 class="text-lg font-bold">Yamaha R1 2022</h3>
                                    <p class="text-gray-400">B 5678 DEF</p>
                                    <p class="text-sm text-orange-400">Return: Dec 20, 2024</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl font-bold text-gradient">$45/day</p>
                                <button class="mt-2 bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Extend
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-4">
                        Recent <span class="text-gradient">Activity</span>
                    </h2>
                    <div class="recent-activity">
                        <div class="activity-item">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Toyota Camry Rented</p>
                                <p class="text-sm text-gray-400">2 days ago</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <i class="fas fa-star text-yellow-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Rated BMW M3</p>
                                <p class="text-sm text-gray-400">5 days ago</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <i class="fas fa-calendar text-blue-400 mr-3"></i>
                            <div>
                                <p class="font-medium">Booking Confirmed</p>
                                <p class="text-sm text-gray-400">1 week ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-gray-800 rounded-xl p-6 mb-8">
                <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                    <!-- Search Bar -->
                    <div class="search-container w-full lg:w-1/2">
                        <input type="text" 
                               id="searchInput"
                               placeholder="Search vehicles by name, model, or license plate..." 
                               class="search-input w-full px-4 py-3 rounded-lg focus:outline-none">
                        <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    
                    <!-- Category Filters -->
                    <div class="flex flex-wrap gap-3">
                        <button class="filter-btn active px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-category="all">
                            All Vehicles
                        </button>
                        <button class="filter-btn px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-category="car">
                            <i class="fas fa-car mr-2"></i>Cars
                        </button>
                        <button  class="filter-btn px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-category="motorcycle">
                            <i class="fas fa-motorcycle mr-2"></i>Motorcycles
                        </button>
                        <button class="filter-btn px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-category="bicycle">
                            <i class="fas fa-bicycle mr-2"></i>Bicycles
                        </button>
                    </div>
                </div>
            </div>

            <!-- Available Vehicles Section -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold">
                    Ketersediaan <span class="text-gradient">kendaraan</span>
                </h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-400">Found 58 vehicles</span>
                </div>
            </div>

            <!-- Vehicles Grid -->
            <div id="vehicleGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Car 1 -->
                <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="car">
                    <div class="availability-badge available">Available</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Toyota Camry" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Toyota Camry 2023</h3>
                        <p class="text-gray-400 mb-4">License: B 1234 ABC</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-gradient">$80/day</span>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <span class="ml-1">4.8</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                                Book Now
                            </button>
                            <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Motorcycle 1 -->
                <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="motorcycle">
                    <div class="availability-badge available">Available</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Yamaha R1" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Yamaha R1 2022</h3>
                        <p class="text-gray-400 mb-4">License: B 5678 DEF</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-gradient">$45/day</span>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <span class="ml-1">4.9</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                                Book Now
                            </button>
                            <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Bicycle 1 -->
                <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="bicycle">
                    <div class="availability-badge available">Available</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Mountain Bike" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Trek Mountain Bike</h3>
                        <p class="text-gray-400 mb-4">ID: BK-001</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-gradient">$15/day</span>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <span class="ml-1">4.7</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                                Book Now
                            </button>
                            <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Car 2 -->
                <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="car">
                    <div class="availability-badge available">Available</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1549924231-f129b911e442?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="BMW M3" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">BMW M3 2023</h3>
                        <p class="text-gray-400 mb-4">License: B 3456 JKL</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-gradient">$150/day</span>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <span class="ml-1">4.9</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                                Book Now
                            </button>
                            <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Motorcycle 2 -->
                <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="motorcycle">
                    <div class="availability-badge available">Available</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Honda CBR" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Honda CBR 600RR</h3>
                        <p class="text-gray-400 mb-4">License: B 7890 MNO</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-gradient">$50/day</span>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <span class="ml-1">4.6</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                                Book Now
                            </button>
                            <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Car 3 -->
                <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="car">
                    <div class="availability-badge available">Available</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Mercedes C-Class" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Mercedes C-Class</h3>
                        <p class="text-gray-400 mb-4">License: B 2468 PQR</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-gradient">$100/day</span>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <span class="ml-1">4.8</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                                Book Now
                            </button>
                            <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Bicycle 2 -->
                <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="bicycle">
                    <div class="availability-badge available">Available</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1571068316344-75bc76f77890?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Road Bike" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Specialized Road Bike</h3>
                        <p class="text-gray-400 mb-4">ID: BK-002</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-gradient">$20/day</span>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <span class="ml-1">4.8</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                                Book Now
                            </button>
                            <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Motorcycle 3 -->
                <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="motorcycle">
                    <div class="availability-badge available">Available</div>
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1572306899792-83d0aa8bb3cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Kawasaki Ninja" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Kawasaki Ninja ZX-10R</h3>
                        <p class="text-gray-400 mb-4">License: B 9753 VWX</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-gradient">$55/day</span>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <span class="ml-1">4.7</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                                Book Now
                            </button>
                            <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Pagination -->
            <div class="flex justify-center mt-12 pb-8">
                <div class="flex items-center space-x-2">
                    <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-lg">1</button>
                    <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors">2</button>
                    <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors">3</button>
                    <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900">
        @include('components.footer')
    </footer>

    <script>
        // Filter functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        const vehicleCards = document.querySelectorAll('.vehicle-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                const category = button.getAttribute('data-category');

                vehicleCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            
            vehicleCards.forEach(card => {
                const vehicleName = card.querySelector('h3').textContent.toLowerCase();
                const licensePlate = card.querySelector('p').textContent.toLowerCase();
                
                if (vehicleName.includes(searchTerm) || licensePlate.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Add hover effects to cards
        vehicleCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.querySelector('img').style.transform = 'scale(1.1)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.querySelector('img').style.transform = 'scale(1)';
            });
        });

        // Add loading animation
        window.addEventListener('load', () => {
            vehicleCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Initialize cards with animation
        vehicleCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.5s ease';
        });

        // Book Now button functionality
        document.querySelectorAll('.vehicle-card button').forEach(button => {
            if (button.textContent.includes('Book Now')) {
                button.addEventListener('click', (e) => {
                    const card = e.target.closest('.vehicle-card');
                    const vehicleName = card.querySelector('h3').textContent;
                    alert(`Booking process started for ${vehicleName}!`);
                });
            }
        });
    </script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection