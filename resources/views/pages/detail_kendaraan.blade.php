@extends('layouts.app')

@section('content')
<body class="m-0 p-0 bg-white font-sans">

    <div class="relative w-full min-h-screen">
      <div id="moving-bg" 
        class="absolute top-0 left-0 w-full h-1/2 bg-cover bg-center transition-transform duration-200 ease-out"
        style="background-image: url('{{ asset('images/background.png') }}');">
      </div>

      <!-- Main Content -->
      <main class="relative max-w-6xl mx-auto pt-40 px-4 sm:px-6 md:px-10">
            
        <h1 class="text-center font-robotoslab text-2xl sm:text-3xl md:text-4xl font-extrabold mb-6 text-black">
          Detail <span class="text-orange-500">Kendaraan</span>
        </h1>

        <!-- Detail Card -->
        <div class="bg-gray-100 bg-opacity-90 rounded-lg p-6 sm:p-8 md:p-10 flex flex-col sm:flex-row items-center sm:items-start gap-6 sm:gap-10 mb-10">
          <div class="w-40 h-40 bg-gray-300 flex items-center justify-center text-gray-500 text-sm font-semibold rounded">
          <img src="{{ asset('images/calya2023.png') }}" alt="Gambar Kendaraan" class="object-cover w-full h-full">
          </div>

          <div class="flex-1 text-gray-900 text-sm sm:text-base">
            <h2 class="font-robotoslab font-bold text-lg sm:text-xl mb-1">Toyota Calya 2023</h2>
              <div class="flex items-center space-x-1 text-xs sm:text-sm mb-0.5">
                <span>4,9/5</span>
                <span class="text-orange-500">
                  @for ($i = 0; $i < 5; $i++)
                    <i class="fas fa-star"></i>
                  @endfor
                </span>
              </div>
              <p class="text-xs sm:text-sm mb-0.5">Rp. 420.000,00 / hari</p>
              <p class="text-xs sm:text-sm mb-3">Tersedia: ~ Buah</p>

              <p class="font-semibold text-sm sm:text-base mb-1">Deskripsi Produk</p>
              <p class="text-xs sm:text-sm">ini adalah kolom teks untuk mendeskripsikan produk.</p>

              <div class="flex justify-end mt-6">
                <button onclick="document.getElementById('popupModal').classList.remove('hidden')" class="bg-orange-500 text-white rounded px-4 py-2 hover:bg-orange-600">
                  Pesan Sekarang
                </button>

              </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <section>
          <h2 class="font-robotoslab font-extrabold text-2xl sm:text-3xl text-center mb-6 text-black">
            Ulasan <span class="text-orange-500">Produk</span>
          </h2>

          <div class="bg-gray-100 rounded-lg p-4 sm:p-6 border border-gray-300 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0 text-center sm:text-left">
              <p class="font-semibold text-sm sm:text-base mb-1">4,9/5 (~ Ulasan)</p>
              <div class="text-orange-500 text-lg sm:text-xl">
                @for ($i = 0; $i < 5; $i++)
                  <i class="fas fa-star"></i>
                @endfor
              </div>
            </div>

            <div class="flex flex-wrap gap-2 justify-center sm:justify-end text-xs sm:text-sm">
              @foreach (['Semua', '5 Bintang (~)', '4 Bintang (~)', '3 Bintang (~)', '2 Bintang (~)', '1 Bintang (~)', 'Dengan Komentar (~)'] as $filter)
                <button class="border border-gray-400 rounded-full px-3 py-1 hover:bg-gray-200 transition">{{ $filter }}</button>
              @endforeach
            </div>
          </div>

          <!-- Review items -->
          <div class="divide-y divide-gray-300 border border-gray-300 rounded-lg overflow-auto max-h-[300px]">
            @foreach (range(1, 3) as $i)
              <article class="flex items-start space-x-4 p-4">
                <img src="{{ asset('images/artur.png') }}" alt="User" class="w-10 h-10 rounded-full flex-shrink-0" />
                <div class="flex-1 text-xs sm:text-sm text-gray-700">
                  <p class="font-semibold mb-0.5">Muhammad Arthur</p>
                  <p class="text-gray-500 mb-0.5">2025-04-29 19:30</p>
                  <p class="text-orange-500 mb-1">
                    @for ($s = 0; $s < 5; $s++)
                      <i class="fas fa-star"></i>
                    @endfor
                  </p>
                  @if ($i === 1)
                    <p>Mobilnya Bagus Bagus Anjir.</p>
                  @endif
                </div>
              </article>
            @endforeach
          </div>

          <!-- Pagination -->
          <nav class="flex justify-center items-center space-x-3 mt-6 text-orange-500 text-sm font-semibold select-none" aria-label="Pagination">
            <button aria-label="Previous page" class="hover:underline">&lt;</button>
              @for ($p = 1; $p <= 4; $p++)
                <button class="hover:underline">{{ $p }}</button>
              @endfor
              <span class="select-none">...</span>
              <button class="hover:underline">&gt;</button>
          </nav>
        </section>
      </main>
      <!-- Modal Popup -->
      @include('components.pop-up_pesan')


    </div>
</body>
@endsection
