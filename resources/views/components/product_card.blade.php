<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 sm:px-24">
    @foreach ($barangs as $kendaraan)
        <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="{{ $kendaraan->kategori }}">
            <div class="relative h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $kendaraan->foto_barang) }}" alt="{{ $kendaraan->nama_barang }}" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2">{{ $kendaraan->nama_barang }}</h3>
                <p class="text-gray-400 mb-4">{{ $kendaraan->deskripsi }}</p>
                <div class="flex justify-between items-center mb-4">
                    <span class="font-bold text-gradient">Rp. {{ number_format($kendaraan->harga_barang, 0, ',', '.') }},00 / Hari</span>
                    <div class="flex items-center text-yellow-400">
                        <i class="fas fa-star"></i><span class="ml-1">{{ $kendaraan->rating }}</span>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                        Book Now
                    </button>
                    <button class="flex-1 bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                        <a href="{{ route('produk.detail', $kendaraan->id) }}" class="block">
                            Details
                        </a>
                    </button>
                </div>
            </div>    
        </div>
    @endforeach
</div>