<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VehiClick Navigation</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <style>
        /* Custom styles for the navigation */
        .nav-link {
            position: relative;
            overflow: hidden;
        }
        
        .nav-link:hover {
            transform: translateY(-1px);
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover:after {
            width: 80%;
        }
        
        .dropdown-item:hover {
            transform: translateX(2px);
        }
        
        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom scrollbar for dropdowns */
        .dropdown-menu::-webkit-scrollbar {
            width: 4px;
        }
        
        .dropdown-menu::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
        }
        
        .dropdown-menu::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-radius: 2px;
        }
        
        /* Pulse animation for logo */
        @keyframes pulse {
            0%, 100% { opacity: 0.2; }
            50% { opacity: 0.4; }
        }

        /* Auto-hide navigation animations */
        .nav-hidden {
            transform: translateY(-100%);
        }
        
        .nav-visible {
            transform: translateY(0);
        }
        
        /* Orange text colors */
        .text-orange-custom {
            color: #ff6b35;
        }
        
        .text-orange-light {
            color: #f7931e;
        }
        
        /* Demo content */
        .demo-content {
            height: 200vh;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            padding: 2rem;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">

<nav x-data="{ 
        open: false, 
        scrolled: false,
        servicesOpen: false,
        profileOpen: false,
        navVisible: true,
        mouseTimer: null,
        lastMouseMove: Date.now()
     }" 
     x-init="
        // Handle scroll
        window.addEventListener('scroll', () => { 
            scrolled = window.scrollY > 20;
        });
        
        // Handle mouse movement for auto-hide
        let hideTimeout;
        
        const showNav = () => {
            navVisible = true;
            clearTimeout(hideTimeout);
        };
        
        const hideNav = () => {
            hideTimeout = setTimeout(() => {
                navVisible = false;
            }, 3000); // Hide after 3 seconds of inactivity
        };
        
        // Show nav on mouse movement
        document.addEventListener('mousemove', (e) => {
            lastMouseMove = Date.now();
            if (e.clientY <= 100) { // Show when mouse is near top
                showNav();
            } else {
                showNav();
                hideNav();
            }
        });
        
        // Show nav when mouse enters nav area
        $el.addEventListener('mouseenter', () => {
            showNav();
        });
        
        // Start hide timer when mouse leaves nav area
        $el.addEventListener('mouseleave', () => {
            hideNav();
        });
        
        // Initial hide timer
        hideNav();
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!$refs.servicesDropdown?.contains(e.target)) {
                servicesOpen = false;
            }
            if (!$refs.profileDropdown?.contains(e.target)) {
                profileOpen = false;
            }
        })
     "
     :class="navVisible ? 'nav-visible' : 'nav-hidden'"
     class="fixed top-0 w-full z-50 bg-black shadow-2xl border-b border-orange-500/30 transition-all duration-500 ease-in-out">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="#" class="flex items-center space-x-3 group">
                    <!-- Logo Icon -->
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:rotate-3 shadow-lg shadow-orange-500/25">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <!-- Pulse effect -->
                        <div class="absolute inset-0 bg-orange-400 rounded-xl opacity-20 animate-pulse"></div>
                    </div>
                    <!-- Brand Text -->
                    <div class="flex flex-col justify-center">
                        <div class="text-2xl font-bold text-orange-400 tracking-tight leading-tight">VehiClick</div>
                        <div class="text-xs text-orange-300 font-medium leading-tight">Smart Booking</div>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="#hero" 
                   class="nav-link text-orange-400 hover:text-orange-300 transition-all duration-300 px-4 py-2 text-sm font-medium rounded-lg hover:bg-orange-500/10">
                    Home
                </a>
                
                <!-- Services Dropdown -->
                <div class="relative" x-ref="servicesDropdown">
                    <button @click="servicesOpen = !servicesOpen"
                            class="nav-link text-orange-400 hover:text-orange-300 transition-all duration-300 px-4 py-2 text-sm font-medium rounded-lg hover:bg-orange-500/10 flex items-center space-x-1">
                        <span>Services</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': servicesOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Services Dropdown Menu -->
                    <div x-show="servicesOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                         class="absolute top-full left-0 mt-2 w-64 bg-black rounded-xl shadow-2xl border border-orange-500/20 overflow-hidden"
                         style="display: none;">
                        
                        <div class="py-2">
                            <a href="#car-rental" class="dropdown-item group flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
                                <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500/30 transition-colors">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-orange-400">Car Rental</div>
                                    <div class="text-xs text-orange-300 group-hover:text-orange-200">Rent premium vehicles</div>
                                </div>
                            </a>
                            
                            <a href="#bike-rental" class="dropdown-item group flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
                                <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500/30 transition-colors">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-orange-400">Bike Rental</div>
                                    <div class="text-xs text-orange-300 group-hover:text-orange-200">Eco-friendly transport</div>
                                </div>
                            </a>
                            
                            <a href="#delivery" class="dropdown-item group flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
                                <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500/30 transition-colors">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-orange-400">Delivery Service</div>
                                    <div class="text-xs text-orange-300 group-hover:text-orange-200">Fast & reliable delivery</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <a href="#benefits" class="nav-link text-orange-400 hover:text-orange-300 transition-all duration-300 px-4 py-2 text-sm font-medium rounded-lg hover:bg-orange-500/10">
                    Benefits
                </a>
                <a href="#contact" class="nav-link text-orange-400 hover:text-orange-300 transition-all duration-300 px-4 py-2 text-sm font-medium rounded-lg hover:bg-orange-500/10">
                    Contact
                </a>
            </div>

            <!-- Desktop Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Profile Dropdown for Authenticated Users (Demo) -->
                <div class="relative" x-ref="profileDropdown">
                    <button @click="profileOpen = !profileOpen"
                            class="flex items-center space-x-2 text-orange-400 hover:text-orange-300 transition-all duration-300 bg-orange-500/10 hover:bg-orange-500/20 px-3 py-2 rounded-lg">
                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                            <span class="text-xs font-semibold text-white">J</span>
                        </div>
                        <span class="text-sm font-medium text-orange-400">John Doe</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': profileOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Profile Dropdown Menu -->
                    <div x-show="profileOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                         class="absolute top-full right-0 mt-2 w-56 bg-black rounded-xl shadow-2xl border border-orange-500/20 overflow-hidden"
                         style="display: none;">
                        
                        <div class="py-2">
                            <a href="#dashboard" class="dropdown-item flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
                                <svg class="w-4 h-4 mr-3 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                </svg>
                                Dashboard
                            </a>
                            <a href="#profile" class="dropdown-item flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
                                <svg class="w-4 h-4 mr-3 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Profile
                            </a>
                            <a href="#settings" class="dropdown-item flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
                                <svg class="w-4 h-4 mr-3 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Settings
                            </a>
                            <hr class="border-orange-500/20 my-2">
                            <button class="w-full dropdown-item flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Login/Register buttons when not authenticated -->
                <div class="flex items-center space-x-4">
                    <a href="#login" 
                       class="text-orange-400 hover:text-orange-300 transition-all duration-300 font-medium px-4 py-2 rounded-lg hover:bg-orange-500/10">
                        Login
                    </a>
                    <a href="#register" 
                       class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-orange-100 hover:text-white px-6 py-2.5 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-orange-500/25 relative overflow-hidden group">
                        <span class="relative z-10 text-orange-100">Get Started</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-orange-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" 
                        class="text-orange-400 hover:text-orange-300 p-2 rounded-lg transition-all duration-300 hover:bg-orange-500/10 transform hover:scale-110">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" 
                              class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" 
                              class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': !open}" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="hidden md:hidden bg-black shadow-2xl border-t border-orange-500/30">
        
        <!-- Navigation Links -->
        <div class="px-4 pt-4 pb-3 space-y-2">
            <a href="#hero" 
               class="block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-300 font-medium">
                🏠 Home
            </a>
            
            <!-- Mobile Services Section -->
            <div class="block px-4 py-3 text-orange-400 font-medium">
                <div class="flex items-center justify-between mb-2">
                    <span>🚗 Services</span>
                </div>
                <div class="ml-4 space-y-2">
                    <a href="#car-rental" class="block px-3 py-2 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded text-sm transition-all duration-300">
                        Car Rental
                    </a>
                    <a href="#bike-rental" class="block px-3 py-2 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded text-sm transition-all duration-300">
                        Bike Rental
                    </a>
                    <a href="#delivery" class="block px-3 py-2 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded text-sm transition-all duration-300">
                        Delivery Service
                    </a>
                </div>
            </div>
            
            <a href="#benefits" 
               class="block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-300">
                ✨ Benefits
            </a>
            <a href="#contact" 
               class="block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-300">
                📞 Contact
            </a>
        </div>

        <!-- Mobile Auth Section -->
        <div class="pt-4 pb-6 border-t border-orange-500/20">
            <div class="px-4 space-y-2">
                <div class="flex items-center space-x-3 px-4 py-3 bg-orange-500/10 rounded-lg mb-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                        <span class="text-sm font-semibold text-white">J</span>
                    </div>
                    <div>
                        <div class="text-orange-400 font-medium">John Doe</div>
                        <div class="text-xs text-orange-300/80">Authenticated User</div>
                    </div>
                </div>
                
                <a href="#dashboard" 
                   class="block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-300">
                    📊 Dashboard
                </a>
                <a href="#profile" 
                   class="block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-300">
                    👤 Profile
                </a>
                <button class="w-full text-left block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-300">
                    🚪 Logout
                </button>
            </div>
            
            <!-- Login/Register for mobile when not authenticated -->
            <div class="px-4 space-y-3 border-t border-orange-500/20 pt-4 mt-4">
                <a href="#login" 
                   class="block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-300 text-center font-medium">
                    🔐 Login
                </a>
                <a href="#register" 
                   class="block bg-gradient-to-r from-orange-500 to-orange-600 text-orange-100 hover:text-white px-4 py-3 rounded-lg font-semibold text-center transition-all duration-300 hover:shadow-lg">
                    🚀 Get Started
                </a>
            </div>
        </div>
    </div>
</nav>



</body>
</html>