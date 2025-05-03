@extends('layouts.app')

@section('content')
<div class="relative w-screen min-h-screen overflow-hidden">
    <div id="moving-bg" 
        class="absolute top-[-5%] left-[-5%] w-[110%] h-[110%] bg-cover bg-center transition-transform duration-1000 -z-10"
        style="background-image: url('{{ asset('images/background.png') }}');">
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 pt-10">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-6xl mx-auto text-base">
            <div class="flex items-center mb-6">
                <h2 class="text-2xl font-bold">Riwayat <span class="text-orange-500">Pesanan</span></h2>
            </div>
            
            <p class="text-gray-700 mb-6">Lihat dan kelola semua pesanan Anda</p>
            
            <!-- Filter Tabs -->
            <div class="flex rounded-md border border-gray-300 mb-8 text-sm">
                <div class="flex-1 text-center py-3 bg-orange-500 text-white font-medium rounded-l-md cursor-pointer">Semua</div>
                <div class="flex-1 text-center py-3 text-gray-700 font-medium cursor-pointer">Belum Dibayar</div>
                <div class="flex-1 text-center py-3 text-gray-700 font-medium cursor-pointer">Diproses</div>
                <div class="flex-1 text-center py-3 text-gray-700 font-medium cursor-pointer">Selesai</div>
                <div class="flex-1 text-center py-3 text-gray-700 font-medium rounded-r-md cursor-pointer">Dibatalkan</div>
            </div>
            
            <!-- Order Items -->
            <div class="space-y-6">
                <!-- Order Item 1 -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="text-lg font-semibold">Pesanan #1</div>
                            <div class="text-gray-500 text-sm">15 April 2025</div>
                            <div class="inline-block bg-orange-500 text-black text-xs px-3 py-1 rounded-full mt-2">Diproses</div>
                        </div>
                        <div class="flex items-center justify-center flex-1">
                            <div class="text-gray-700 text-base">Honda Beat 2018</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-lg">Rp. 120.000,00</div>
                            <button onclick="showPaymentModal()" class="bg-orange-500 text-white px-4 py-2 rounded-md mt-2 text-sm hover:bg-orange-600">
                            Detail
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Order Item 2 -->
                <div class="border border-gray-200 rounded-lg p-6 mb-6">
    <!-- Header Pesanan -->
    <div class="flex justify-between items-center">
        <div>
            <div class="text-lg font-semibold">Pesanan #2</div>
            <div class="text-gray-500 text-sm">20 April 2025</div>
            <div class="inline-block bg-green-500 text-black text-xs px-3 py-1 rounded-full mt-2">Selesai</div>
        </div>
        <div class="flex items-center justify-center flex-1">
            <div class="text-gray-700 text-base">Toyota Calya 2023</div>
        </div>
        <div class="text-right">
            <div class="font-bold text-lg">Rp. 420.000,00</div>
            <!-- Tombol detail bisa tetap atau diganti -->
            <button class="bg-orange-500 text-white px-4 py-2 rounded-md mt-2 text-sm hover:bg-orange-600">Detail</button>
        </div>
    </div>

    <!-- Form Ulasan -->
    <form id="reviewForm" class="mt-6 bg-gray-50 border border-gray-200 rounded-md p-4">
        <!-- Bintang Rating -->
        <div class="flex items-center mb-3">
            @for ($i = 1; $i <= 5; $i++)
                <svg onclick="selectStar({{ $i }})" id="star-{{ $i }}" class="w-6 h-6 cursor-pointer text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.973a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.388 2.462a1 1 0 00-.364 1.118l1.286 3.973c.3.921-.755 1.688-1.538 1.118l-3.388-2.462a1 1 0 00-1.176 0l-3.388 2.462c-.783.57-1.838-.197-1.538-1.118l1.286-3.973a1 1 0 00-.364-1.118L2.045 9.4c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.973z"/>
                </svg>
            @endfor
        </div>
        <input type="hidden" name="rating" id="rating" value="0">

        <!-- Tags -->
        <div class="flex flex-wrap gap-2 text-sm mb-4">
            @foreach (['Mobil Bersih', 'Pelayanan Ramah', 'Sopir Tepat Waktu', 'AC Dingin'] as $tag)
                <span onclick="toggleTag(this)" class="tag-item cursor-pointer bg-gray-200 text-gray-700 px-3 py-1 rounded-full">
                    {{ $tag }}
                </span>
            @endforeach
        </div>
        <input type="hidden" name="tags" id="tags" value="">

        <!-- Teks Ulasan -->
        <textarea name="review_text" id="review_text" rows="3" class="w-full border border-gray-300 rounded-md p-2 text-sm" placeholder="Tulis ulasan Anda di sini..."></textarea>

        <!-- Tombol Kirim -->
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-md hover:bg-orange-600 text-sm">
                Kirim Ulasan
            </button>
        </div>
    </form>
</div>

<!-- Script Interaktif -->
<script>
    let selectedTags = [];

    function selectStar(rating) {
        document.getElementById('rating').value = rating;
        for (let i = 1; i <= 5; i++) {
            const star = document.getElementById('star-' + i);
            star.classList.remove('text-yellow-400', 'text-gray-300');
            star.classList.add(i <= rating ? 'text-yellow-400' : 'text-gray-300');
        }
    }

    function toggleTag(el) {
        const text = el.innerText;
        if (selectedTags.includes(text)) {
            selectedTags = selectedTags.filter(tag => tag !== text);
            el.classList.remove('bg-orange-100', 'text-orange-700');
            el.classList.add('bg-gray-200', 'text-gray-700');
        } else {
            selectedTags.push(text);
            el.classList.remove('bg-gray-200', 'text-gray-700');
            el.classList.add('bg-orange-100', 'text-orange-700');
        }
        document.getElementById('tags').value = selectedTags.join(',');
    }

    document.getElementById('reviewForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const rating = document.getElementById('rating').value;
        const tags = document.getElementById('tags').value;
        const text = document.getElementById('review_text').value;

        alert(`Rating: ${rating}\nTags: ${tags}\nUlasan: ${text}`);
        // Bisa kirim ke server via fetch/ajax di sini
    });
</script>
     
                <!-- Order Item 3 -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="text-lg font-semibold">Pesanan #3</div>
                            <div class="text-gray-500 text-sm">22 April 2025</div>
                            <div class="inline-block bg-red-500 text-black text-xs px-3 py-1 rounded-full mt-2">Dibatalkan</div>
                        </div>
                        <div class="flex items-center justify-center flex-1">
                            <div class="text-gray-700 text-base">All New Avanza G 2023</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-lg">Rp. 450.000,00</div>
                            <button class="bg-orange-500 text-white px-4 py-2 rounded-md mt-2 text-sm hover:bg-orange-600">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Back Button -->
            <div class="flex justify-end mt-10">
                <button onclick="history.back()" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-400">
                    Kembali
                </button>
            </div>

            <!-- Modal Popup -->
            @include('components.pop-up_detail')

            <!-- Script untuk menampilkan modal -->
            <script>
            function showPaymentModal() {
                document.getElementById('paymentModal').classList.remove('hidden');
            }
            </script>

        </div>
    </div>
</div>
@endsection
