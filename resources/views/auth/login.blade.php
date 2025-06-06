
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VehiClick</title>
    <script src="https://cdn.tailwindcss.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </script>
    <style>
        :root {
            --primary: #F37021; /* Warna oranye dari desain kedua */
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white w-full max-w-md p-10 rounded-2xl shadow-2xl">
        <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-2">Selamat Datang</h2>
        <p class="text-center text-gray-500 text-sm mb-8">Masuk ke akun VehiClick Anda</p>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" required autofocus
                    placeholder="Masukkan email Anda"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-[--primary] focus:border-[--primary] shadow-sm outline-none">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                    placeholder="Masukkan password Anda"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-[--primary] focus:border-[--primary] shadow-sm outline-none">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember"
                        class="h-4 w-4 text-[--primary] border-gray-300 rounded focus:ring-[--primary]">
                    <span class="ml-2 text-gray-700">Ingat saya</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-[--primary] hover:underline">Lupa password?</a>
            </div>

            <!-- Button -->
            <div>
                <button type="submit"
                    class="w-full bg-[--primary] hover:bg-orange-600 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-200">
                    MASUK
                </button>
            </div>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="mx-4 text-gray-500 text-sm">atau masuk dengan</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <!-- Social Buttons -->
        <div class="space-y-3">
            <button class="w-full flex items-center justify-center gap-3 border border-gray-300 rounded-xl py-2.5 hover:bg-gray-100 transition">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                <span class="text-gray-700 font-medium">Google</span>
            </button>
            <button class="w-full flex items-center justify-center gap-3 border border-gray-300 rounded-xl py-2.5 hover:bg-gray-100 transition">
                <img src="https://www.svgrepo.com/show/448224/facebook.svg" alt="Facebook" class="w-5 h-5">
                <span class="text-gray-700 font-medium">Facebook</span>
            </button>
        </div>

        <!-- Register Link -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-[--primary] font-medium hover:underline">Daftar sekarang</a>
        </p>
    </div>
</body>
</html>
