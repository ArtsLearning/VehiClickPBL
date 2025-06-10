<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<nav x-data="{ 
        open: false, 
        scrolled: false,
        servicesOpen: false,
        profileOpen: false,
        mobileMenuOpen: false
     }" 
     x-init="
        window.addEventListener('scroll', () => { 
            scrolled = window.scrollY > 20;
        });
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
     class="fixed top-0 w-full z-50 bg-black shadow-2xl border-b border-orange-500/30 transition-all duration-500 ease-in-out">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
           <!-- Logo Section as a Single Button -->
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-4 p-2 rounded-lg group transition duration-300 hover:bg-orange-500/10">
            <!-- Logo Icon -->
            <div class="relative -mt-2">
                <div class="w-16 h-16 bg-gradient-to-br from-black-400 to-orange-600 rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:rotate-3 shadow-lg shadow-orange-500/25">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10" />
                </div>
                <!-- Pulse effect -->
                <div class="absolute inset-0 bg-orange-400 rounded-xl opacity-20 animate-pulse"></div>
            </div>

            <!-- Brand Text -->
            <div class="flex flex-col justify-center">
                <span class="text-2xl font-bold text-orange-400 tracking-tight leading-tight">VehiClick</span>
                <span class="text-xs text-orange-400 font-medium leading-tight">vehicle rental app</span>
            </div>
        </a>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="" 
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
                            
                            <a href="dashboard" class="dropdown-item group flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
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
                @auth
                    <!-- Profile Dropdown untuk User yang sudah login -->
                    <div class="relative" x-ref="profileDropdown">
                        <button @click="profileOpen = !profileOpen"
                                class="flex items-center space-x-2 text-orange-400 hover:text-orange-300 transition-all duration-300 bg-orange-500/10 hover:bg-orange-500/20 px-3 py-2 rounded-lg">
                            <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                                <span class="text-xs font-semibold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
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
                                <a href="{{ route('dashboard') }}" class="dropdown-item flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
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
                                <hr class="border-orange-500/20 my-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full dropdown-item flex items-center px-4 py-3 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 transition-all duration-200">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" 
                    style="color: #fb923c; 
                            font-weight: 500; 
                            padding: 8px 16px; 
                            border-radius: 8px; 
                            text-decoration: none; 
                            transition: all 0.3s ease; 
                            display: inline-block;"
                    onmouseover="this.style.color='#fdba74'; this.style.background='rgba(251, 146, 60, 0.1)'; this.style.transform='translateY(-1px)'"
                    onmouseout="this.style.color='#fb923c'; this.style.background='transparent'; this.style.transform='translateY(0)'">
                        Login
                    </a>

                    <!-- Register Button -->
                    <a href="{{ route('register') }}" 
                    style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); 
                            color: #fed7aa; 
                            padding: 10px 24px; 
                            border-radius: 50px; 
                            font-weight: 600; 
                            text-decoration: none; 
                            display: inline-block; 
                            transition: all 0.3s ease;
                            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);"
                    onmouseover="this.style.background='linear-gradient(135deg, #ea580c 0%, #c2410c 100%)'; 
                                    this.style.color='white'; 
                                    this.style.transform='translateY(-2px) scale(1.05)'; 
                                    this.style.boxShadow='0 8px 25px rgba(249, 115, 22, 0.4)'"
                    onmouseout="this.style.background='linear-gradient(135deg, #f97316 0%, #ea580c 100%)'; 
                                this.style.color='#fed7aa'; 
                                this.style.transform='translateY(0) scale(1)'; 
                                this.style.boxShadow='0 4px 15px rgba(249, 115, 22, 0.3)'">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile Hamburger Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-orange-400 hover:text-orange-300 transition-all duration-300 p-2 rounded-lg hover:bg-orange-500/10">
                    <svg class="w-6 h-6 transition-transform duration-300" 
                         :class="{ 'rotate-90': mobileMenuOpen }" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileMenuOpen" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 max-h-0"
             x-transition:enter-end="opacity-100 max-h-screen"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 max-h-screen"
             x-transition:leave-end="opacity-0 max-h-0"
             class="md:hidden bg-black border-t border-orange-500/30 overflow-hidden"
             style="display: none;">
            
            <div class="px-4 pt-4 pb-6 space-y-2">
                <!-- Mobile Navigation Links -->
                <a href="#hero" 
                   class="mobile-nav-link block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200">
                    Home
                </a>
                
                <!-- Mobile Services Section -->
                <div class="space-y-2">
                    <button @click="servicesOpen = !servicesOpen"
                            class="mobile-nav-link w-full flex items-center justify-between px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200">
                        <span>Services</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': servicesOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Mobile Services Dropdown -->
                    <div x-show="servicesOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-48"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 max-h-48"
                         x-transition:leave-end="opacity-0 max-h-0"
                         class="ml-4 overflow-hidden"
                         style="display: none;">
                        
                        <div class="space-y-1 border-l-2 border-orange-500/30 pl-4">
                            <a href="#car-rental" class="mobile-service-link group flex items-center px-3 py-2 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200">
                                <div class="w-6 h-6 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500/30 transition-colors">
                                    <svg class="w-3 h-3 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium">Car Rental</div>
                                    <div class="text-xs text-orange-300">Rent premium vehicles</div>
                                </div>
                            </a>
                            
                            <a href="#bike-rental" class="mobile-service-link group flex items-center px-3 py-2 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200">
                                <div class="w-6 h-6 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500/30 transition-colors">
                                    <svg class="w-3 h-3 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium">Bike Rental</div>
                                    <div class="text-xs text-orange-300">Eco-friendly transport</div>
                                </div>
                            </a>
                            
                            <a href="#delivery" class="mobile-service-link group flex items-center px-3 py-2 text-sm text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200">
                                <div class="w-6 h-6 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500/30 transition-colors">
                                    <svg class="w-3 h-3 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium">Delivery Service</div>
                                    <div class="text-xs text-orange-300">Fast & reliable delivery</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <a href="#benefits" 
                   class="mobile-nav-link block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200">
                    Benefits
                </a>
                <a href="#contact" 
                   class="mobile-nav-link block px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200">
                    Contact
                </a>
                
                <!-- Mobile Auth Section -->
                <div class="pt-4 border-t border-orange-500/30">
                    @auth
                        <!-- Mobile Profile Section -->
                        <div class="flex items-center px-4 py-3 bg-orange-500/10 rounded-lg mb-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center mr-3">
                                <span class="text-sm font-semibold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <div class="text-orange-400 font-medium">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-orange-300">Logged in</div>
                            </div>
                        </div>
                        
                        <a href="{{ route('dashboard') }}" 
                           class="mobile-nav-link flex items-center px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200 mb-2">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                            </svg>
                            Dashboard
                        </a>
                        
                        <a href="#profile" 
                           class="mobile-nav-link flex items-center px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200 mb-2">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Profile
                        </a>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="mobile-nav-link w-full flex items-center px-4 py-3 text-orange-400 hover:text-orange-300 hover:bg-orange-500/10 rounded-lg transition-all duration-200">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Logout
                            </button>
                        </form>
                    @else
                        <!-- Mobile Login/Register -->
                        <div class="space-y-3">
                            <a href="{{ route('login') }}" 
                               class="mobile-nav-link block w-full text-center px-4 py-3 text-orange-400 hover:text-orange-300 border border-orange-500/30 hover:border-orange-500/50 rounded-lg transition-all duration-200">
                                Login
                            </a>
                            
                            <a href="{{ route('register') }}" 
                               class="mobile-nav-link block w-full text-center px-4 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg transition-all duration-200 hover:from-orange-600 hover:to-orange-700 shadow-lg">
                                Register
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
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

    /* Mobile Navigation Styles */
    .mobile-nav-link:hover {
        transform: translateX(2px);
    }

    .mobile-service-link:hover {
        transform: translateX(3px);
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

    /* Mobile Menu Animation */
    @media (max-width: 768px) {
        .mobile-nav-link {
            position: relative;
        }

        .mobile-nav-link:before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #f97316, #ea580c);
            transition: width 0.3s ease;
            transform: translateY(-50%);
        }

        .mobile-nav-link:hover:before {
            width: 4px;
        }

        /* Hide mobile menu on larger screens */
        @media (min-width: 769px) {
            .mobile-menu {
                display: none !important;
            }
        }
    }

    /* Smooth transitions for mobile menu */
    .mobile-menu-transition {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Enhanced mobile button styles */
    .mobile-auth-button {
        position: relative;
        overflow: hidden;
    }

    .mobile-auth-button:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s;
    }

    .mobile-auth-button:hover:before {
        left: 100%;
    }