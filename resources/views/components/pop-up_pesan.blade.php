<div id="popupModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="relative bg-black/80 backdrop-blur-lg border border-gray-700 rounded-2xl w-[90%] max-w-4xl p-4 md:p-8 shadow-2xl glow-orange overflow-y-auto max-h-[90vh]">

        <button onclick="document.getElementById('popupModal').classList.add('hidden')" class="absolute top-6 right-6 w-12 h-12 bg-red-500/20 hover:bg-red-500/40 rounded-full flex items-center justify-center text-2xl text-white hover:text-red-400 transition-all duration-300 transform hover:scale-110 border border-red-500/30">
            <i class="fas fa-times"></i>
        </button>

        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Detail <span class="text-gradient">Pesanan</span>
            </h2>
            <div class="w-24 h-1 gradient-orange mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div class="flex flex-col items-center text-center space-y-6">
                <div class="w-72 h-72 bg-gray-800 rounded-2xl overflow-hidden flex items-center justify-center glow-orange float-animation">
                    <img src="{{ asset('storage/' . $barang->foto_barang) }}" alt="{{ $barang->nama_barang }}" class="object-cover w-full h-full hover:scale-110 transition-transform duration-500">
                </div>
                        
                <div class="space-y-3">
                    <h3 class="text-2xl font-bold text-gradient">{{ $barang->nama_barang }}</h3>
                    <p id="hargaHarian" data-harga="{{ $barang->harga_barang }}" class="text-xl text-orange-400 font-semibold">
                        Rp. {{ number_format($barang->harga_barang, 0, ',', '.') }},00 / hari
                    </p>
                    
                    {{-- ========================================================== --}}
                    {{-- ==== BAGIAN RATING INI YANG TELAH DIPERBAIKI ==== --}}
                    {{-- ========================================================== --}}
                    <div class="star-rating text-lg flex items-center justify-center">
                        @if ($reviewCount > 0)
                            {{-- Bintang Dinamis --}}
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= round($averageRating) ? '' : 'opacity-25' }}"></i>
                            @endfor
                            {{-- Angka Rata-rata --}}
                            <span class="text-gray-300 ml-2">{{ number_format($averageRating, 1) }}/5</span>
                        @else
                            <span class="text-sm text-gray-400">Belum ada ulasan</span>
                        @endif
                    </div>
                    {{-- ========================================================== --}}
                    {{-- ========================================================== --}}

                </div>
            </div>

            <form method="POST" action="{{ route('payment.process') }}" id="bookingForm">
                @csrf
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-user mr-2"></i>
                        Nama Pemesan
                    </label>
                    <input type="text" id="namaPemesan" name="nama" class="w-full bg-gray-800/50 border-2 border-gray-600 hover:border-orange-400 focus:border-orange-400 rounded-xl px-4 py-3 text-white placeholder-gray-400 transition-colors duration-300 backdrop-blur-sm" value="{{ Auth::check() ? Auth::user()->name : '' }}" required />
                </div>
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-envelope mr-2"></i>
                        Email
                    </label>
                    <input type="email" id="emailPemesan" name="email" class="w-full bg-gray-800/50 border-2 border-gray-600 text-gray-400 rounded-xl px-4 py-3 transition-colors duration-300 backdrop-blur-sm {{ Auth::check() ? 'cursor-not-allowed' : '' }}" value="{{ Auth::check() ? Auth::user()->email : '' }}" {{ Auth::check() ? 'readonly tabindex="-1"' : '' }} required />
                </div>
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

                @if(auth()->check() && auth()->user()->status_verifikasi_alamat === 'terverifikasi')
                    <input type="hidden" name="provinsi" value="{{ auth()->user()->provinsi }}" id="hidden_provinsi" disabled>
                    <input type="hidden" name="kabupaten" value="{{ auth()->user()->kabupaten }}" id="hidden_kabupaten" disabled>
                    <input type="hidden" name="kecamatan" value="{{ auth()->user()->kecamatan }}" id="hidden_kecamatan" disabled>
                    <input type="hidden" name="kelurahan" value="{{ auth()->user()->kelurahan }}" id="hidden_kelurahan" disabled>
                    <input type="hidden" name="kodepos" value="{{ auth()->user()->kodepos }}" id="hidden_kodepos" disabled>
                    <input type="hidden" name="alamat_detail" value="{{ auth()->user()->alamat_detail }}" id="hidden_alamat_detail" disabled>

                    <input type="hidden" name="nama_provinsi" value="{{ auth()->user()->nama_provinsi }}" id="hidden_nama_provinsi" disabled>
                    <input type="hidden" name="nama_kabupaten" value="{{ auth()->user()->nama_kabupaten }}" id="hidden_nama_kabupaten" disabled>
                    <input type="hidden" name="nama_kecamatan" value="{{ auth()->user()->nama_kecamatan }}" id="hidden_nama_kecamatan" disabled>
                    <input type="hidden" name="nama_kelurahan" value="{{ auth()->user()->nama_kelurahan }}" id="hidden_nama_kelurahan" disabled>
                @endif

                @php
                    $alamatTerverifikasi = auth()->check() && auth()->user()->status_verifikasi_alamat === 'terverifikasi'
                        ? auth()->user()->alamat_terverifikasi
                        : null;
                @endphp

                <div id="alamatPilihanWrapper" class="space-y-2 mt-4">
                    <label class="font-semibold text-sm text-orange-300">Pilih Sumber Alamat</label>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="alamat_type" id="alamatTerverifikasi" value="verified"
                                class="accent-orange-500"
                                {{ !$alamatTerverifikasi ? 'disabled' : 'checked' }}>
                            Gunakan Alamat Terverifikasi dari profil
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="alamat_type" id="alamatManual" value="manual" class="accent-orange-500"
                                {{ !$alamatTerverifikasi ? 'checked' : '' }}>
                            Masukkan alamat baru
                        </label>
                    </div>

                    <div id="alamatDariProfil" class="bg-gray-800/40 border border-green-400 text-green-200 rounded-xl p-4 text-sm space-y-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div><strong>Provinsi:</strong> <span id="terverifikasiProvinsi">-</span></div>
                            <div><strong>Kabupaten:</strong> <span id="terverifikasiKabupaten">-</span></div>
                            <div><strong>Kecamatan:</strong> <span id="terverifikasiKecamatan">-</span></div>
                            <div><strong>Kelurahan:</strong> <span id="terverifikasiKelurahan">-</span></div>
                            <div><strong>Kode Pos:</strong> <span id="terverifikasiKodepos">-</span></div>
                        </div>
                        <div><strong>Alamat Detail:</strong> <span id="terverifikasiDetail">-</span></div>
                    </div>

                    <input type="hidden" name="alamat_terverifikasi" value="{{ $alamatTerverifikasi }}">
                </div>

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
                    <input type="hidden" id="provinsi_text" name="nama_provinsi">
                    <input type="hidden" id="kabupaten_text" name="nama_kabupaten">
                    <input type="hidden" id="kecamatan_text" name="nama_kecamatan">
                    <input type="hidden" id="kelurahan_text" name="nama_kelurahan">

                    <input type="text" id="alamat_detail" name="alamat_detail" class="w-full bg-gray-800/50 border-2 border-gray-600 rounded-xl px-4 py-3 text-white mt-2" placeholder="Detail Alamat (Jalan, No Rumah, dll)" required>
                </div>
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Tanggal Mulai Sewa
                    </label>
                    <input type="date" id="tanggalMulai" name="tanggal_mulai" class="w-full bg-gray-800/50 border-2 border-gray-600 hover:border-orange-400 focus:border-orange-400 rounded-xl px-4 py-3 text-white placeholder-gray-400 transition-colors duration-300 backdrop-blur-sm" required />
                </div>
                <div class="space-y-2">
                    <label class="block font-semibold text-lg text-gradient">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Tanggal Selesai Sewa
                    </label>
                    <input type="date" id="tanggalSelesai" name="tanggal_selesai" class="w-full bg-gray-800/50 border-2 border-gray-600 hover:border-orange-400 focus:border-orange-400 rounded-xl px-4 py-3 text-white placeholder-gray-400 transition-colors duration-300 backdrop-blur-sm" required />
                </div>
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
                <input type="hidden" name="total_harga" id="hiddenTotalHarga" />
                <input type="hidden" name="durasi" id="hiddenDurasi" />
                <input type="hidden" name="nama_kendaraan" value="{{ $barang->nama_barang }}" />
                <input type="hidden" name="barang_id" value="{{ $barang->id }}" />
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
        const alamatLengkapTerverifikasi = {
            provinsi: "{{ auth()->check() ? Auth::user()->nama_provinsi : '' }}",
            kabupaten: "{{ auth()->check() ? Auth::user()->nama_kabupaten : '' }}",
            kecamatan: "{{ auth()->check() ? Auth::user()->nama_kecamatan : '' }}",
            kelurahan: "{{ auth()->check() ? Auth::user()->nama_kelurahan : '' }}",
            kodepos: "{{ auth()->check() ? Auth::user()->kodepos : '' }}",
            alamat_detail: "{{ auth()->check() ? Auth::user()->alamat_detail : '' }}"
        };
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ===============================
            // 📅 Perhitungan Tanggal dan Harga
            // ===============================
            const tanggalMulai = document.getElementById('tanggalMulai');
            const tanggalSelesai = document.getElementById('tanggalSelesai');
            const durasi = document.getElementById('duration');
            const biayaTotal = document.getElementById('totalPrice');
            const hargaHarian = document.getElementById('hargaHarian');
            const hiddenTotalHarga = document.getElementById('hiddenTotalHarga');
            const hiddenDurasi = document.getElementById('hiddenDurasi');

            const today = new Date();
            const tomorrow = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1);
            const yyyy = tomorrow.getFullYear();
            const mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
            const dd = String(tomorrow.getDate()).padStart(2, '0');
            const minDate = `${yyyy}-${mm}-${dd}`;
            if (tanggalMulai) tanggalMulai.setAttribute('min', minDate);
            if (tanggalSelesai) tanggalSelesai.setAttribute('min', minDate);

            const hargaPerHari = parseInt(hargaHarian.getAttribute('data-harga'));

            function hitungBiayaTotal() {
                const mulai = new Date(tanggalMulai.value);
                const selesai = new Date(tanggalSelesai.value);
                if (!isNaN(mulai.getTime()) && !isNaN(selesai.getTime()) && selesai >= mulai) {
                    const durasiPerHari = Math.floor((selesai - mulai) / (1000 * 60 * 60 * 24)) + 1;
                    const total = durasiPerHari * hargaPerHari;
                    durasi.textContent = `${durasiPerHari} Hari`;
                    biayaTotal.textContent = `Rp. ${total.toLocaleString('id-ID')},00`;
                    hiddenTotalHarga.value = total;
                    hiddenDurasi.value = durasiPerHari;
                } else {
                    durasi.textContent = '- Hari';
                    biayaTotal.textContent = 'Rp. 0';
                    hiddenTotalHarga.value = '';
                    hiddenDurasi.value = '';
                }
            }

            tanggalMulai.addEventListener('change', hitungBiayaTotal);
            tanggalSelesai.addEventListener('change', hitungBiayaTotal);
            hitungBiayaTotal();

            // ===============================
            // 📦 Wilayah Indonesia API
            // ===============================
            const alamatApi = "https://alamat.thecloudalert.com/api/";
            const provinsi = document.getElementById('provinsi');
            const kabupaten = document.getElementById('kabupaten');
            const kecamatan = document.getElementById('kecamatan');
            const kelurahan = document.getElementById('kelurahan');
            const kodepos = document.getElementById('kodepos');

            const provinsiText = document.getElementById('provinsi_text');
            const kabupatenText = document.getElementById('kabupaten_text');
            const kecamatanText = document.getElementById('kecamatan_text');
            const kelurahanText = document.getElementById('kelurahan_text');

            function applyOptionDarkTheme(option) {
                option.style.backgroundColor = '#1f2937';
                option.style.color = 'white';
            }

            fetch(alamatApi + 'provinsi/get/')
                .then(res => res.json())
                .then(data => {
                    data.result.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.id;
                        option.textContent = item.text;
                        applyOptionDarkTheme(option);
                        provinsi.appendChild(option);
                    });
                });

            provinsi.addEventListener('change', function () {
                kabupaten.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
                kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
                kodepos.value = '';
                provinsiText.value = this.options[this.selectedIndex]?.text || '';

                if (this.value) {
                    fetch(`${alamatApi}kabkota/get/?d_provinsi_id=${this.value}`)
                        .then(res => res.json())
                        .then(data => {
                            data.result.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.text;
                                applyOptionDarkTheme(option);
                                kabupaten.appendChild(option);
                            });
                        });
                }
            });

            kabupaten.addEventListener('change', function () {
                kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
                kodepos.value = '';
                kabupatenText.value = this.options[this.selectedIndex]?.text || '';

                if (this.value) {
                    fetch(`${alamatApi}kecamatan/get/?d_kabkota_id=${this.value}`)
                        .then(res => res.json())
                        .then(data => {
                            data.result.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.text;
                                applyOptionDarkTheme(option);
                                kecamatan.appendChild(option);
                            });
                        });
                }
            });

            kecamatan.addEventListener('change', function () {
                kelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
                kodepos.value = '';
                kecamatanText.value = this.options[this.selectedIndex]?.text || '';

                if (this.value) {
                    fetch(`${alamatApi}kelurahan/get/?d_kecamatan_id=${this.value}`)
                        .then(res => res.json())
                        .then(data => {
                            data.result.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.text;
                                applyOptionDarkTheme(option);
                                kelurahan.appendChild(option);
                            });
                        });
                }
            });

            kelurahan.addEventListener('change', function () {
                kelurahanText.value = this.options[this.selectedIndex]?.text || '';
                kodepos.value = '';
                if (kabupaten.value && kecamatan.value) {
                    fetch(`${alamatApi}kodepos/get/?d_kabkota_id=${kabupaten.value}&d_kecamatan_id=${kecamatan.value}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.result && data.result.length > 0) {
                                kodepos.value = data.result[0].text;
                            }
                        });
                }
            });

            // ===============================
            // 📍 Toggle Alamat (Profil / Manual)
            // ===============================
            const pickupDelivery = document.getElementById('pickupDelivery');
            const pickupPlace = document.getElementById('pickupPlace');
            const alamatPilihanWrapper = document.getElementById('alamatPilihanWrapper');
            const alamatTerverifikasi = document.getElementById('alamatTerverifikasi');
            const alamatManual = document.getElementById('alamatManual');
            const alamatDariProfil = document.getElementById('alamatDariProfil');
            const addressSection = document.getElementById('addressSection');
            const addressInputs = addressSection.querySelectorAll('select, input');

            function tampilkanAlamatTerverifikasi() {
                document.getElementById('terverifikasiProvinsi').textContent = alamatLengkapTerverifikasi.provinsi;
                document.getElementById('terverifikasiKabupaten').textContent = alamatLengkapTerverifikasi.kabupaten;
                document.getElementById('terverifikasiKecamatan').textContent = alamatLengkapTerverifikasi.kecamatan;
                document.getElementById('terverifikasiKelurahan').textContent = alamatLengkapTerverifikasi.kelurahan;
                document.getElementById('terverifikasiKodepos').textContent = alamatLengkapTerverifikasi.kodepos;
                document.getElementById('terverifikasiDetail').textContent = alamatLengkapTerverifikasi.alamat_detail;
            }

            function toggleHiddenAlamatTerverifikasi() {
                const isVerified = alamatTerverifikasi?.checked;
                const fieldIds = [
                    'hidden_provinsi', 'hidden_kabupaten', 'hidden_kecamatan', 'hidden_kelurahan',
                    'hidden_kodepos', 'hidden_alamat_detail',
                    'hidden_nama_provinsi', 'hidden_nama_kabupaten',
                    'hidden_nama_kecamatan', 'hidden_nama_kelurahan'
                ];
                fieldIds.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.disabled = !isVerified;
                });
            }


            function toggleAlamatPilihan() {
                if (pickupDelivery.checked) {
                    alamatPilihanWrapper.style.display = 'block';
                    if (alamatTerverifikasi?.checked) {
                        addressSection.style.display = 'none';
                        alamatDariProfil.style.display = 'block';
                        addressInputs.forEach(input => input.required = false);
                        tampilkanAlamatTerverifikasi();
                    } else {
                        addressSection.style.display = 'block';
                        alamatDariProfil.style.display = 'none';
                        addressInputs.forEach(input => input.required = true);
                    }
                } else {
                    alamatPilihanWrapper.style.display = 'none';
                    addressSection.style.display = 'none';
                    alamatDariProfil.style.display = 'none';
                    addressInputs.forEach(input => input.required = false);
                }

                toggleHiddenAlamatTerverifikasi();
            }

            pickupDelivery.addEventListener('change', toggleAlamatPilihan);
            pickupPlace.addEventListener('change', toggleAlamatPilihan);
            alamatTerverifikasi?.addEventListener('change', toggleAlamatPilihan);
            alamatManual?.addEventListener('change', toggleAlamatPilihan);
            toggleAlamatPilihan();
            toggleHiddenAlamatTerverifikasi();


            // ===============================
            // 📤 Isi Hidden Field Saat Submit
            // ===============================
            const bookingForm = document.getElementById('bookingForm');
            bookingForm.addEventListener('submit', function () {
                if (alamatManual && alamatManual.checked) {
                    provinsiText.value = provinsi.options[provinsi.selectedIndex]?.text || '';
                    kabupatenText.value = kabupaten.options[kabupaten.selectedIndex]?.text || '';
                    kecamatanText.value = kecamatan.options[kecamatan.selectedIndex]?.text || '';
                    kelurahanText.value = kelurahan.options[kelurahan.selectedIndex]?.text || '';
                }
            });
        });
    </script>



</div>