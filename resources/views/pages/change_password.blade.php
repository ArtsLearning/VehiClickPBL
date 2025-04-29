@extends('layouts.app')

@section('content')
<div class="relative w-screen h-screen overflow-hidden">
    <div id="moving-bg" 
         class="absolute top-[-5%] left-[-5%] w-[110%] h-[110%] bg-cover bg-center transition-transform duration-200 ease-out"
         style="background-image: url('{{ asset('images/background.png') }}');">
    </div>

    <!-- Konten Utama -->
    <div class="relative z-10 flex h-[90%] p-8 gap-8">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Form Ubah Kata Sandi -->
        <div class="flex-1 bg-white bg-opacity-90 rounded-lg shadow-lg p-8">
            <div class="flex items-center mb-6">
                <i class="fas fa-user-lock text-3xl mr-2"></i>
                <h2 class="text-2xl font-bold">
                    <span class="text-black">Ubah</span> <span class="text-orange-500">Kata Sandi</span>
                </h2>
            </div>

            <form action="#" method="POST" class="space-y-6">
                @csrf

                <!-- Kata Sandi Saat Ini -->
                <div>
                    <label class="block font-semibold mb-1">Kata Sandi Saat Ini</label>
                    <input type="password" name="current_password" placeholder="Masukan Kata Sandi Anda Saat Ini" class="w-full p-2 border rounded">
                </div>

                <!-- Kata Sandi Baru -->
                <div>
                    <label class="block font-semibold mb-1">Kata Sandi Baru</label>
                    <input type="password" name="new_password" placeholder="Masukan Kata Sandi Baru Anda" class="w-full p-2 border rounded">
                    
                    <div class="text-xs text-gray-500 mt-1 space-y-1 ml-2">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-gray-300 rounded-full"></span> Minimal 8 karakter
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-gray-300 rounded-full"></span> Minimal 1 huruf kapital
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-gray-300 rounded-full"></span> Minimal 1 angka
                        </div>
                    </div>
                </div>

                <!-- Konfirmasi Kata Sandi Baru -->
                <div>
                    <label class="block font-semibold mb-1">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" name="confirm_password" placeholder="Konfirmasi Kata Sandi Baru Anda" class="w-full p-2 border rounded">
                </div>

                <!-- Tombol -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">Simpan</button>
                    <button type="button" class="px-6 py-2 bg-gray-300 text-black rounded hover:bg-gray-400">Batal</button>
                </div>
            </form>
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
