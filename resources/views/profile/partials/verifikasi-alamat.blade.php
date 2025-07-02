<!-- Status verifikasi -->
@if (session('status') === 'verifikasi-alamat-success')
    <div class="mb-4 px-4 py-3 rounded-md bg-green-900/30 border border-green-600 text-green-300 text-sm font-medium">
        ✅ Verifikasi alamat berhasil dikirim. Silakan tunggu proses pemeriksaan oleh admin.
    </div>
@endif

@php
    $status = auth()->user()->status_verifikasi_alamat;
@endphp

@if ($status === 'menunggu')
    <div class="mb-4 px-4 py-3 rounded-md bg-yellow-900/30 border border-yellow-600 text-yellow-300 text-sm font-medium">
        ⏳ Verifikasi alamat Anda sedang ditinjau oleh admin.
    </div>
@elseif ($status === 'terverifikasi')
    <div class="mb-4 px-4 py-3 rounded-md bg-green-900/30 border border-green-600 text-green-300 text-sm font-medium">
        ✅ Alamat Anda telah berhasil diverifikasi.
    </div>
@elseif ($status === 'ditolak')
    <div class="mb-4 px-4 py-3 rounded-md bg-red-900/30 border border-red-600 text-red-300 text-sm font-medium">
        ❌ Verifikasi alamat ditolak. Silakan periksa kembali data yang Anda masukkan dan kirim ulang.
    </div>
@endif

<!-- Form Verifikasi Alamat -->
<form method="POST" action="{{ route('profile.verifikasi-alamat') }}" class="space-y-6">
    @csrf

    <!-- Hidden untuk menyimpan nama-nama wilayah -->
    <input type="hidden" id="nama_provinsi" name="nama_provinsi">
    <input type="hidden" id="nama_kabupaten" name="nama_kabupaten">
    <input type="hidden" id="nama_kecamatan" name="nama_kecamatan">
    <input type="hidden" id="nama_kelurahan" name="nama_kelurahan">

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

    <div>
        <textarea id="alamat_detail" name="alamat_detail" rows="3" required
            class="mt-4 bg-gray-800/50 border-2 border-gray-600 rounded-xl px-4 py-3 text-white w-full"
            placeholder="Detail Alamat (Jalan, No Rumah, dll)"></textarea>
    </div>

    <x-primary-button>{{ __('Kirim Verifikasi') }}</x-primary-button>
</form>

<!-- Styling dropdown -->
<style>
    select option {
        background-color: #1f2937;
        color: white;
    }
</style>

<!-- Alamat dari profil untuk ditampilkan -->
<script>
    const alamatLengkapTerverifikasi = {
        provinsi: "{{ Auth::user()->nama_provinsi }}",
        kabupaten: "{{ Auth::user()->nama_kabupaten }}",
        kecamatan: "{{ Auth::user()->nama_kecamatan }}",
        kelurahan: "{{ Auth::user()->nama_kelurahan }}",
        kodepos: "{{ Auth::user()->kodepos }}",
        alamat_detail: "{{ Auth::user()->alamat_detail }}"
    };
</script>

<!-- Script chained dropdown -->
<script>
    const apiUrl = "https://alamat.thecloudalert.com/api/";

    const provinsiSelect = document.getElementById("provinsi");  
    const kabupatenSelect = document.getElementById("kabupaten");
    const kecamatanSelect = document.getElementById("kecamatan");
    const kelurahanSelect = document.getElementById("kelurahan");
    const kodeposInput = document.getElementById("kodepos");

    const namaProvinsi = document.getElementById("nama_provinsi");
    const namaKabupaten = document.getElementById("nama_kabupaten");
    const namaKecamatan = document.getElementById("nama_kecamatan");
    const namaKelurahan = document.getElementById("nama_kelurahan");

    fetch(`${apiUrl}provinsi/get/`)
        .then(res => res.json())
        .then(data => {
            data.result.forEach(prov => {
                const option = document.createElement("option");
                option.value = prov.id;
                option.textContent = prov.text;
                option.style.backgroundColor = "#1f2937";
                option.style.color = "white";
                provinsiSelect.appendChild(option);
            });
        });

    provinsiSelect.addEventListener("change", function () {
        const provId = this.value;
        namaProvinsi.value = this.options[this.selectedIndex].text;

        kabupatenSelect.innerHTML = `<option value="">Pilih Kabupaten/Kota</option>`;
        kecamatanSelect.innerHTML = `<option value="">Pilih Kecamatan</option>`;
        kelurahanSelect.innerHTML = `<option value="">Pilih Kelurahan/Desa</option>`;
        kodeposInput.value = '';

        if (provId) {
            fetch(`${apiUrl}kabkota/get/?d_provinsi_id=${provId}`)
                .then(res => res.json())
                .then(data => {
                    data.result.forEach(kab => {
                        const option = document.createElement("option");
                        option.value = kab.id;
                        option.textContent = kab.text;
                        option.style.backgroundColor = "#1f2937";
                        option.style.color = "white";
                        kabupatenSelect.appendChild(option);
                    });
                });
        }
    });

    kabupatenSelect.addEventListener("change", function () {
        const kabId = this.value;
        namaKabupaten.value = this.options[this.selectedIndex].text;

        kecamatanSelect.innerHTML = `<option value="">Pilih Kecamatan</option>`;
        kelurahanSelect.innerHTML = `<option value="">Pilih Kelurahan/Desa</option>`;
        kodeposInput.value = '';

        if (kabId) {
            fetch(`${apiUrl}kecamatan/get/?d_kabkota_id=${kabId}`)
                .then(res => res.json())
                .then(data => {
                    data.result.forEach(kec => {
                        const option = document.createElement("option");
                        option.value = kec.id;
                        option.textContent = kec.text;
                        option.style.backgroundColor = "#1f2937";
                        option.style.color = "white";
                        kecamatanSelect.appendChild(option);
                    });
                });
        }
    });

    kecamatanSelect.addEventListener("change", function () {
        const kecId = this.value;
        namaKecamatan.value = this.options[this.selectedIndex].text;

        kelurahanSelect.innerHTML = `<option value="">Pilih Kelurahan/Desa</option>`;
        kodeposInput.value = '';

        if (kecId) {
            fetch(`${apiUrl}kelurahan/get/?d_kecamatan_id=${kecId}`)
                .then(res => res.json())
                .then(data => {
                    data.result.forEach(kel => {
                        const option = document.createElement("option");
                        option.value = kel.id;
                        option.textContent = kel.text;
                        option.style.backgroundColor = "#1f2937";
                        option.style.color = "white";
                        kelurahanSelect.appendChild(option);
                    });
                });
        }
    });

    kelurahanSelect.addEventListener("change", function () {
        const kelId = this.value;
        namaKelurahan.value = this.options[this.selectedIndex].text;

        const kabupatenId = kabupatenSelect.value;
        const kecamatanId = kecamatanSelect.value;

        if (kabupatenId && kecamatanId) {
            fetch(`${apiUrl}kodepos/get/?d_kabkota_id=${kabupatenId}&d_kecamatan_id=${kecamatanId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.result && data.result.length > 0) {
                        kodeposInput.value = data.result[0].text;
                    }
                });
        }
    });
</script>
