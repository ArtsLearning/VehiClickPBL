<div id="popupModal" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 hidden">
  <div class="relative bg-white rounded-lg w-[90%] max-w-4xl p-6 md:p-10 shadow-lg">

    <!-- Tombol Close -->
    <button onclick="document.getElementById('popupModal').classList.add('hidden')"
      class="absolute top-4 right-5 text-2xl text-gray-700 hover:text-black">
      &times;
    </button>

    <!-- Judul Modal -->
    <h2 class="text-2xl md:text-3xl font-bold text-center mb-8">Detail Pesanan</h2>

    <!-- Konten Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <!-- Gambar & Info Kendaraan -->
      <div class="flex flex-col items-center text-center">
        <div class="w-60 h-60 bg-gray-200 flex items-center justify-center text-gray-500 rounded overflow-hidden">
          <img src="{{ asset('images/calya2023.png') }}" alt="Gambar Kendaraan" class="object-cover w-full h-full">
        </div>
        <h3 class="text-lg font-semibold mt-4">Toyota Calya 2023</h3>
        <p class="text-sm text-gray-600">Rp. 420.000,00 / hari</p>
      </div>

      <!-- Formulir Pemesanan -->
      <form class="space-y-4">

        <!-- Tanggal Mulai -->
        <div>
          <label class="block font-semibold mb-1">Tanggal Mulai Sewa</label>
          <input type="date" class="w-full border rounded px-3 py-2" />
        </div>

        <!-- Tanggal Selesai -->
        <div>
          <label class="block font-semibold mb-1">Tanggal Selesai Sewa</label>
          <input type="date" class="w-full border rounded px-3 py-2" />
        </div>

        <!-- Metode Pembayaran -->
        <div>
          <label class="block font-semibold mb-1">Metode Pembayaran</label>
          <select class="w-full border rounded px-3 py-2">
            <option selected disabled>== Pilih Metode Pembayaran ==</option>
            <option>Cash on Delivery (COD)</option>
            <option>QRIS</option>
          </select>
        </div>

        <!-- Tombol Pesan Sekarang -->
        <div class="text-right pt-4">
          <a href="/pembayaran"
            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded inline-block">
            Pesan Sekarang
          </a>
        </div>

      </form>
    </div>
  </div>
</div>
