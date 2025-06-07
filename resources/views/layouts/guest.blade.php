<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Black Orange Theme CSS -->
        <style>
            /* Override default styles with black orange theme */
            body {
                font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif;
                color: #ffa500 !important;
                -webkit-font-smoothing: antialiased;
                background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 25%, #2d2d2d 50%, #1a1a1a 75%, #0a0a0a 100%) !important;
                position: relative;
                overflow-x: hidden;
            }

            /* Cute floating background elements */
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image: 
                    radial-gradient(circle at 15% 25%, rgba(255, 165, 0, 0.08) 0%, transparent 50%),
                    radial-gradient(circle at 85% 75%, rgba(255, 140, 0, 0.06) 0%, transparent 50%),
                    radial-gradient(circle at 45% 10%, rgba(255, 69, 0, 0.04) 0%, transparent 50%),
                    radial-gradient(circle at 25% 80%, rgba(255, 165, 0, 0.05) 0%, transparent 50%);
                animation: floatBackground 8s ease-in-out infinite;
                pointer-events: none;
                z-index: 0;
            }

            @keyframes floatBackground {
                0%, 100% { 
                    transform: translateY(0px) rotate(0deg);
                    opacity: 0.6;
                }
                33% { 
                    transform: translateY(-15px) rotate(1deg);
                    opacity: 0.8;
                }
                66% { 
                    transform: translateY(-25px) rotate(-1deg);
                    opacity: 0.7;
                }
            }

            /* Main container - keep original classes but override styles */
            .min-h-screen {
                background: transparent !important;
                position: relative;
                z-index: 1;
            }

            /* Logo container with cute effects */
            .min-h-screen > div:first-child {
                position: relative;
            }

            .min-h-screen > div:first-child::before {
                content: '🤣';
                position: absolute;
                top: -10px;
                right: -10px;
                font-size: 1.2rem;
                animation: bounce 2s ease-in-out infinite;
                z-index: 2;
            }

            @keyframes bounce {
                0%, 100% { 
                    transform: translateY(0px) scale(1);
                    opacity: 0.7;
                }
                50% { 
                    transform: translateY(-8px) scale(1.1);
                    opacity: 1;
                }
            }

            /* Logo link styling */
            .min-h-screen > div:first-child a {
                display: inline-block;
                padding: 15px;
                background: rgba(255, 165, 0, 0.1);
                border: 2px solid rgba(255, 165, 0, 0.3);
                border-radius: 20px;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
                position: relative;
                overflow: hidden;
            }

            .min-h-screen > div:first-child a::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 165, 0, 0.1), transparent);
                transition: left 0.8s ease;
            }

            .min-h-screen > div:first-child a:hover {
                transform: translateY(-3px) scale(1.05);
                border-color: #ffa500;
                box-shadow: 
                    0 10px 30px rgba(255, 165, 0, 0.2),
                    0 0 20px rgba(255, 165, 0, 0.3);
            }

            .min-h-screen > div:first-child a:hover::before {
                left: 100%;
            }

            /* Application logo styling */
            .w-20.h-20 {
                fill: #ffa500 !important;
                color: #ffa500 !important;
                filter: drop-shadow(0 4px 8px rgba(255, 165, 0, 0.3));
                transition: all 0.3s ease;
            }

            .min-h-screen > div:first-child a:hover .w-20.h-20 {
                fill: #ffb84d !important;
                color: #ffb84d !important;
                filter: drop-shadow(0 6px 12px rgba(255, 165, 0, 0.4));
            }

            /* Content card - override white background */
            .bg-white {
                background: rgba(0, 0, 0, 0.85) !important;
                backdrop-filter: blur(15px);
                border: 2px solid rgba(255, 165, 0, 0.3) !important;
                border-radius: 20px;
                box-shadow: 
                    0 25px 50px rgba(0, 0, 0, 0.4),
                    0 0 30px rgba(255, 165, 0, 0.1),
                    inset 0 1px 0 rgba(255, 255, 255, 0.05) !important;
                overflow: hidden;
                position: relative;
                animation: slideInUp 0.6s ease-out;
            }

            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Decorative elements for the card */
            .bg-white::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 3px;
                background: linear-gradient(90deg, #ff4500, #ffa500, #ff8c00, #ffa500, #ff4500);
                background-size: 200% 100%;
                animation: shimmer 3s ease-in-out infinite;
                z-index: 1;
            }

            @keyframes shimmer {
                0% { background-position: -200% 0; }
                100% { background-position: 200% 0; }
            }

            .bg-white::after {
                content: '😵‍💫';
                position: absolute;
                top: 15px;
                right: 15px;
                font-size: 1.2rem;
                animation: twinkle 2.5s ease-in-out infinite;
                opacity: 0.7;
                z-index: 2;
            }

            @keyframes twinkle {
                0%, 100% { 
                    opacity: 0.4; 
                    transform: scale(1) rotate(0deg);
                }
                50% { 
                    opacity: 1; 
                    transform: scale(1.2) rotate(180deg);
                }
            }

            /* Form elements styling */
            input[type="email"],
            input[type="password"],
            input[type="text"],
            input[type="hidden"] {
                background: rgba(255, 255, 255, 0.05) !important;
                border: 2px solid rgba(255, 165, 0, 0.3) !important;
                border-radius: 12px !important;
                color: #ffffff !important;
                transition: all 0.3s ease;
                position: relative;
                z-index: 3;
            }

            input[type="email"]:focus,
            input[type="password"]:focus,
            input[type="text"]:focus {
                outline: none !important;
                border-color: #ffa500 !important;
                background: rgba(255, 165, 0, 0.1) !important;
                box-shadow: 
                    0 0 0 3px rgba(255, 165, 0, 0.2),
                    0 0 20px rgba(255, 165, 0, 0.3) !important;
                transform: translateY(-2px);
            }

            input::placeholder {
                color: rgba(255, 255, 255, 0.5) !important;
            }

            /* Label styling */
            label {
                color: #ffa500 !important;
                font-weight: 600 !important;
                font-size: 0.875rem !important;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                position: relative;
                z-index: 3;
            }

            /* Button styling */
            button,
            .bg-gray-800,
            .bg-indigo-600,
            [type="submit"] {
                background: linear-gradient(45deg, #ff4500, #ffa500) !important;
                color: white !important;
                border: none !important;
                border-radius: 12px !important;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(255, 165, 0, 0.3) !important;
                position: relative;
                overflow: hidden;
                z-index: 3;
            }

            button::before,
            .bg-gray-800::before,
            .bg-indigo-600::before,
            [type="submit"]::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.5s;
            }

            button:hover,
            .bg-gray-800:hover,
            .bg-indigo-600:hover,
            [type="submit"]:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(255, 165, 0, 0.4) !important;
                background: linear-gradient(45deg, #ff6500, #ffb500) !important;
            }

            button:hover::before,
            .bg-gray-800:hover::before,
            .bg-indigo-600:hover::before,
            [type="submit"]:hover::before {
                left: 100%;
            }

            /* Link styling */
            a {
                color: #ffa500 !important;
                transition: all 0.3s ease;
            }

            a:hover {
                color: #ffb84d !important;
                text-shadow: 0 0 8px rgba(255, 165, 0, 0.5);
            }

            /* Error message styling */
            .text-red-600,
            .text-red-500 {
                color: #ff6b6b !important;
                animation: shake 0.5s ease-in-out;
            }

            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }

            /* Text styling for descriptions */
            .text-sm {
                color: #d1d5db !important;
                background: rgba(255, 165, 0, 0.05);
                padding: 12px 16px;
                border-radius: 10px;
                border-left: 3px solid #ffa500;
                position: relative;
                z-index: 3;
            }

            /* Text color overrides */
            .text-gray-900,
            .text-gray-700,
            .text-gray-600 {
                color: #ffa500 !important;
            }
            input[type="checkbox"],
            input[type="radio"] {
                accent-color: #ffa500;
                border: 2px solid rgba(255, 165, 0, 0.3);
            }

            /* Additional cute hover effects */
            .bg-white:hover {
                border-color: rgba(255, 165, 0, 0.5) !important;
                box-shadow: 
                    0 25px 50px rgba(0, 0, 0, 0.4),
                    0 0 40px rgba(255, 165, 0, 0.15),
                    inset 0 1px 0 rgba(255, 255, 255, 0.05) !important;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <!-- Sample Forgot Password Form -->
                <div class="mb-4 text-sm text-gray-600">
                    Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan reset kata sandi melalui email yang memungkinkan Anda memilih yang baru.
                </div>

                <form method="POST" action="#">
                    <!-- Email Address -->
                    <div>
                        <label for="email">Email</label>
                        <input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Masukkan email Anda" required autofocus />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Kirim Link Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>