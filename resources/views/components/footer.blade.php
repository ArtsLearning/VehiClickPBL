<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VehiClick - Modern Footer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .glass-morphism {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #f97316, #fb923c, #fdba74);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(249, 115, 22, 0.3); }
            50% { box-shadow: 0 0 30px rgba(249, 115, 22, 0.6); }
        }
        
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        
        .bg-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(249, 115, 22, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(251, 146, 60, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(253, 186, 116, 0.1) 0%, transparent 50%);
        }
    </style>
</head>
<body class="bg-gray-900">
    <!-- Demo content untuk menunjukkan footer -->
    <div class="h-screen bg-gradient-to-br from-gray-900 to-black flex items-center justify-center">
        <div class="text-center text-white">
            <h1 class="text-4xl font-bold mb-4">VehiClick</h1>
            <p class="text-gray-400">Scroll down untuk melihat footer</p>
        </div>
    </div>

    <!-- Enhanced Footer -->
    <footer class="relative bg-black bg-pattern overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-orange-500 rounded-full blur-3xl floating-animation"></div>
            <div class="absolute bottom-10 right-10 w-24 h-24 bg-orange-400 rounded-full blur-2xl floating-animation" style="animation-delay: -2s;"></div>
            <div class="absolute top-1/2 left-1/3 w-16 h-16 bg-orange-300 rounded-full blur-xl floating-animation" style="animation-delay: -4s;"></div>
        </div>

        <div class="relative z-10 py-20 px-4 sm:px-8">
            <div class="max-w-7xl mx-auto">
                <!-- Header Section -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center pulse-glow">
                            <i class="fas fa-car text-white text-xl"></i>
                        </div>
                        <h2 class="text-4xl font-bold gradient-text">VehiClick</h2>
                    </div>
                    <p class="text-gray-400 max-w-2xl mx-auto text-lg leading-relaxed">
                        Solusi transportasi terdepan dengan teknologi modern untuk perjalanan yang nyaman dan terpercaya di seluruh Indonesia.
                    </p>
                </div>

                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                    <!-- Company Info -->
                    <div class="glass-morphism rounded-2xl p-6 hover-lift">
                        <h4 class="text-xl font-bold text-orange-400 mb-6 flex items-center">
                            <i class="fas fa-building mr-3"></i>
                            Tentang Kami
                        </h4>
                        <div class="space-y-4 text-gray-300">
                            <p class="text-sm leading-relaxed">
                                Platform rental kendaraan terpercaya yang menghubungkan penyedia dengan pelanggan melalui teknologi digital.
                            </p>
                            <div class="flex space-x-4 pt-4">
                                <a href="#" class="w-10 h-10 bg-orange-500/20 rounded-full flex items-center justify-center hover:bg-orange-500 transition-all duration-300 group">
                                    <i class="fab fa-facebook-f text-orange-400 group-hover:text-white"></i>
                                </a>
                                <a href="#" class="w-10 h-10 bg-orange-500/20 rounded-full flex items-center justify-center hover:bg-orange-500 transition-all duration-300 group">
                                    <i class="fab fa-instagram text-orange-400 group-hover:text-white"></i>
                                </a>
                                <a href="#" class="w-10 h-10 bg-orange-500/20 rounded-full flex items-center justify-center hover:bg-orange-500 transition-all duration-300 group">
                                    <i class="fab fa-twitter text-orange-400 group-hover:text-white"></i>
                                </a>
                                <a href="#" class="w-10 h-10 bg-orange-500/20 rounded-full flex items-center justify-center hover:bg-orange-500 transition-all duration-300 group">
                                    <i class="fab fa-youtube text-orange-400 group-hover:text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="glass-morphism rounded-2xl p-6 hover-lift">
                        <h4 class="text-xl font-bold text-orange-400 mb-6 flex items-center">
                            <i class="fas fa-cogs mr-3"></i>
                            Layanan Kami
                        </h4>
                        <ul class="space-y-4">
                            <li>
                                <a href="#" class="flex items-center text-gray-300 hover:text-white transition duration-300 group p-2 rounded-lg hover:bg-orange-500/10">
                                    <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500 transition-all">
                                        <i class="fas fa-car text-orange-400 group-hover:text-white text-sm"></i>
                                    </div>
                                    <span>Rental Mobil Premium</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-300 hover:text-white transition duration-300 group p-2 rounded-lg hover:bg-orange-500/10">
                                    <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500 transition-all">
                                        <i class="fas fa-motorcycle text-orange-400 group-hover:text-white text-sm"></i>
                                    </div>
                                    <span>Rental Motor</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-300 hover:text-white transition duration-300 group p-2 rounded-lg hover:bg-orange-500/10">
                                    <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500 transition-all">
                                        <i class="fas fa-handshake text-orange-400 group-hover:text-white text-sm"></i>
                                    </div>
                                    <span>Program Kemitraan</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-300 hover:text-white transition duration-300 group p-2 rounded-lg hover:bg-orange-500/10">
                                    <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500 transition-all">
                                        <i class="fas fa-users text-orange-400 group-hover:text-white text-sm"></i>
                                    </div>
                                    <span>Corporate Solution</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Support -->
                    <div class="glass-morphism rounded-2xl p-6 hover-lift">
                        <h4 class="text-xl font-bold text-orange-400 mb-6 flex items-center">
                            <i class="fas fa-life-ring mr-3"></i>
                            Bantuan & Dukungan
                        </h4>
                        <ul class="space-y-4">
                            <li>
                                <a href="#" class="flex items-center text-gray-300 hover:text-white transition duration-300 group p-2 rounded-lg hover:bg-orange-500/10">
                                    <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500 transition-all">
                                        <i class="fas fa-question-circle text-orange-400 group-hover:text-white text-sm"></i>
                                    </div>
                                    <span>FAQ & Bantuan</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-300 hover:text-white transition duration-300 group p-2 rounded-lg hover:bg-orange-500/10">
                                    <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500 transition-all">
                                        <i class="fas fa-file-contract text-orange-400 group-hover:text-white text-sm"></i>
                                    </div>
                                    <span>Syarat & Ketentuan</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-300 hover:text-white transition duration-300 group p-2 rounded-lg hover:bg-orange-500/10">
                                    <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500 transition-all">
                                        <i class="fas fa-shield-alt text-orange-400 group-hover:text-white text-sm"></i>
                                    </div>
                                    <span>Kebijakan Privasi</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-300 hover:text-white transition duration-300 group p-2 rounded-lg hover:bg-orange-500/10">
                                    <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500 transition-all">
                                        <i class="fas fa-headset text-orange-400 group-hover:text-white text-sm"></i>
                                    </div>
                                    <span>Pusat Bantuan</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div class="glass-morphism rounded-2xl p-6 hover-lift">
                        <h4 class="text-xl font-bold text-orange-400 mb-6 flex items-center">
                            <i class="fas fa-phone mr-3"></i>
                            Hubungi Kami
                        </h4>
                        <div class="space-y-4">
                            <div class="flex items-start p-3 bg-orange-500/5 rounded-lg">
                                <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 mt-1">
                                    <i class="fas fa-map-marker-alt text-orange-400 text-sm"></i>
                                </div>
                                <div class="text-gray-300 text-sm">
                                    <p class="font-medium mb-1">Politeknik Negeri Batam</p>
                                    <p class="text-gray-400 leading-relaxed">Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau, 29461</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-3 bg-orange-500/5 rounded-lg">
                                <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-envelope text-orange-400 text-sm"></i>
                                </div>
                                <a href="mailto:support@vehiclick.id" class="text-gray-300 hover:text-orange-400 transition text-sm">
                                    support@vehiclick.id
                                </a>
                            </div>

                            <div class="flex items-center p-3 bg-orange-500/5 rounded-lg">
                                <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-phone text-orange-400 text-sm"></i>
                                </div>
                                <a href="tel:+6281234567890" class="text-gray-300 hover:text-orange-400 transition text-sm">
                                    +62 812-3456-7890
                                </a>
                            </div>

                            <div class="flex items-center p-3 bg-orange-500/5 rounded-lg">
                                <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-clock text-orange-400 text-sm"></i>
                                </div>
                                <div class="text-gray-300 text-sm">
                                    <p>24/7 Customer Support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Newsletter Section -->
                <div class="glass-morphism rounded-2xl p-8 mb-12 text-center">
                    <h3 class="text-2xl font-bold gradient-text mb-4">Berlangganan Newsletter</h3>
                    <p class="text-gray-400 mb-6 max-w-2xl mx-auto">
                        Dapatkan penawaran terbaik, tips perjalanan, dan update terbaru langsung di email Anda.
                    </p>
                    <div class="flex flex-col sm:flex-row max-w-md mx-auto gap-3">
                        <input 
                            type="email" 
                            placeholder="Masukkan email Anda"
                            class="flex-1 px-4 py-3 bg-white/10 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                        >
                        <button class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-medium rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-300 pulse-glow">
                            Berlangganan
                        </button>
                    </div>
                </div>

                <!-- Bottom Section -->
                <div class="border-t border-gray-800 pt-8">
                    <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <p class="text-gray-400 text-sm">&copy; 2025 VehiClick. All Rights Reserved.</p>
                            <div class="flex items-center text-gray-500 text-xs">
                                <span>Dibuat dengan</span>
                                <i class="fas fa-heart text-orange-400 mx-2 animate-pulse"></i>
                                <span>untuk pengalaman transportasi yang lebih baik</span>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap justify-center gap-6">
                            <a href="#" class="text-gray-400 hover:text-orange-400 text-sm transition duration-300 hover:underline">Sitemap</a>
                            <a href="#" class="text-gray-400 hover:text-orange-400 text-sm transition duration-300 hover:underline">Karier</a>
                            <a href="#" class="text-gray-400 hover:text-orange-400 text-sm transition duration-300 hover:underline">Blog</a>
                            <a href="#" class="text-gray-400 hover:text-orange-400 text-sm transition duration-300 hover:underline">Press Kit</a>
                        </div>
                    </div>
                    
                    <!-- Stats Section -->
                    <div class="mt-8 pt-8 border-t border-gray-800/50">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                            <div class="group">
                                <div class="text-2xl font-bold gradient-text mb-1 group-hover:scale-110 transition-transform">10K+</div>
                                <div class="text-gray-400 text-sm">Pelanggan Puas</div>
                            </div>
                            <div class="group">
                                <div class="text-2xl font-bold gradient-text mb-1 group-hover:scale-110 transition-transform">500+</div>
                                <div class="text-gray-400 text-sm">Kendaraan Tersedia</div>
                            </div>
                            <div class="group">
                                <div class="text-2xl font-bold gradient-text mb-1 group-hover:scale-110 transition-transform">50+</div>
                                <div class="text-gray-400 text-sm">Kota Terjangkau</div>
                            </div>
                            <div class="group">
                                <div class="text-2xl font-bold gradient-text mb-1 group-hover:scale-110 transition-transform">24/7</div>
                                <div class="text-gray-400 text-sm">Customer Support</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Add smooth scrolling and interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Newsletter subscription
            const newsletterForm = document.querySelector('input[type="email"]');
            const subscribeBtn = document.querySelector('button');
            
            if (newsletterForm && subscribeBtn) {
                subscribeBtn.addEventListener('click', function() {
                    const email = newsletterForm.value;
                    if (email && email.includes('@')) {
                        alert('Terima kasih! Anda telah berlangganan newsletter kami.');
                        newsletterForm.value = '';
                    } else {
                        alert('Mohon masukkan email yang valid.');
                    }
                });
                
                newsletterForm.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        subscribeBtn.click();
                    }
                });
            }
            
            // Add hover effects to social media icons
            const socialIcons = document.querySelectorAll('.fab');
            socialIcons.forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.2) rotate(10deg)';
                });
                icon.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1) rotate(0deg)';
                });
            });
        });
    </script>
</body>
</html>