<!-- Modal Popup -->
<div id="popupModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="relative bg-black/80 backdrop-blur-lg border border-gray-700 rounded-2xl w-[90%] max-w-4xl p-4 md:p-8 shadow-2xl glow-orange overflow-y-auto max-h-[90vh]">

        <!-- Close Button -->
        <button onclick="document.getElementById('popupModal').classList.add('hidden')" class="absolute top-6 right-6 w-12 h-12 bg-red-500/20 hover:bg-red-500/40 rounded-full flex items-center justify-center text-2xl text-white hover:text-red-400 transition-all duration-300 transform hover:scale-110 border border-red-500/30">
            <i class="fas fa-times"></i>
        </button>

        <!-- Modal Title -->
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Detail <span class="text-gradient">Pesanan</span>
            </h2>
            <div class="w-24 h-1 gradient-orange mx-auto rounded-full"></div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Vehicle Image & Info -->
            <div class="flex flex-col items-center text-center space-y-6">
                <div class="w-72 h-72 bg-gray-800 rounded-2xl overflow-hidden flex items-center justify-center glow-orange float-animation">
                    <img src="{{ asset('images/' . $barangs->foto_barang) }}" alt="{{ $barangs->nama_barang }}" class="object-cover w-full h-full hover:scale-110 transition-transform duration-500">
                </div>
                        
                <div class="space-y-3">
                    <h3 class="text-2xl font-bold text-gradient">{{ $barangs->nama_barang }}</h3>
                    <p id="hargaHarian" data-harga="{{ $barangs->harga_barang }}" class="text-xl text-orange-400 font-semibold">
                        Rp. {{ number_format($barangs->harga_barang, 0, ',', '.') }},00 / hari
                    </p>
                    <div class="star-rating text-lg">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                        <span class="text-gray-300 ml-2">{{ $barangs->rating }}/5</span>
                    </div>
                </div>
            </div>

            <!-- Booking Form -->
            <form class="space-y-6">

                <!-- Start Date -->
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Tanggal Mulai Sewa
                    </label>
                    <input type="date" id="tanggalMulai" class="w-full bg-gray-800/50 border-2 border-gray-600 hover:border-orange-400 focus:border-orange-400 rounded-xl px-4 py-3 text-white placeholder-gray-400 transition-colors duration-300 backdrop-blur-sm" />
                </div>

                <!-- End Date -->
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Tanggal Selesai Sewa
                    </label>
                    <input type="date" id="tanggalSelesai" class="w-full bg-gray-800/50 border-2 border-gray-600 hover:border-orange-400 focus:border-orange-400 rounded-xl px-4 py-3 text-white placeholder-gray-400 transition-colors duration-300 backdrop-blur-sm" />
                </div>

                <!-- Payment Method -->
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-credit-card mr-2"></i>
                        Metode Pembayaran
                    </label>
                    <select class="w-full bg-gray-800/50 border-2 border-gray-600 hover:border-orange-400 focus:border-orange-400 rounded-xl px-4 py-3 text-white transition-colors duration-300 backdrop-blur-sm">
                        <option selected disabled class="text-gray-400">== Pilih Metode Pembayaran ==</option>
                        <option value="cod" class="bg-gray-800 text-white">💰 Cash on Delivery (COD)</option>
                        <option value="qris" class="bg-gray-800 text-white">📱 QRIS</option>
                        <option value="bank" class="bg-gray-800 text-white">🏦 Transfer Bank</option>
                        <option value="ewallet" class="bg-gray-800 text-white">💳 E-Wallet</option>
                    </select>
                </div>

                <!-- Rental Duration & Total -->
                <div class="bg-gray-800/30 rounded-xl p-4 border border-gray-700">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-300">Durasi Sewa:</span>
                        <span class="text-orange-400 font-semibold" id="duration">- hari</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Total Harga:</span>
                        <span class="text-2xl font-bold text-gradient" id="totalPrice">Rp. 0</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="button" onclick="document.getElementById('popupModal').classList.add('hidden')" class="flex-1 border-2 border-gray-600 hover:border-red-400 hover:bg-red-400/10 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </button>
                    <a href="/pembayaran" class="flex-1 gradient-orange hover:glow-orange-strong text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 text-center pulse-glow">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Pesan Sekarang
                    </a>
                </div>

            </form>
        </div>

        <!-- Additional Info -->
        <div class="mt-8 pt-6 border-t border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div class="flex items-center justify-center space-x-2 text-green-400">
                    <i class="fas fa-shield-alt"></i>
                    <span class="text-sm">Asuransi Included</span>
                </div>
                <div class="flex items-center justify-center space-x-2 text-blue-400">
                    <i class="fas fa-headset"></i>
                    <span class="text-sm">24/7 Support</span>
                </div>
                <div class="flex items-center justify-center space-x-2 text-yellow-400">
                    <i class="fas fa-gas-pump"></i>
                    <span class="text-sm">Full Tank Guarantee</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tanggalMulai = document.getElementById('tanggalMulai');
            const tanggalSelesai = document.getElementById('tanggalSelesai');
            const durasi = document.getElementById('duration');
            const biayaTotal = document.getElementById('totalPrice');
            const hargaHarian = document.getElementById('hargaHarian');

            if (!tanggalMulai || !tanggalSelesai || !durasi || !biayaTotal || !hargaHarian) {
                console.error('Data tidak ditemukan');
                return;
            }
            const hargaPerHari = parseInt(hargaHarian.getAttribute('data-harga'));

            function hitungBiayaTotal() {
                const mulai = new Date(tanggalMulai.value);
                const selesai = new Date(tanggalSelesai.value);

                if (!isNaN(mulai.getTime()) && !isNaN(selesai.getTime()) && selesai >= mulai) {
                    const selisih = selesai - mulai;
                    const durasiPerHari = Math.floor(selisih / (1000 * 60 * 60 * 24)) + 1;
                    const total = durasiPerHari * hargaPerHari;

                    durasi.textContent = `${durasiPerHari} Hari`;
                    biayaTotal.textContent = `Rp. ${total.toLocaleString('id-ID')},00`;
                } else {
                    durasi.textContent = '- Hari';
                    biayaTotal.textContent = 'Rp. 0';
                }
            }

            tanggalMulai.addEventListener('change', hitungBiayaTotal);
            tanggalSelesai.addEventListener('change', hitungBiayaTotal);

            hitungBiayaTotal();
        });
    </script>
</div>