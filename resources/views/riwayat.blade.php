@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-900 text-white p-10">
    <h2 class="text-4xl font-bold mb-8 text-center">Riwayat Pemesanan</h2>

    @if ($riwayat->count())
        <div class="grid gap-6 max-w-4xl mx-auto">
            @foreach ($riwayat as $item)
                <div class="bg-gray-800 rounded-lg p-6 shadow-md">
                    <h3 class="text-2xl font-semibold mb-2">Invoice: INV-{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</h3>
                    <p><strong>Nama:</strong> {{ $item->nama }}</p>
                    <p><strong>Kendaraan:</strong> {{ $item->nama_kendaraan }}</p>
                    <p><strong>Tanggal:</strong> {{ $item->tanggal_mulai }} - {{ $item->tanggal_selesai }}</p>
                    <p><strong>Total:</strong> Rp {{ number_format($item->total_harga, 0, ',', '.') }}</p>
                    <p><strong>Status:</strong> 
                        <span class="font-bold {{ $item->status == 'lunas' ? 'text-green-400' : ($item->status == 'pending' ? 'text-yellow-400' : 'text-red-500') }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-400">Belum ada pesanan.</p>
    @endif
</div>
@endsection
