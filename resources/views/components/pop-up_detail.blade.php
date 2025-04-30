<div id="paymentModal" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 hidden">
  <div class="relative bg-white rounded-lg w-[85%] max-w-xl p-4 md:p-6 shadow-lg">

    <!-- Tombol Close -->
    <button onclick="document.getElementById('paymentModal').classList.add('hidden')"
      class="absolute top-4 right-5 text-2xl text-gray-700 hover:text-black">
      &times;
    </button>

    <!-- Header Judul -->
    <div class="bg-orange-500 rounded-t-lg px-6 py-3 border-b mb-3">
      <h2 class="text-xl md:text-2xl font-bold text-center text-black">
        Detail Pemesanan #1
      </h2>
    </div>

    <!-- Info Kendaraan dan Periode -->
    <div class="text-center mb-3">
      <h3 class="text-lg font-semibold">Toyota Calya 2023</h3>
      <p class="text-sm text-gray-600">Rp. 420.000,00 / hari</p>
      <p class="text-sm mt-2 text-orange-500 font-medium">Periode Rental:</p>
      <p class="text-sm text-gray-700">20 April 2025 - 23 April 2025 (3 hari)</p>
    </div>

    <!-- Status Pembayaran -->
    <div class="text-center text-2xl font-bold text-black mb-3">
      Menunggu Pembayaran
    </div>

    <!-- Metode Pembayaran -->
    <div class="flex flex-col md:flex-row items-center justify-center gap-4 mb-4 mx-auto max-w-md text-center md:text-left">
      
      <!-- Keterangan Metode -->
      <div>
        <p class="text-lg font-bold mb-2 text-center md:text-left">Metode Pembayaran</p>
        <label for="qr" class="flex items-center border border-gray-300 rounded-md p-3 bg-white cursor-pointer w-full md:w-[360px] mx-auto md:mx-0">
          <input type="radio" id="qr" name="payment" class="accent-orange-500 mr-3" checked />
          <div class="flex-1">
            <div class="font-bold">QRIS (QR Code Payment)</div>
            <div class="text-sm text-gray-500">Bayar dengan scan kode QR</div>
          </div>
          <i class="fas fa-qrcode text-gray-700 text-lg"></i>
        </label>
        <p class="text-xs text-gray-500 mt-2 text-center md:text-left">Scan untuk membayar</p>
      </div>

      <!-- QR Code -->
      <div class="flex-shrink-0">
        <img src="{{ asset('images/artur.png') }}" alt="QR Code" class="w-32 h-32" />
        <p class="text-xs text-gray-500 mt-2 hidden md:block text-center">Scan untuk membayar</p>
      </div>
    </div>

    <!-- Rincian Biaya -->
    <div class="border-t pt-4 text-sm text-gray-800">
      <h4 class="text-xl font-bold mb-4 text-center text-black">Rincian Biaya</h4>
      <div class="flex justify-between">
        <span>Toyota Calya 2023</span>
        <span>Rp. 1.260.000,00</span>
      </div>
      <div class="flex justify-between">
        <span>Biaya Layanan</span>
        <span>Rp. 5.000,00</span>
      </div>
      <div class="flex justify-between font-bold text-lg mt-2 border-t pt-2">
        <span>Total Pembayaran</span>
        <span>Rp. 1.265.000,00</span>
      </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-4 flex justify-between">
      <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded">
        Batalkan Pesanan
      </button>
      <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded">
        Konfirmasi
      </button>
    </div>

  </div>
</div>
