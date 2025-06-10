<div class="max-w-7xl mx-auto mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 sm:px-24">
    @foreach ($barangs as $kendaraan)
        <a href="{{ url('/detail_kendaraan') }}" class="block">
            <div class="bg-[#1c2533] rounded-lg p-3 w-full">
                <img src="{{ asset('images/' . $kendaraan->foto_barang) }}" alt="{{ $kendaraan->nama_barang }}" class="rounded-md mb-2 w-full object-cover" width="300" height="180">
                <h2 class="text-white font-extrabold text-sm mb-1">{{ $kendaraan->nama_barang }}</h2>
                <p class="text-xs text-gray-400 mb-1">{{ $kendaraan->deskripsi }}</p>
                <span class="font-bold text-gradient">Rp. {{ number_format($kendaraan->harga_barang, 0, ',', '.') }},00 / Hari</span>
                <div class="flex gap-2">
                    <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                        Book Now
                    </button>
                    <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                        Details
                    </button>
                </div>
            </div>
        </a>
    @endforeach
</div>