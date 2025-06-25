@if (session('status') === 'verifikasi-sim-success')
    <div class="mb-4 px-4 py-3 rounded-md bg-green-900/30 border border-green-600 text-green-300 text-sm font-medium">
        ✅ Verifikasi SIM berhasil dikirim. Silakan tunggu proses pemeriksaan identitas Anda.
    </div>
@endif

{{-- Cek status verifikasi dari database --}}
@php
    $status = auth()->user()->status_verifikasi_sim;
@endphp

@if ($status === 'menunggu')
    <div class="mb-4 px-4 py-3 rounded-md bg-yellow-900/30 border border-yellow-600 text-yellow-300 text-sm font-medium">
        ⏳ Dokumen verifikasi Anda sedang ditinjau oleh admin.
    </div>
@elseif ($status === 'terverifikasi')
    <div class="mb-4 px-4 py-3 rounded-md bg-green-900/30 border border-green-600 text-green-300 text-sm font-medium">
        ✅ Identitas Anda telah berhasil diverifikasi.
    </div>
@elseif ($status === 'ditolak')
    <div class="mb-4 px-4 py-3 rounded-md bg-red-900/30 border border-red-600 text-red-300 text-sm font-medium">
        ❌ Verifikasi ditolak. Silakan periksa kembali dokumen Anda dan unggah ulang.
    </div>
@endif

<form method="POST" action="{{ route('profile.verifikasi-sim') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf

    {{-- Preview Foto SIM --}}
    <div class="flex flex-col md:flex-row md:items-center gap-4">
        <div class="shrink-0">
            <img id="preview-sim" class="h-36 w-64 object-cover rounded-md shadow ring-2 ring-orange-400"
                src="https://img.icons8.com/ios-filled/100/000000/id-verified.png" alt="Preview SIM" />
        </div>

        <div class="w-full">
            <x-input-label for="foto_sim" :value="'Foto SIM'" />
            <input id="foto_sim" type="file" name="foto_sim" accept="image/*" required
                class="block mt-1 w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:text-sm file:font-semibold
                    file:bg-orange-50 file:text-orange-700
                    hover:file:bg-orange-100" />
            @error('foto_sim')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <x-primary-button>{{ __('Kirim Verifikasi') }}</x-primary-button>
</form>

<div class="mt-8 text-sm text-gray-400 space-y-2">
    <strong>Petunjuk:</strong>
    <ul class="list-disc pl-5">
        <li>Pastikan foto SIM terlihat jelas dan tidak buram.</li>
        <li>Format file harus .jpg, .jpeg, atau .png dan maksimal 2MB.</li>
    </ul>
</div>

{{-- ✅ Script Preview --}}
<script>
    document.getElementById('foto_sim').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview-sim').src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>
