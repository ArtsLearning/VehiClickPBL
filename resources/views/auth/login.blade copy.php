<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VehiClick</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .glass-morphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
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
        
        .bg-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(249, 115, 22, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(251, 146, 60, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(253, 186, 116, 0.1) 0%, transparent 50%);
        }
        
        .input-focus:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #f97316, #ea580c);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #ea580c, #dc2626);
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 bg-pattern">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-10 w-32 h-32 bg-orange-500 rounded-full blur-3xl opacity-20 floating-animation"></div>
        <div class="absolute bottom-1/4 right-10 w-24 h-24 bg-orange-400 rounded-full blur-2xl opacity-20 floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute top-3/4 left-1/3 w-16 h-16 bg-orange-300 rounded-full blur-xl opacity-20 floating-animation" style="animation-delay: -4s;"></div>
    </div>

    <div class="flex min-h-screen items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-2xl">
                        <i class="fas fa-car text-white text-2xl"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-bold gradient-text mb-2">
                    Selamat Datang
                </h2>
                <p class="text-gray-400 text-sm">
                    Masuk ke akun VehiClick Anda
                </p>
            </div>

            <!-- Session Status (Success Message) -->
            <div id="session-status" class="hidden mb-4 p-4 bg-green-500/10 border border-green-500/20 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-400 mr-3"></i>
                    <span class="text-green-400 text-sm">Status berhasil diperbarui</span>
                </div>
            </div>

            <!-- Login Form -->
            <div class="glass-morphism rounded-2xl p-8 shadow-2xl">
                <form class="space-y-6" id="loginForm">
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                autocomplete="username"
                                required 
                                autofocus
                                class="input-focus block w-full pl-10 pr-3 py-3 bg-white/5 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
                                placeholder="Masukkan email Anda"
                            >
                        </div>
                        <div id="email-error" class="hidden mt-2 text-sm text-red-400">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <span>Email tidak valid</span>
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                autocomplete="current-password"
                                required
                                class="input-focus block w-full pl-10 pr-12 py-3 bg-white/5 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
                                placeholder="Masukkan password Anda"
                            >
                            <button 
                                type="button" 
                                id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white transition-colors"
                            >
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        <div id="password-error" class="hidden mt-2 text-sm text-red-400">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <span>Password harus diisi</span>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                id="remember_me" 
                                name="remember" 
                                type="checkbox" 
                                class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-600 bg-white/5 rounded"
                            >
                            <label for="remember_me" class="ml-2 block text-sm text-gray-300">
                                Ingat saya
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <!-- Forgot Password -->
                        <a href="#" class="text-sm text-gray-400 hover:text-orange-400 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-gray-900 rounded-md px-1 py-1">
                            Lupa password?
                        </a>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="btn-primary inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all duration-200"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Masuk
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-transparent text-gray-400">Atau masuk dengan</span>
                        </div>
                    </div>

                    <!-- Social Login -->
                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <button class="w-full inline-flex justify-center py-3 px-4 border border-gray-600 rounded-lg bg-white/5 text-sm font-medium text-gray-300 hover:bg-white/10 hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <i class="fab fa-google text-lg mr-2"></i>
                            Google
                        </button>
                        <button class="w-full inline-flex justify-center py-3 px-4 border border-gray-600 rounded-lg bg-white/5 text-sm font-medium text-gray-300 hover:bg-white/10 hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <i class="fab fa-facebook-f text-lg mr-2"></i>
                            Facebook
                        </button>
                    </div>
                </div>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-400 text-sm">
                        Belum punya akun? 
                        <a href="#" class="text-orange-400 hover:text-orange-300 font-medium transition-colors duration-200">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center">
                <p class="text-gray-500 text-xs">
                    &copy; 2025 VehiClick. Semua hak dilindungi.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            if (type === 'password') {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });

        // Form validation
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function showError(errorElement, show = true) {
            if (show) {
                errorElement.classList.remove('hidden');
            } else {
                errorElement.classList.add('hidden');
            }
        }

        emailInput.addEventListener('blur', function() {
            if (this.value && !validateEmail(this.value)) {
                showError(emailError);
                this.classList.add('border-red-500');
            } else {
                showError(emailError, false);
                this.classList.remove('border-red-500');
            }
        });

        passwordInput.addEventListener('blur', function() {
            if (!this.value) {
                showError(passwordError);
                this.classList.add('border-red-500');
            } else {
                showError(passwordError, false);
                this.classList.remove('border-red-500');
            }
        });

        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let hasError = false;

            // Validate email
            if (!emailInput.value || !validateEmail(emailInput.value)) {
                showError(emailError);
                emailInput.classList.add('border-red-500');
                hasError = true;
            } else {
                showError(emailError, false);
                emailInput.classList.remove('border-red-500');
            }

            // Validate password
            if (!passwordInput.value) {
                showError(passwordError);
                passwordInput.classList.add('border-red-500');
                hasError = true;
            } else {
                showError(passwordError, false);
                passwordInput.classList.remove('border-red-500');
            }

            if (!hasError) {
                // Simulate login process
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Masuk...';
                submitBtn.disabled = true;
                
                setTimeout(() => {
                    // Show success message
                    const sessionStatus = document.getElementById('session-status');
                    sessionStatus.classList.remove('hidden');
                    sessionStatus.scrollIntoView({ behavior: 'smooth' });
                    
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    
                    // In real application, redirect to dashboard
                    setTimeout(() => {
                        alert('Login berhasil! Akan redirect ke dashboard...');
                    }, 1000);
                }, 2000);
            }
        });

        // Auto-hide session status after 5 seconds
        setTimeout(() => {
            const sessionStatus = document.getElementById('session-status');
            if (!sessionStatus.classList.contains('hidden')) {
                sessionStatus.classList.add('hidden');
            }
        }, 5000);
    </script>
</body>
</html>