<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - VehiClick</title>
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

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen relative py-8">
    <!-- Floating decorative elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-10 w-32 h-32 bg-orange-500 rounded-full blur-3xl opacity-15 floating-animation"></div>
        <div class="absolute bottom-1/4 right-10 w-24 h-24 bg-orange-400 rounded-full blur-2xl opacity-12 floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute top-3/4 left-1/3 w-16 h-16 bg-orange-300 rounded-full blur-xl opacity-10 floating-animation" style="animation-delay: -4s;"></div>
    </div>

    <div class="glass-morphism w-full max-w-3xl p-10 rounded-2xl shadow-2xl relative z-10 mx-4">
        
        <div class="text-center mb-8">
    <!-- Logo Image -->
            <div class="flex justify-center mb-4">
                <img src="/images/logo.png" alt="Logo VehiClick" class="w-20 h-20 object-contain rounded-full shadow-2xl">
            </div>

            <!-- Icon (opsional, bisa dihapus jika sudah ada gambar) -->
            <!--
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-2xl">
                    <i class="fas fa-car text-white text-2xl"></i>
                </div>
            </div>
            -->

            <h2 class="text-3xl font-extrabold text-center text-white mb-2">
                Selamat Datang
            </h2>
            <p class="text-center text-gray-300 text-sm mb-2">
                Masuk ke akun <span class="gradient-text font-semibold">VehiClick</span> Anda
            </p>
        </div>


        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5" id="registerForm">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-user mr-2 text-orange-400"></i>
                    Nama Lengkap
                </label>
                <div class="relative">
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                        placeholder="Masukkan nama lengkap Anda"
                        class="input-focus w-full px-4 py-3 pr-12 bg-white/10 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                </div>
                @if($errors->get('name'))
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ $errors->first('name') }}</span>
                    </div>
                @endif
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-envelope mr-2 text-orange-400"></i>
                    Email
                </label>
                <div class="relative">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        placeholder="Masukkan email Anda"
                        class="input-focus w-full px-4 py-3 pr-12 bg-white/10 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                </div>
                @if($errors->get('email'))
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ $errors->first('email') }}</span>
                    </div>
                @endif
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
                @if($errors->get('password'))
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ $errors->first('password') }}</span>
                    </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-lock mr-2 text-orange-400"></i>
                    Konfirmasi Password
                </label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        placeholder="Konfirmasi password Anda"
                        class="input-focus w-full px-4 py-3 pr-12 bg-white/10 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                    <button type="button" id="togglePasswordConfirm"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-eye" id="eyeIconConfirm"></i>
                    </button>
                </div>
                @if($errors->get('password_confirmation'))
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ $errors->first('password_confirmation') }}</span>
                    </div>
                @endif
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
                    <div class="g-recaptcha" data-sitekey="6LcMoGIrAAAAACZL8-TTA6p8Z7d4ROhZy9qWQqEK"></div>
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
            <div class="pt-2">
                <button type="submit"
                    class="btn-primary w-full text-white font-semibold py-3 rounded-xl shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-transparent">
                    <i class="fas fa-user-plus mr-2"></i>
                    DAFTAR SEKARANG
                </button>
            </div>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-grow border-t border-gray-600"></div>
            <span class="mx-4 text-gray-400 text-sm">atau daftar dengan</span>
            <div class="flex-grow border-t border-gray-600"></div>
        </div>

        <!-- Social Buttons -->
        <div class="space-y-3">
            <button class="social-btn w-full flex items-center justify-center gap-3 rounded-xl py-3 hover:bg-white/20 transition-all duration-200">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                <span class="text-white font-medium">Google</span>
            </button>
            <button class="social-btn w-full flex items-center justify-center gap-3 rounded-xl py-3 hover:bg-white/20 transition-all duration-200">
                <img src="https://www.svgrepo.com/show/448224/facebook.svg" alt="Facebook" class="w-5 h-5">
                <span class="text-white font-medium">Facebook</span>
            </button>
        </div>

        <!-- Login Link -->
        <p class="mt-6 text-center text-sm text-gray-400">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-orange-400 font-medium hover:text-orange-300 hover:underline transition-colors duration-200">
                Masuk di sini
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
        function togglePasswordVisibility(toggleId, passwordId, eyeIconId) {
            const toggle = document.getElementById(toggleId);
            const passwordInput = document.getElementById(passwordId);
            const eyeIcon = document.getElementById(eyeIconId);

            if (toggle && passwordInput && eyeIcon) {
                toggle.addEventListener('click', function() {
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
        }

        // Initialize password toggles
        togglePasswordVisibility('togglePassword', 'password', 'eyeIcon');
        togglePasswordVisibility('togglePasswordConfirm', 'password_confirmation', 'eyeIconConfirm');

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
        const form = document.getElementById('registerForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>MENDAFTAR...';
                submitBtn.disabled = true;
                
                // In real application, remove this setTimeout
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        }

        // Password strength validation
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');

        function validatePasswordMatch() {
            if (confirmPasswordInput.value && passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordInput.style.borderColor = '#ef4444';
            } else {
                confirmPasswordInput.style.borderColor = '#4b5563';
            }
        }

        if (passwordInput && confirmPasswordInput) {
            confirmPasswordInput.addEventListener('input', validatePasswordMatch);
            passwordInput.addEventListener('input', validatePasswordMatch);
        }

        // Real-time validation
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.style.borderColor = '#4b5563';
                }
            });
        });

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