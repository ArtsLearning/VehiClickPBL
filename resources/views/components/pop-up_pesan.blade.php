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
                    <img src="{{ asset('storage/' . $barangs->foto_barang) }}" alt="{{ $barangs->nama_barang }}" class="object-cover w-full h-full hover:scale-110 transition-transform duration-500">
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
            <form method="POST" action="{{ route('payment.process') }}" id="bookingForm">

                @csrf
                <!-- Name -->
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-user mr-2"></i>
                        Nama Pemesan
                    </label>
                    <input type="text" id="namaPemesan" name="nama" class="w-full bg-gray-800/50 border-2 border-gray-600 hover:border-orange-400 focus:border-orange-400 rounded-xl px-4 py-3 text-white placeholder-gray-400 transition-colors duration-300 backdrop-blur-sm" value="{{ Auth::user()->name }}" required />
                </div>
                <!-- Email -->
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-envelope mr-2"></i>
                        Email
                    </label>
                    <input type="email" id="emailPemesan" name="email" class="w-full bg-gray-800/50 border-2 border-gray-600 text-gray-400 cursor-not-allowed rounded-xl px-4 py-3 transition-colors duration-300 backdrop-blur-sm" value="{{ Auth::user()->email }}" readonly tabindex="-1" />
                </div>
                <!-- Pick Up Method -->
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-truck mr-2"></i>
                        Metode Pengambilan
                    </label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="pickup_method" id="pickupDelivery" value="delivery" class="accent-orange-500" checked>
                            Antar ke Alamat
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="pickup_method" id="pickupPlace" value="pickup" class="accent-orange-500">
                            Ambil ke Tempat
                        </label>
                    </div>
                </div>
                <!-- Address Table (hidden if pick up to place) -->
                <div class="space-y-2" id="addressSection">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Alamat Lengkap
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <select id="provinsi" name="provinsi" class="bg-gray-800/50 border-2 border-gray-600 rounded-xl px-4 py-3 text-white" required>
                            <option value="">Pilih Provinsi</option>
                        </select>
                        <select id="kabupaten" name="kabupaten" class="bg-gray-800/50 border-2 border-gray-600 rounded-xl px-4 py-3 text-white" required>
                            <option value="">Pilih Kabupaten/Kota</option>
                        </select>
                        <select id="kecamatan" name="kecamatan" class="bg-gray-800/50 border-2 border-gray-600 rounded-xl px-4 py-3 text-white" required>
                            <option value="">Pilih Kecamatan</option>
                        </select>
                        <select id="kelurahan" name="kelurahan" class="bg-gray-800/50 border-2 border-gray-600 rounded-xl px-4 py-3 text-white" required>
                            <option value="">Pilih Kelurahan/Desa</option>
                        </select>
                        <input type="text" id="kodepos" name="kodepos" class="bg-gray-800/50 border-2 border-gray-600 rounded-xl px-4 py-3 text-white" placeholder="Kode Pos" readonly>
                    </div>
                    <input type="text" id="alamat_detail" name="alamat_detail" class="w-full bg-gray-800/50 border-2 border-gray-600 rounded-xl px-4 py-3 text-white mt-2" placeholder="Detail Alamat (Jalan, No Rumah, dll)" required>
                </div>
                <!-- Start Date -->
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Tanggal Mulai Sewa
                    </label>
                    <input type="date" id="tanggalMulai" name="tanggal_mulai" class="w-full bg-gray-800/50 border-2 border-gray-600 hover:border-orange-400 focus:border-orange-400 rounded-xl px-4 py-3 text-white placeholder-gray-400 transition-colors duration-300 backdrop-blur-sm" required />
                </div>
                <!-- End Date -->
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Tanggal Selesai Sewa
                    </label>
                    <input type="date" id="tanggalSelesai" name="tanggal_selesai" class="w-full bg-gray-800/50 border-2 border-gray-600 hover:border-orange-400 focus:border-orange-400 rounded-xl px-4 py-3 text-white placeholder-gray-400 transition-colors duration-300 backdrop-blur-sm" required />
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
                <!-- Hidden Fields -->
                <input type="hidden" name="total_harga" id="hiddenTotalHarga" />
                <input type="hidden" name="durasi" id="hiddenDurasi" />
                <input type="hidden" name="nama_kendaraan" value="{{ $barangs->nama_barang }}" />
                <input type="hidden" name="barang_id" value="{{ $barangs->id }}" />
                <!-- Action Buttons --> 
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="button" onclick="document.getElementById('popupModal').classList.add('hidden')" class="flex-1 border-2 border-gray-600 hover:border-red-400 hover:bg-red-400/10 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </button>
                    <button type="submit" class="flex-1 gradient-orange hover:glow-orange-strong text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 text-center pulse-glow">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Pesan Sekarang
                    </button>
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
            const hiddenTotalHarga = document.getElementById('hiddenTotalHarga');
            const hiddenDurasi = document.getElementById('hiddenDurasi');

            // Set min date to tomorrow for both inputs
            const today = new Date();
            const tomorrow = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1);
            const yyyy = tomorrow.getFullYear();
            const mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
            const dd = String(tomorrow.getDate()).padStart(2, '0');
            const minDate = `${yyyy}-${mm}-${dd}`;
            if (tanggalMulai) tanggalMulai.setAttribute('min', minDate);
            if (tanggalSelesai) tanggalSelesai.setAttribute('min', minDate);

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
                    if (hiddenTotalHarga) hiddenTotalHarga.value = total;
                    if (hiddenDurasi) hiddenDurasi.value = durasiPerHari;
                } else {
                    durasi.textContent = '- Hari';
                    biayaTotal.textContent = 'Rp. 0';
                    if (hiddenTotalHarga) hiddenTotalHarga.value = '';
                    if (hiddenDurasi) hiddenDurasi.value = '';
                }
            }

            tanggalMulai.addEventListener('change', hitungBiayaTotal);
            tanggalSelesai.addEventListener('change', hitungBiayaTotal);

            hitungBiayaTotal();

            // Address API base
            const alamatApi = "https://alamat.thecloudalert.com/api/";

            // Elements
            const provinsi = document.getElementById('provinsi');
            const kabupaten = document.getElementById('kabupaten');
            const kecamatan = document.getElementById('kecamatan');
            const kelurahan = document.getElementById('kelurahan');
            const kodepos = document.getElementById('kodepos');

            // Fetch Provinsi
            fetch(alamatApi + 'provinsi/get/')
                .then(res => res.json())
                .then(data => {
                    data.result.forEach(item => {
                        provinsi.innerHTML += `<option value="${item.id}">${item.text}</option>`;
                    });
                });

            provinsi.addEventListener('change', function() {
                kabupaten.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
                kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
                kodepos.value = '';
                if (this.value) {
                    fetch(alamatApi + 'kabkota/get/?d_provinsi_id=' + this.value)
                        .then(res => res.json())
                        .then(data => {
                            data.result.forEach(item => {
                                kabupaten.innerHTML += `<option value="${item.id}">${item.text}</option>`;
                            });
                        });
                }
            });

            kabupaten.addEventListener('change', function() {
                kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
                kodepos.value = '';
                if (this.value) {
                    fetch(alamatApi + 'kecamatan/get/?d_kabkota_id=' + this.value)
                        .then(res => res.json())
                        .then(data => {
                            data.result.forEach(item => {
                                kecamatan.innerHTML += `<option value="${item.id}">${item.text}</option>`;
                            });
                        });
                }
            });

            kecamatan.addEventListener('change', function() {
                kelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
                kodepos.value = '';
                if (this.value) {
                    fetch(alamatApi + 'kelurahan/get/?d_kecamatan_id=' + this.value)
                        .then(res => res.json())
                        .then(data => {
                            data.result.forEach(item => {
                                kelurahan.innerHTML += `<option value="${item.id}">${item.text}</option>`;
                            });
                        });
                }
            });

            // Fetch kodepos when kabupaten and kecamatan are selected
            kelurahan.addEventListener('change', function() {
                kodepos.value = '';
                if (kabupaten.value && kecamatan.value) {
                    fetch(alamatApi + `kodepos/get/?d_kabkota_id=${kabupaten.value}&d_kecamatan_id=${kecamatan.value}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.result && data.result.length > 0) {
                                kodepos.value = data.result[0].text;
                            }
                        });
                }
            });

            // Pickup method logic
            const pickupDelivery = document.getElementById('pickupDelivery');
            const pickupPlace = document.getElementById('pickupPlace');
            const addressSection = document.getElementById('addressSection');
            const addressInputs = addressSection.querySelectorAll('select, input');

            function toggleAddressSection() {
                if (pickupDelivery.checked) {
                    addressSection.style.display = '';
                    addressInputs.forEach(input => input.required = true);
                } else {
                    addressSection.style.display = 'none';
                    addressInputs.forEach(input => input.required = false);
                }
            }
            pickupDelivery.addEventListener('change', toggleAddressSection);
            pickupPlace.addEventListener('change', toggleAddressSection);
            toggleAddressSection();
        });
    </script>
</div>