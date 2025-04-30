@extends('layouts.app')

@section('content')
<body class="h-screen overflow-hidden m-0 p-0">

    <div class="relative w-screen h-screen overflow-hidden">
        <div id="moving-bg" 
             class="absolute top-[-5%] left-[-5%] w-[110%] h-[110%] bg-cover bg-center transition-transform duration-200 ease-out"
             style="background-image: url('{{ asset('images/background.png') }}');">
        </div>

        <!-- Login Form -->
        <div class="relative z-10 flex items-center justify-center h-[calc(100vh-58px)]">
            <div class="w-full max-w-2xl px-4">
                <h2 class="text-center text-2xl font-bold mb-4 text-white">
                    Selamat Datang di <span class="text-orange-500">VehiClick</span>
                </h2>

                <div class="backdrop-blur-sm bg-white/80 rounded-lg p-6 max-h-[calc(100vh-180px)] overflow-y-auto w-full">
                    <p class="text-center text-gray-800 font-medium mb-4">
                        Ayo Masuk<br>untuk melanjutkan
                    </p>

                    <form>
                        <div class="mb-4">
                            <input type="text" placeholder="Masukkan Username"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-sm" />
                        </div>

                        <div class="mb-2">
                            <input type="password" placeholder="Masukkan Kata Sandi"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-sm" />
                        </div>

                        <div class="text-right mb-4">
                            <a href="#" class="text-blue-500 hover:underline text-sm">Lupa Kata Sandi?</a>
                        </div>

                        <button type="submit"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded font-medium transition duration-300 text-sm uppercase">
                            Masuk
                        </button>

                        <div class="mt-4 text-center text-gray-600 text-sm">
                            <p class="mb-2">Atau masuk menggunakan</p>
                            <button type="button"
                                class="w-full bg-white border border-gray-300 py-2 rounded flex items-center justify-center hover:bg-gray-50 text-sm">
                                <span>Google</span>
                            </button>
                        </div>

                        <div class="mt-4 text-center text-gray-600 text-sm">
                            <p>Belum punya akun? Daftar <a href="/daftar" class="text-blue-500 hover:underline">di sini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const movingBg = document.getElementById('moving-bg');
        const container = document.querySelector('.relative.w-screen.h-screen');

        container.addEventListener('mousemove', (e) => {
            const xPos = (e.clientX / window.innerWidth) * 15;
            const yPos = (e.clientY / window.innerHeight) * 15;
            movingBg.style.transform = `translate(${-xPos}px, ${-yPos}px)`;
        });

        container.addEventListener('mouseleave', () => {
            movingBg.style.transform = 'translate(0, 0)';
        });
    </script>
@endsection

