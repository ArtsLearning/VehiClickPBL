<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 sm:px-24">
    @foreach ($barangs as $kendaraan)
        <div class="vehicle-card card-hover rounded-xl overflow-hidden relative" data-category="{{ $kendaraan->kategori }}">

            <div class="relative h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $kendaraan->foto_barang) }}" alt="{{ $kendaraan->nama_barang }}" class="w-full h-full object-cover transition-opacity duration-300 {{ $kendaraan->stok < 1 ? 'opacity-50' : '' }}">
                @if ($kendaraan->stok < 1)
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="bg-gray-700 text-white px-4 py-2 rounded-xl text-lg font-bold shadow-lg">
                            Tidak Tersedia
                        </span>
                    </div>
                @endif
            </div>

            <div class="p-6">
                <h3 class="text-xl font-bold mb-2">{{ $kendaraan->nama_barang }}</h3>
                
                {{-- [DIPERBAIKI] Dikembalikan ke 'deskripsi' sesuai database --}}
                <p class="text-gray-400 mb-4 line-clamp-2">{{ $kendaraan->deskripsi }}</p> 

                <div class="flex justify-between items-center mb-4">
                    <span class="font-bold text-gradient">Rp. {{ number_format($kendaraan->harga_barang, 0, ',', '.') }},00 / Hari</span>
                    
                    <div class="flex items-center text-yellow-400">
                        <i class="fas fa-star"></i>
                        <span class="ml-1 font-bold text-white">
                            @if($kendaraan->total_ulasan > 0)
                                {{ number_format($kendaraan->average_rating, 1) }}
                            @else
                                Baru
                            @endif
                        </span>
                    </div>
                </div>
                <div class="flex gap-2">
                    @if ($kendaraan->stok > 0)
                        <button class="flex-1 bg-orange-500 hover:bg-orange-600 py-2 rounded-lg font-medium transition-colors">
                            Book Now
                        </button>
                    @endif
                    <a href="{{ route('produk.detail', $kendaraan->id) }}" class="block flex-1">
                        <button class="w-full bg-gray-600 hover:bg-gray-700 py-2 rounded-lg font-medium transition-colors">
                            Details
                        </button>
                    </a>
                </div>
            </div>
                
        </div>
    @endforeach
</div>