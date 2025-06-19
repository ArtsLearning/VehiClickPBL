<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VehiClick</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --secondary: #fb923c;
        }
        
        .glass-morphism {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(249, 115, 22, 0.2);
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
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(249, 115, 22, 0.4);
        }
        
        .bg-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(249, 115, 22, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(251, 146, 60, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(253, 186, 116, 0.08) 0%, transparent 50%);
        }
        
        .social-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }
        
        body {
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #0f0f0f 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="grad1" cx="20%" cy="30%"><stop offset="0%" stop-color="%23f97316" stop-opacity="0.1"/><stop offset="100%" stop-color="transparent"/></radialGradient><radialGradient id="grad2" cx="80%" cy="70%"><stop offset="0%" stop-color="%23fb923c" stop-opacity="0.08"/><stop offset="100%" stop-color="transparent"/></radialGradient></defs><rect width="1000" height="1000" fill="url(%23grad1)"/><rect width="1000" height="1000" fill="url(%23grad2)"/></svg>') center/cover;
            pointer-events: none;
        }

        /* Error message styling */
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 8px;
            padding: 8px 12px;
            margin-top: 8px;
            color: #fca5a5;
            font-size: 0.875rem;
        }

        /* Success message styling */
        .success-message {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 16px;
            color: #86efac;
            font-size: 0.875rem;
        }

        /* Input error state */
        .input-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen relative">
    <!-- Floating decorative elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-10 w-32 h-32 bg-orange-500 rounded-full blur-3xl opacity-15 floating-animation"></div>
        <div class="absolute bottom-1/4 right-10 w-24 h-24 bg-orange-400 rounded-full blur-2xl opacity-12 floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute top-3/4 left-1/3 w-16 h-16 bg-orange-300 rounded-full blur-xl opacity-10 floating-animation" style="animation-delay: -4s;"></div>
    </div>

    <div class="glass-morphism w-full max-w-3xl p-10 rounded-2xl shadow-2xl relative z-10">
        <!-- Header with Logo -->
        <div class="text-center mb-8">
            <!-- Logo Image -->
            <div class="flex justify-center mb-4">
                <img src="/images/logo.png" alt="Logo VehiClick" class="w-20 h-20 object-contain rounded-full shadow-2xl">
            </div>

            <h2 class="text-3xl font-extrabold text-center text-white mb-2">
                Selamat Datang
            </h2>
            <p class="text-center text-gray-300 text-sm mb-2">
                Masuk ke akun <span class="gradient-text font-semibold">VehiClick</span> Anda
            </p>
        </div>

        <!-- Session Status / Success Message -->
        <!-- Jika menggunakan Laravel, uncomment baris berikut -->
        <!-- @if (session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif -->

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            <!-- CSRF Token - Jika menggunakan Laravel -->
             @csrf 

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-envelope mr-2 text-orange-400"></i>
                    Email
                </label>
                <div class="relative">
                    <input type="email" name="email" id="email" required autofocus
                        placeholder="Masukkan email Anda"
                        value="{{ old('email') }}"
                        class="input-focus w-full px-4 py-3 pr-12 bg-white/10 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                </div>
                <!-- Email Error Messages -->
                <!-- @if ($errors->has('email'))
                    <div class="error-message">
                        @foreach ($errors->get('email') as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif -->
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-lock mr-2 text-orange-400"></i>
                    Password
                </label>
                <div class="relative">
                    <input type="password" name="password" id="password" required
                        placeholder="Masukkan password Anda"
                        class="input-focus w-full px-4 py-3 pr-12 bg-white/10 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                    <button type="button" id="togglePassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
                <!-- Password Error Messages -->
                <!-- @if ($errors->has('password'))
                    <div class="error-message">
                        @foreach ($errors->get('password') as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif -->
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember"
                        class="h-4 w-4 text-orange-500 bg-white/10 border-gray-600 rounded focus:ring-orange-500 focus:ring-2">
                    <span class="ml-2 text-gray-300">Ingat saya</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-orange-400 hover:text-orange-300 hover:underline transition-colors duration-200">
                    Lupa password?
                </a>
            </div>

            <!-- reCAPTCHA -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-shield-alt mr-2 text-orange-400"></i>
                    Verifikasi Keamanan
                </label>
                <!-- reCAPTCHA Widget -->
                <div class="flex justify-center">
                    <!-- Untuk Laravel dengan NoCaptcha package -->
                     <!-- {!! NoCaptcha::display() !!} --> 
                    
                    <!-- Contoh reCAPTCHA placeholder (ganti dengan yang asli) -->
                    <div class="g-recaptcha" data-sitekey="6Lc7FWQrAAAAAHkknzK9BefIewPNeoQhF7754nT8"></div>
                </div>
                
                <!-- reCAPTCHA Error Messages -->
                <!-- @if ($errors->has('g-recaptcha-response'))
                    <div class="error-message">
                        @foreach ($errors->get('g-recaptcha-response') as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif -->
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="btn-primary w-full text-white font-semibold py-3 rounded-xl shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-transparent">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    MASUK
                </button>
            </div>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-grow border-t border-gray-600"></div>
            <span class="mx-4 text-gray-400 text-sm">atau masuk dengan</span>
            <div class="flex-grow border-t border-gray-600"></div>
        </div>

        <!-- Social Buttons - Bagian yang dimodifikasi -->
        <div class="space-y-3">
            <a href="{{ route('google.redirect') }}" class="social-btn w-full flex items-center justify-center gap-3 rounded-xl py-3 hover:bg-white/20 transition-all duration-200">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                <span class="text-white font-medium">Google</span>
            </a>
            <button class="social-btn w-full flex items-center justify-center gap-3 rounded-xl py-3 hover:bg-white/20 transition-all duration-200">
                <img src="https://www.svgrepo.com/show/448224/facebook.svg" alt="Facebook" class="w-5 h-5">
                <span class="text-white font-medium">Facebook</span>
            </button>
        </div>

        <!-- Register Link -->
        <p class="mt-6 text-center text-sm text-gray-400">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-orange-400 font-medium hover:text-orange-300 hover:underline transition-colors duration-200">
                Daftar sekarang
            </a>
        </p>
        
        <!-- Footer -->
        <div class="text-center mt-6">
            <p class="text-gray-500 text-xs">
                &copy; 2025 VehiClick. Semua hak dilindungi.
            </p>
        </div>
    </div>

    <!-- reCAPTCHA Script -->
    <!-- Untuk Laravel dengan NoCaptcha package -->
    <!-- {!! NoCaptcha::renderJs() !!} -->
    
    <!-- Manual reCAPTCHA Script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (togglePassword && passwordInput && eyeIcon) {
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
        }

        // Add smooth focus transitions for inputs
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
                this.parentElement.style.transition = 'transform 0.2s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Add hover effects for buttons
        const buttons = document.querySelectorAll('button, .social-btn');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Form submission with loading state
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>MASUK...';
                submitBtn.disabled = true;
                
                // Note: In real Laravel application, remove this setTimeout
                // Laravel will handle the form submission
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        }

        // Add error styling to inputs with validation errors
        document.addEventListener('DOMContentLoaded', function() {
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(function(errorMsg) {
                const input = errorMsg.previousElementSibling?.querySelector('input');
                if (input) {
                    input.classList.add('input-error');
                }
            });
        });
    </script>
</body>
</html>