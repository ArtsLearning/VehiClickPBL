@extends('layouts.app')

@section('content')
<!-- Background -->
<div class="relative w-screen h-screen overflow-hidden">
    <div id="moving-bg" 
         class="absolute top-[-5%] left-[-5%] w-[110%] h-[110%] bg-cover bg-center transition-transform duration-200 ease-out"
         style="background-image: url('{{ asset('images/background.png') }}');">
    </div>

    <!-- Konten Utama -->
    <div class="relative z-10 flex h-[90%] p-8 gap-8">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Form Profil -->
        <div class="flex-1 bg-white bg-opacity-90 rounded-lg shadow-lg p-8">
            <div class="flex items-center mb-6">
                <i class="fas fa-user-circle text-4xl mr-3"></i>
                <h2 class="text-2xl font-bold">
                    Profile <span class="text-orange-500">Saya</span>
                </h2>
            </div>

            <form action="#" method="POST" class="space-y-2">
                @csrf
                <div>
                    <label class="block font-semibold text-base mb-1">Username:</label>
                    <div class="text-gray-600 text-sm">@iniadalahusername</div>
                </div>

                <div>
                    <label class="block font-semibold text-base mb-1">Nama:</label>
                    <input type="text" name="name" placeholder="Masukan Nama Anda" class="w-full p-3 border rounded text-sm">
                </div>

                <div>
                    <label class="block font-semibold text-base mb-1">Email:</label>
                    <div class="text-gray-600 underline text-sm">iniuser@gmail.com</div>
                </div>

                <div>
                    <label class="block font-semibold text-base mb-1">No Telepon:</label>
                    <div class="text-gray-600 text-sm">0000-0000-0000</div>
                </div>

                <div>
                    <label class="block font-semibold text-base mb-1">Alamat:</label>
                    <textarea name="alamat" placeholder="Masukan Alamat Anda" class="w-full p-3 border rounded text-sm" rows="3"></textarea>
                </div>

                <div class="flex justify-end space-x-4 mt-4">
                    <button type="submit" class="px-6 py-2 bg-orange-500 text-white text-base rounded hover:bg-orange-600">Simpan</button>
                    <button type="button" class="px-6 py-2 bg-gray-300 text-black text-base rounded hover:bg-gray-400">Batal</button>
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

