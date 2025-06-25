<div class="max-w-screen-xl mx-auto px-4 sm:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($barangs as $kendaraan)
        <div class="vehicle-card rounded-2xl overflow-hidden relative group transition-transform duration-300 ease-out cursor-pointer shadow-lg" data-category="{{ $kendaraan->kategori }}" style="will-change: transform; background: linear-gradient(135deg, #18181b 70%, #23263f 100%); border: 1.5px solid #ff6b35;">

            <div class="relative h-48 overflow-hidden bg-[#18181b]">
                <img src="{{ asset('storage/' . $kendaraan->foto_barang) }}" alt="{{ $kendaraan->nama_barang }}" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-110 {{ $kendaraan->stok < 1 ? 'opacity-50' : '' }}">
                @if ($kendaraan->stok < 1)
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="bg-gray-800/90 text-orange-400 px-4 py-2 rounded-xl text-lg font-bold shadow-lg border border-orange-400">
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
                        <button class="flex-1 bg-gradient-to-r from-orange-500 to-orange-400 hover:from-orange-600 hover:to-orange-500 py-2 rounded-lg font-medium transition-colors text-white shadow-md border border-orange-500">
                            Pesan Sekarang
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

<style>
.vehicle-card {
    background: linear-gradient(135deg, #18181b 70%, #23263f 100%);
    border: 1.5px solid #ff6b35;
    box-shadow: 0 2px 16px 0 rgba(255,107,53,0.08), 0 2px 12px 0 rgba(0,0,0,0.12);
    transition: transform 0.35s cubic-bezier(0.4,0,0.2,1), box-shadow 0.35s cubic-bezier(0.4,0,0.2,1);
}
.vehicle-card:hover, .vehicle-card:focus, .vehicle-card.group:hover {
    transform: translateY(-10px) scale(1.045);
    box-shadow: 0 8px 32px 0 rgba(255,107,53,0.25), 0 2px 12px 0 rgba(0,0,0,0.20);
    border-color: #ff6b35;
    z-index: 2;
}
</style>