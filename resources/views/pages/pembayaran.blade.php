@extends('layouts.app')

@section('content')
<div class="min-h-screen m-0 p-0 bg-gray-50">
    <!-- Main Content -->
    <main class="max-w-3xl mx-auto p-6">
        <!-- Ringkasan Pemesanan -->
        <h2 class="font-extrabold text-2xl text-center mt-10 mb-4">Ringkasan Pemesanan</h2>
        <hr class="border-gray-400 mb-6" />
        <section class="border border-gray-400 rounded-md bg-white flex flex-col sm:flex-row max-w-3xl mx-auto shadow">
            <img src="{{ asset('images/calya2023.png') }}" alt="Toyota Calya 2023" class="w-48 h-48 object-cover m-4 rounded" />
            <div class="flex flex-col justify-center px-6 py-4 text-center sm:text-left text-lg">
                <p class="font-bold">Toyota Calya 2023</p>
                <p class="text-orange-500 mt-2">Rp. 420.000,00 / hari</p>
                <p class="text-sm text-orange-400 mt-2">
                    Periode Rental:<br />
                    <span>20 April 2025 - 23 April 2025 (3 hari)</span>
                </p>
            </div>
        </section>

        <!-- Pilih Metode Pembayaran -->
        <h2 class="font-extrabold text-2xl text-center mt-12 mb-4">Pilih Metode Pembayaran</h2>
        <hr class="border-gray-400 mb-4" />
        <form class="max-w-3xl mx-auto space-y-4 text-base">
            <label for="qr" class="flex items-center border border-gray-400 rounded-md p-3 cursor-pointer bg-white">
                <input type="radio" id="qr" name="payment" class="accent-orange-500 mr-3" checked />
                <div class="flex-1">
                    <div class="font-bold">QRIS (QR Code Payment)</div>
                    <div class="text-sm text-gray-500">Bayar dengan scan kode QR</div>
                </div>
                <i class="fas fa-qrcode text-gray-700"></i>
            </label>
            <label for="cod" class="flex items-center border border-gray-400 rounded-md p-3 cursor-pointer bg-white">
                <input type="radio" id="cod" name="payment" class="accent-orange-500 mr-3" />
                <div class="flex-1">
                    <div class="font-bold">COD (Bayar di Tempat)</div>
                    <div class="text-sm text-gray-500">Bayar langsung di tempat saat pengambilan kendaraan</div>
                </div>
            </label>
        </form>

        <!-- Rincian Biaya -->
        <h2 class="font-extrabold text-2xl text-center mt-12 mb-4">Rincian Biaya</h2>
        <hr class="border-gray-400 mb-4" />
        <section class="border border-gray-400 rounded-md bg-gray-100 max-w-3xl mx-auto p-6 text-base">
            <div class="font-extrabold text-center mb-4 text-lg">Rincian Biaya</div>
            <div class="grid grid-cols-3 gap-2 mb-2 font-bold">
                <div>Nama Produk</div>
                <div class="text-center">Jumlah</div>
                <div class="text-right">Total</div>
            </div>
            <div class="grid grid-cols-3 gap-2 mb-2">
                <div>Toyota Calya 2023</div>
                <div class="text-center">3</div>
                <div class="text-right">Rp. 1.260.000,00</div>
            </div>
            <div class="grid grid-cols-3 gap-2 mb-2">
                <div>Biaya Layanan</div>
                <div class="text-center">1</div>
                <div class="text-right">Rp. 5.000,00</div>
            </div>
            <div class="grid grid-cols-3 gap-2 font-extrabold border-t border-gray-400 pt-3">
                <div>Total Pembayaran</div>
                <div></div>
                <div class="text-right">Rp. 1.265.000,00</div>
            </div>
        </section>

        <!-- Informasi Penyewa -->
        <h2 class="font-extrabold text-2xl text-center mt-12 mb-4">Informasi Penyewa</h2>
        <hr class="border-gray-400 mb-4" />
        <section class="max-w-3xl mx-auto text-base leading-relaxed">
            <p><span class="font-bold">Nama:</span> (sesuai pada halaman profil)</p>
            <p><span class="font-bold">Email:</span> (sesuai pada halaman profil)</p>
            <p><span class="font-bold">No. Telepon:</span> (sesuai pada halaman profil)</p>
            <p><span class="font-bold">Alamat:</span> (sesuai pada halaman profil)</p>
        </section>
    </main>
    <div class="flex justify-end max-w-3xl mx-auto mt-10 mb-10 pr-6">
        <a href="/riwayat_pemesanan" class="bg-orange-500 text-black font-bold text-base rounded py-2.5 px-10 hover:bg-orange-600 transition">
            Konfirmasi
        </a>
    </div>

</div>
@endsection
