<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Detail Kendaraan
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&amp;family=Roboto:wght@400&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Roboto', sans-serif;
    }
    .font-robotoslab {
      font-family: 'Roboto Slab', serif;
    }
    /* Hide scrollbar but keep scroll functionality */
    main {
      -ms-overflow-style: none; /* IE and Edge */
      scrollbar-width: none; /* Firefox */
      overflow: auto;
      height: calc(100vh - 10rem);
    }
    main::-webkit-scrollbar {
      display: none; /* Chrome, Safari, Opera */
    }
  </style>
 </head>
 <body class="h-screen overflow-hidden m-0 p-0 bg-white">
  <div class="relative w-screen h-screen overflow-hidden">
   <div id="moving-bg" class="absolute top-0 left-0 w-full h-1/2 bg-cover bg-center transition-transform duration-200 ease-out" style="background-image: url('{{ asset('images/background.png') }}');">
   </div>
   <!-- Navbar -->
   @include('components.navbar')
   <main class="relative max-w-6xl mx-auto pt-40 px-4 sm:px-6 md:px-10">
    <!-- Title -->
    <h1 class="text-center font-robotoslab text-2xl sm:text-3xl md:text-4xl font-extrabold mb-6 text-black">
     Detail
     <span class="text-orange-500">
      Kendaraan
     </span>
    </h1>
    <!-- Detail card -->
    <div class="bg-gray-100 bg-opacity-90 rounded-lg p-6 sm:p-8 md:p-10 flex flex-col sm:flex-row items-center sm:items-start gap-6 sm:gap-10 mb-10">
     <div aria-label="Placeholder for vehicle image" class="w-40 h-40 bg-gray-300 flex items-center justify-center text-gray-500 text-sm font-semibold rounded">
      Gambar Kendaraan
     </div>
     <div class="flex-1 text-gray-900 text-sm sm:text-base">
      <h2 class="font-robotoslab font-bold text-lg sm:text-xl mb-1">
       Toyota Calya 2023
      </h2>
      <div class="flex items-center space-x-1 text-xs sm:text-sm mb-0.5">
       <span>
        4,9/5
       </span>
       <span class="text-orange-500">
        <i class="fas fa-star">
        </i>
        <i class="fas fa-star">
        </i>
        <i class="fas fa-star">
        </i>
        <i class="fas fa-star">
        </i>
        <i class="fas fa-star">
        </i>
       </span>
      </div>
      <p class="text-xs sm:text-sm mb-0.5">
       Rp. 420.000,00 / hari
      </p>
      <p class="text-xs sm:text-sm mb-3">
       Tersedia: ~ Buah
      </p>
      <p class="font-semibold text-sm sm:text-base mb-1">
       Deskripsi Produk
      </p>
      <p class="text-xs sm:text-sm">
       ini adalah kolom teks untuk mendeskripsikan produk.
      </p>
      <div class="flex justify-end mt-6">
       <button class="flex items-center space-x-2 bg-orange-500 text-white text-xs sm:text-sm font-semibold rounded px-3 py-1 hover:bg-orange-600 transition">
        <i class="fas fa-shopping-cart text-xs">
        </i>
        <span>
         Pesan Sekarang
        </span>
       </button>
      </div>
     </div>
    </div>
    <!-- Reviews Section -->
    <section>
     <h2 class="font-robotoslab font-extrabold text-2xl sm:text-3xl text-center mb-6 text-black">
      Ulasan
      <span class="text-orange-500">
       Produk
      </span>
     </h2>
     <div class="bg-gray-100 rounded-lg p-4 sm:p-6 border border-gray-300 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
      <div class="mb-4 sm:mb-0 text-center sm:text-left">
       <p class="font-semibold text-sm sm:text-base mb-1">
        4,9/5 (~ Ulasan)
       </p>
       <div class="text-orange-500 text-lg sm:text-xl">
        <i class="fas fa-star">
        </i>
        <i class="fas fa-star">
        </i>
        <i class="fas fa-star">
        </i>
        <i class="fas fa-star">
        </i>
        <i class="fas fa-star">
        </i>
       </div>
      </div>
      <div class="flex flex-wrap gap-2 justify-center sm:justify-end text-xs sm:text-sm">
       <button class="border border-gray-400 rounded-full px-3 py-1 hover:bg-gray-200 transition">
        Semua
       </button>
       <button class="border border-gray-400 rounded-full px-3 py-1 hover:bg-gray-200 transition">
        5 Bintang (~)
       </button>
       <button class="border border-gray-400 rounded-full px-3 py-1 hover:bg-gray-200 transition">
        4 Bintang (~)
       </button>
       <button class="border border-gray-400 rounded-full px-3 py-1 hover:bg-gray-200 transition">
        3 Bintang (~)
       </button>
       <button class="border border-gray-400 rounded-full px-3 py-1 hover:bg-gray-200 transition">
        2 Bintang (~)
       </button>
       <button class="border border-gray-400 rounded-full px-3 py-1 hover:bg-gray-200 transition">
        1 Bintang (~)
       </button>
       <button class="border border-gray-400 rounded-full px-3 py-1 hover:bg-gray-200 transition">
        Dengan Komentar (~)
       </button>
      </div>
     </div>
     <!-- Review items -->
     <div class="divide-y divide-gray-300 border border-gray-300 rounded-lg overflow-auto max-h-[300px]">
      <article class="flex items-start space-x-4 p-4">
       <img alt="User avatar placeholder circle in gray" class="w-10 h-10 rounded-full flex-shrink-0" height="40" src="https://storage.googleapis.com/a1aa/image/3676dbcf-25b3-4775-533e-f7f01c803bf2.jpg" width="40"/>
       <div class="flex-1 text-xs sm:text-sm text-gray-700">
        <p class="font-semibold mb-0.5">
         namaakun
        </p>
        <p class="text-gray-500 mb-0.5">
         yyyy-mm-dd hh:mm
        </p>
        <p class="text-orange-500 mb-1">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
        </p>
        <p>
         ini adalah contoh ulasan dengan komentar.
        </p>
       </div>
      </article>
      <article class="flex items-start space-x-4 p-4">
       <img alt="User avatar placeholder circle in gray" class="w-10 h-10 rounded-full flex-shrink-0" height="40" src="https://storage.googleapis.com/a1aa/image/3676dbcf-25b3-4775-533e-f7f01c803bf2.jpg" width="40"/>
       <div class="flex-1 text-xs sm:text-sm text-gray-700">
        <p class="font-semibold mb-0.5">
         namaakun2
        </p>
        <p class="text-gray-500 mb-0.5">
         yyyy-mm-dd hh:mm
        </p>
        <p class="text-orange-500 mb-1">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
        </p>
       </div>
      </article>
      <article class="flex items-start space-x-4 p-4">
       <img alt="User avatar placeholder circle in gray" class="w-10 h-10 rounded-full flex-shrink-0" height="40" src="https://storage.googleapis.com/a1aa/image/3676dbcf-25b3-4775-533e-f7f01c803bf2.jpg" width="40"/>
       <div class="flex-1 text-xs sm:text-sm text-gray-700">
        <p class="font-semibold mb-0.5">
         namaakun2
        </p>
        <p class="text-gray-500 mb-0.5">
         yyyy-mm-dd hh:mm
        </p>
        <p class="text-orange-500 mb-1">
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
         <i class="fas fa-star">
         </i>
        </p>
       </div>
      </article>
     </div>
     <!-- Pagination -->
     <nav aria-label="Pagination" class="flex justify-center items-center space-x-3 mt-6 text-orange-500 text-sm font-semibold select-none">
      <button aria-label="Previous page" class="hover:underline">
       &lt;
      </button>
      <button class="hover:underline">
       1
      </button>
      <button class="hover:underline">
       2
      </button>
      <button class="hover:underline">
       3
      </button>
      <button class="hover:underline">
       4
      </button>
      <span class="select-none">
       ...
      </span>
      <button class="hover:underline">
       &gt;
      </button>
     </nav>
    </section>
   </main>
  </div>
 </body>
</html>