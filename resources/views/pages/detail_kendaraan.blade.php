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
        box-shadow: 0 25px 50px rgba(255, 107, 53, 0.2);
    }
    
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .slide-in-left {
        animation: slideInLeft 0.8s ease-out;
    }
    
    .slide-in-right {
        animation: slideInRight 0.8s ease-out;
    }
    
    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    .pulse-glow {
        animation: pulseGlow 2s infinite;
    }
    
    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 0 20px rgba(255, 107, 53, 0.3); }
        50% { box-shadow: 0 0 40px rgba(255, 107, 53, 0.6); }
    }
    
    .particle {
        position: absolute;
        background: #ff6b35;
        border-radius: 50%;
        opacity: 0.6;
        animation: particleFloat 8s infinite linear;
    }
    
    @keyframes particleFloat {
        0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
        10% { opacity: 0.6; }
        90% { opacity: 0.6; }
        100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
    }
    
    .review-item {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease-out;
    }
    
    .review-item.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .star-rating {
        color: #ff6b35;
        text-shadow: 0 0 10px rgba(255, 107, 53, 0.5);
    }
    
    .filter-button {
        transition: all 0.3s ease;
        border: 2px solid #374151;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(10px);
    }
    
    .filter-button:hover {
        border-color: #ff6b35;
        background: rgba(255, 107, 53, 0.1);
        transform: translateY(-2px);
    }
    
    .filter-button.active {
        background: linear-gradient(135deg, #ff6b35, #f7931e);
        border-color: #ff6b35;
        color: white;
    }
</style>

<div class="bg-gray-900 text-white min-h-screen overflow-x-hidden">
    <!-- Floating Particles -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="particle" style="left: 10%; width: 4px; height: 4px; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; width: 6px; height: 6px; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; width: 3px; height: 3px; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; width: 5px; height: 5px; animation-delay: 6s;"></div>
        <div class="particle" style="left: 50%; width: 4px; height: 4px; animation-delay: 1s;"></div>
        <div class="particle" style="left: 60%; width: 6px; height: 6px; animation-delay: 3s;"></div>
        <div class="particle" style="left: 70%; width: 3px; height: 3px; animation-delay: 5s;"></div>
        <div class="particle" style="left: 80%; width: 5px; height: 5px; animation-delay: 7s;"></div>
        <div class="particle" style="left: 90%; width: 4px; height: 4px; animation-delay: 2.5s;"></div>
    </div>

    <!-- Hero Background -->
    <div class="relative w-full min-h-screen gradient-dark">
        <!-- Main Content -->
        <main class="relative max-w-7xl mx-auto pt-20 px-4 sm:px-6 md:px-10 z-10">
            
            <!-- Page Title -->
            <div class="text-center mb-16 slide-in-left">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Detail <span class="text-gradient">Kendaraan</span>
                </h1>
                <div class="w-24 h-1 gradient-orange mx-auto rounded-full"></div>
            </div>

            <!-- Vehicle Detail Card -->
            <div class="card-hover bg-black/50 backdrop-blur-sm rounded-2xl p-8 md:p-12 flex flex-col lg:flex-row items-center lg:items-start gap-8 lg:gap-12 mb-16 border border-gray-800 hover:border-orange-400 glow-orange slide-in-right">
                <!-- Vehicle Image -->
                <div class="w-80 h-80 bg-gray-800 rounded-2xl overflow-hidden flex-shrink-0 float-animation glow-orange">
                    <img src="{{ asset('images/calya2023.png') }}" alt="Toyota Calya 2023" class="object-cover w-full h-full hover:scale-110 transition-transform duration-500">
                </div>

                <!-- Vehicle Info -->
                <div class="flex-1 text-white">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gradient">Toyota Calya 2023</h2>
                    
                    <!-- Rating -->
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="text-xl font-semibold">4,9/5</span>
                        <div class="star-rating text-xl">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    
                    <!-- Price & Availability -->
                    <div class="space-y-2 mb-6">
                        <p class="text-2xl font-bold text-gradient">Rp. 420.000,00 / hari</p>
                        <p class="text-lg text-gray-300">Tersedia: <span class="text-orange-400 font-semibold">5 Unit</span></p>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-3 text-gradient">Deskripsi Produk</h3>
                        <p class="text-gray-300 text-lg leading-relaxed">
                            Toyota Calya 2023 adalah kendaraan keluarga yang nyaman dan ekonomis. Dilengkapi dengan fitur-fitur modern dan sistem keamanan terdepan untuk perjalanan yang aman dan menyenangkan.
                        </p>
                    </div>

                    <!-- Action Button -->
                    <div class="flex justify-end">
                        <button onclick="document.getElementById('popupModal').classList.remove('hidden')" 
                                class="gradient-orange hover:glow-orange-strong px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105 pulse-glow">
                            <i class="fas fa-calendar-check mr-2"></i>
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <section class="slide-in-left">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        Ulasan <span class="text-gradient">Produk</span>
                    </h2>
                    <div class="w-24 h-1 gradient-orange mx-auto rounded-full"></div>
                </div>

                <!-- Rating Summary -->
                <div class="card-hover bg-black/50 backdrop-blur-sm rounded-2xl p-6 md:p-8 border border-gray-800 hover:border-orange-400 glow-orange mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="mb-6 lg:mb-0 text-center lg:text-left">
                        <p class="text-2xl font-bold mb-2 text-gradient">4,9/5 (127 Ulasan)</p>
                        <div class="star-rating text-2xl">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="flex flex-wrap gap-3 justify-center lg:justify-end">
                        @foreach ([
                            'Semua' => 127,
                            '5 Bintang' => 98,
                            '4 Bintang' => 23,
                            '3 Bintang' => 4,
                            '2 Bintang' => 2,
                            '1 Bintang' => 0,
                            'Dengan Komentar' => 89
                        ] as $filter => $count)
                            <button class="filter-button rounded-full px-4 py-2 text-sm font-medium hover:text-white transition-all duration-300 transform hover:scale-105">
                                {{ $filter }} ({{ $count }})
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Review Items -->
                <div class="bg-black/50 backdrop-blur-sm rounded-2xl border border-gray-800 overflow-hidden glow-orange">
                    <div class="divide-y divide-gray-700 max-h-96 overflow-y-auto">
                        @foreach (range(1, 5) as $i)
                            <article class="review-item flex items-start space-x-4 p-6 hover:bg-gray-800/30 transition-colors duration-300">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('images/artur.png') }}" alt="User Avatar" 
                                         class="w-12 h-12 rounded-full border-2 border-orange-400 glow-orange" />
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-semibold text-lg text-gradient">Muhammad Arthur</h4>
                                        <span class="text-sm text-gray-400">2025-04-29 19:30</span>
                                    </div>
                                    <div class="star-rating text-sm mb-3">
                                        @for ($s = 0; $s < 5; $s++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                    @if ($i === 1)
                                        <p class="text-gray-300 leading-relaxed">
                                            Kendaraan yang saya pinjam pada aplikasi ini sangat bersih dan terawat dengan baik. Pelayanan juga sangat memuaskan, pasti akan menggunakan lagi!
                                        </p>
                                    @elseif ($i === 2)
                                        <p class="text-gray-300 leading-relaxed">
                                            Proses booking mudah dan cepat. Mobil sesuai dengan foto dan deskripsi. Recommended!
                                        </p>
                                    @elseif ($i === 3)
                                        <p class="text-gray-300 leading-relaxed">
                                            Harga terjangkau dengan kualitas kendaraan yang prima. Tim support juga responsif.
                                        </p>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                <nav class="flex justify-center items-center space-x-4 mt-8 text-orange-400 font-semibold select-none" aria-label="Pagination">
                    <button class="hover:text-orange-300 transition-colors duration-300 transform hover:scale-110 text-lg" aria-label="Previous page">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    @for ($p = 1; $p <= 4; $p++)
                        <button class="w-10 h-10 rounded-full {{ $p === 1 ? 'gradient-orange text-white' : 'hover:bg-orange-400/20' }} transition-all duration-300 transform hover:scale-110 flex items-center justify-center">
                            {{ $p }}
                        </button>
                    @endfor
                    <span class="text-gray-500">...</span>
                    <button class="hover:text-orange-300 transition-colors duration-300 transform hover:scale-110 text-lg" aria-label="Next page">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </section>
        </main>

        <!-- Modal Popup -->
        @include('components.pop-up_pesan')
    </div>
</div>

<script>
    // Intersection Observer for review items animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 100);
            }
        });
    }, {
        threshold: 0.1
    });

    document.querySelectorAll('.review-item').forEach(item => {
        observer.observe(item);
    });

    // Add interactive hover effects to cards
    document.querySelectorAll('.card-hover').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Filter button interactions
    document.querySelectorAll('.filter-button').forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            document.querySelectorAll('.filter-button').forEach(btn => {
                btn.classList.remove('active');
            });
            // Add active class to clicked button
            button.classList.add('active');
        });
    });

    // Set first filter as active by default
    document.querySelector('.filter-button').classList.add('active');

    // Dynamic particle generation
    function createParticle() {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.width = Math.random() * 4 + 2 + 'px';
        particle.style.height = particle.style.width;
        particle.style.animationDelay = Math.random() * 8 + 's';
        
        document.querySelector('.fixed.inset-0').appendChild(particle);
        
        setTimeout(() => {
            particle.remove();
        }, 8000);
    }

    // Generate particles periodically
    setInterval(createParticle, 3000);

    // Add loading animation
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });

    // Smooth scroll for better UX
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

@endsection