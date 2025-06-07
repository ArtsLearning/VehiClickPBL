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
    
    .video-overlay {
        background: linear-gradient(45deg, rgba(0,0,0,0.7) 0%, rgba(255,107,53,0.1) 100%);
    }
    
    .card-hover {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 25px 50px rgba(255, 107, 53, 0.2);
    }
    
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
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
    
    .benefit-item {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease-out;
    }
    
    .benefit-item.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .typing-animation {
        overflow: hidden;
        border-right: 2px solid #ff6b35;
        white-space: nowrap;
        animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
    }
    
    @keyframes typing {
        from { width: 0; }
        to { width: 100%; }
    }
    
    @keyframes blink-caret {
        from, to { border-color: transparent; }
        50% { border-color: #ff6b35; }
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
</style>

<div class="bg-gray-900 text-white overflow-x-hidden">
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

    <!-- Hero Section -->
    <section id="hero" class="relative h-screen overflow-hidden">
        <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden">
            <video class="w-full h-full object-cover" autoplay muted loop>
                <source src="https://videos.pexels.com/video-files/2053100/2053100-sd_640_360_30fps.mp4" type="video/mp4">
            </video>
        </div>
        
        <div class="video-overlay absolute inset-0 z-10"></div>
        
        <div class="relative z-20 h-full flex flex-col items-center justify-center text-center px-4">
            <div class="space-y-6 max-w-4xl mx-auto">
                <h1 class="text-6xl md:text-8xl font-light text-white mb-4 float-animation">
                    <span class="text-gradient">Vehi</span>Click
                </h1>
                <h2 class="text-3xl md:text-5xl font-light text-orange-400 typing-animation">
                    VehiClick Vehicle Rental App
                </h2>
                <p class="text-xl md:text-2xl text-gray-300 max-w-2xl mx-auto slide-in-left">
                    Experience luxury and convenience with our premium fleet of vehicles
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8 slide-in-right">
                    <button class="gradient-orange hover:glow-orange-strong px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-car mr-2"></i>
                        Explore Vehicles
                    </button>
                    <button class="border-2 border-orange-400 hover:bg-orange-400 hover:text-black px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-play mr-2"></i>
                        Watch Demo
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
            <div class="animate-bounce">
                <i class="fas fa-chevron-down text-orange-400 text-2xl"></i>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 px-8 gradient-dark relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold mb-6">
                    Pilih Platform Rental<br/>
                    <span class="text-gradient">Yang Anda Cari</span>
                </h2>
                <div class="w-24 h-1 gradient-orange mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Car Rental Card -->
                <div class="card-hover bg-black/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-gray-800 hover:border-orange-400 glow-orange">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Car Rental" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <i class="fas fa-car text-orange-400 text-3xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-4 text-gradient">Car Rental</h3>
                        <p class="text-gray-300 mb-6">Premium cars for your perfect journey. From luxury sedans to sporty convertibles.</p>
                        <button class="w-full gradient-orange hover:glow-orange-strong py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                            Explore Cars
                        </button>
                    </div>
                </div>

                <!-- Motorcycle Rental Card -->
                <div class="card-hover bg-black/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-gray-800 hover:border-orange-400 glow-orange">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Motorcycle Rental" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <i class="fas fa-motorcycle text-orange-400 text-3xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-4 text-gradient">Motorcycle Rental</h3>
                        <p class="text-gray-300 mb-6">Feel the freedom with our premium motorcycle collection for urban adventures.</p>
                        <button class="w-full gradient-orange hover:glow-orange-strong py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                            Explore Bikes
                        </button>
                    </div>
                </div>

                <!-- Truck Rental Card -->
                <div class="card-hover bg-black/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-gray-800 hover:border-orange-400 glow-orange">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Truck Rental" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <i class="fas fa-truck text-orange-400 text-3xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-4 text-gradient">Truck Rental</h3>
                        <p class="text-gray-300 mb-6">Heavy-duty trucks for your business needs. Reliable and efficient transportation.</p>
                        <button class="w-full gradient-orange hover:glow-orange-strong py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                            Explore Trucks
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-20 px-8 bg-gray-900 relative overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h3 class="text-lg font-bold text-orange-400 mb-4 tracking-wider">BENEFITS</h3>
                <h2 class="text-5xl font-bold mb-6">
                    Benefit Terbaik Bisa Anda<br/>
                    <span class="text-gradient">Dapatkan Di Platform Kami</span>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="benefit-item flex items-start group">
                        <div class="pulse-glow bg-orange-500 h-12 w-12 rounded-full flex items-center justify-center mr-6 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-check text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2 text-gradient">Aplikasi Berkualitas Premium</h4>
                            <p class="text-gray-300 text-lg">Platform yang mudah digunakan untuk pemula maupun yang berpengalaman dalam dunia rental kendaraan.</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item flex items-start group">
                        <div class="pulse-glow bg-orange-500 h-12 w-12 rounded-full flex items-center justify-center mr-6 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-dollar-sign text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2 text-gradient">Harga Sangat Terjangkau</h4>
                            <p class="text-gray-300 text-lg">Dapatkan kendaraan premium dengan harga yang kompetitif dan paket yang fleksibel sesuai budget Anda.</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item flex items-start group">
                        <div class="pulse-glow bg-orange-500 h-12 w-12 rounded-full flex items-center justify-center mr-6 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-cogs text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2 text-gradient">Proses Yang Fleksibel</h4>
                            <p class="text-gray-300 text-lg">Sistem booking online 24/7, dokumentasi mudah, dan customer service yang responsif.</p>
                        </div>
                    </div>

                    <div class="benefit-item flex items-start group">
                        <div class="pulse-glow bg-orange-500 h-12 w-12 rounded-full flex items-center justify-center mr-6 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-shield-alt text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2 text-gradient">Keamanan Terjamin</h4>
                            <p class="text-gray-300 text-lg">Semua kendaraan ter-asuransi dan dilengkapi dengan sistem keamanan terdepan untuk kenyamanan Anda.</p>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="float-animation">
                        <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Benefits" class="rounded-2xl shadow-2xl w-full h-96 object-cover glow-orange">
                    </div>
                    
                    <!-- Floating Stats -->
                    <div class="absolute -top-6 -right-6 bg-orange-500 text-black p-4 rounded-2xl shadow-2xl float-animation" style="animation-delay: 1s;">
                        <div class="text-2xl font-bold">1000+</div>
                        <div class="text-sm">Happy Customers</div>
                    </div>
                    
                    <div class="absolute -bottom-6 -left-6 bg-black border-2 border-orange-400 text-white p-4 rounded-2xl shadow-2xl float-animation" style="animation-delay: 2s;">
                        <div class="text-2xl font-bold text-gradient">24/7</div>
                        <div class="text-sm">Support Available</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-8 gradient-orange relative overflow-hidden">
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h2 class="text-5xl font-bold text-black mb-6">
                Ready to Start Your Journey?
            </h2>
            <p class="text-xl text-gray-800 mb-8 max-w-2xl mx-auto">
                Join thousands of satisfied customers who trust VehiClick for their transportation needs.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-black hover:bg-gray-800 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105 glow-orange-strong">
                    <i class="fas fa-rocket mr-2"></i>
                    Start Booking Now
                </button>
                <button class="border-2 border-black hover:bg-black hover:text-white text-black px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-phone mr-2"></i>
                    Contact Support
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
    // Intersection Observer for benefit items animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 200);
            }
        });
    }, {
        threshold: 0.1
    });

    document.querySelectorAll('.benefit-item').forEach(item => {
        observer.observe(item);
    });

    // Add interactive hover effects to cards
    document.querySelectorAll('.card-hover').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-12px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });
    });

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
    setInterval(createParticle, 2000);

    // Add loading animation
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });
</script>

@endsection