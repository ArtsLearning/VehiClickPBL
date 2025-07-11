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
    const wilayahApi = "https://www.emsifa.com/api-wilayah-indonesia/api/";
const kodeposApi = "https://kodepos.vercel.app/search?q="; // pencarian kode pos by nama kelurahan

// Referensi elemen
const provinsi     = document.getElementById('provinsi');
const kabupaten    = document.getElementById('kabupaten');
const kecamatan    = document.getElementById('kecamatan');
const kelurahan    = document.getElementById('kelurahan');
const kodepos      = document.getElementById('kodepos');

const provinsiText  = document.getElementById('nama_provinsi');
const kabupatenText = document.getElementById('nama_kabupaten');
const kecamatanText = document.getElementById('nama_kecamatan');
const kelurahanText = document.getElementById('nama_kelurahan');

// Theme option <option>
function applyOptionDarkTheme(option) {
    option.style.backgroundColor = '#1f2937';
    option.style.color = 'white';
}

// ============== LOAD PROVINSI (on load)
fetch(wilayahApi + 'provinces.json')
    .then(res => res.json())
    .then(list => {
        list.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.name;
            applyOptionDarkTheme(option);
            provinsi.appendChild(option);
        });
    });

// ============== ON CHANGE PROVINSI -> KABUPATEN
provinsi.addEventListener('change', function () {
    kabupaten.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
    kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
    kelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
    kodepos.value = '';

    provinsiText.value = this.options[this.selectedIndex]?.text || '';

    if (this.value) {
        fetch(`${wilayahApi}regencies/${this.value}.json`)
            .then(res => res.json())
            .then(list => {
                list.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;
                    applyOptionDarkTheme(option);
                    kabupaten.appendChild(option);
                });
            });
    }
});

// ============== ON CHANGE KABUPATEN -> KECAMATAN
kabupaten.addEventListener('change', function () {
    kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
    kelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
    kodepos.value = '';

    kabupatenText.value = this.options[this.selectedIndex]?.text || '';

    if (this.value) {
        fetch(`${wilayahApi}districts/${this.value}.json`)
            .then(res => res.json())
            .then(list => {
                list.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;
                    applyOptionDarkTheme(option);
                    kecamatan.appendChild(option);
                });
            });
    }
});

// ============== ON CHANGE KECAMATAN -> KELURAHAN
kecamatan.addEventListener('change', function () {
    kelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
    kodepos.value = '';

    kecamatanText.value = this.options[this.selectedIndex]?.text || '';

    if (this.value) {
        fetch(`${wilayahApi}villages/${this.value}.json`)
            .then(res => res.json())
            .then(list => {
                list.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;
                    applyOptionDarkTheme(option);
                    kelurahan.appendChild(option);
                });
            });
    }
});

// ============== ON CHANGE KELURAHAN -> KODEPOS OTOMATIS
kelurahan.addEventListener('change', function () {
    kelurahanText.value = this.options[this.selectedIndex]?.text || '';
    kodepos.value = '';

    // Kodepos auto by nama kelurahan (lebih akurat jika filter kecamatan juga)
    if (kelurahanText.value) {
        fetch(kodeposApi + encodeURIComponent(kelurahanText.value))
            .then(res => res.json())
            .then(response => {
                // console.log('Kodepos API:', response);
                let kodePosFinal = '';
                if (Array.isArray(response.data) && response.data.length > 0) {
                    // Pilih kodepos dengan kecamatan yang sama jika ada (biar lebih akurat)
                    const kecamatanNama = kecamatanText.value?.toLowerCase();
                    const kecMatch = response.data.find(item =>
                        item.subdistrict?.toLowerCase() === kecamatanNama
                    );
                    kodePosFinal = kecMatch ? kecMatch.code : response.data[0].code;
                }
                kodepos.value = kodePosFinal || '';
            })
            .catch(() => {
                kodepos.value = '';
            });
    }
});

</script>
