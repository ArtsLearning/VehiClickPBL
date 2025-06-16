@extends('layouts.app')

@section('content')
<style>
    * {
        font-family: 'Poppins', sans-serif;
    }

    .gradient-orange {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff8c42 100%);
    }

    .text-gradient {
        background: linear-gradient(135deg, #ff6b35, #f7931e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .glow-orange {
        box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
    }

    .glow-orange-strong {
        box-shadow: 0 0 30px rgba(255, 107, 53, 0.5);
    }

    .card-hover {
        transition: all 0.4s ease-in-out;
    }

    .card-hover:hover {
        transform: translateY(-10px) scale(1.01);
        box-shadow: 0 20px 40px rgba(255, 107, 53, 0.2);
    }
</style>

<div class="min-h-screen bg-gray-900 text-white py-20 px-6">
    <div class="max-w-4xl mx-auto bg-black/50 backdrop-blur-sm rounded-2xl border border-gray-700 p-10 card-hover glow-orange">
        <h2 class="text-4xl font-bold mb-10 text-center text-gradient">Pembayaran</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- FORM PEMBAYARAN -->
            <form method="POST" action="{{ route('payment.process') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block mb-2 text-lg font-semibold">Nama Pemesan</label>
                    <input type="text" name="nama" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 focus:outline-none focus:border-orange-400 text-white" required>
                </div>

                <div>
                    <label class="block mb-2 text-lg font-semibold">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 focus:outline-none focus:border-orange-400 text-white" required>
                </div>

                <div>
                    <label class="block mb-2 text-lg font-semibold">Metode Pembayaran</label>
                    <select name="metode" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 focus:outline-none focus:border-orange-400 text-white" required>
                        <option value="">-- Pilih Metode --</option>
                        <option value="transfer">Transfer Bank</option>
                        <option value="ewallet">E-Wallet</option>
                        <option value="kartu">Kartu Kredit/Debit</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-lg font-semibold">Nominal Pembayaran</label>
                    <input type="number" name="nominal" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 focus:outline-none focus:border-orange-400 text-white" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="gradient-orange text-black font-bold py-3 px-8 rounded-full transition-all duration-300 hover:glow-orange-strong hover:scale-105">
                        <i class="fas fa-credit-card mr-2"></i> Bayar Sekarang
                    </button>
                </div>
            </form>

            <!-- INVOICE + QR -->
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-inner">
                <h3 class="text-2xl font-semibold text-gradient mb-4">Ringkasan Pembayaran</h3>

                <ul class="space-y-3 text-sm text-gray-300">
                    <li><strong>ID Pemesanan:</strong> INV-{{ rand(1000,9999) }}</li>
                    <li><strong>Nama:</strong> -</li>
                    <li><strong>Metode:</strong> -</li>
                    <li><strong>Total:</strong> Rp 100.000</li>
                </ul>

                <div class="mt-6">
                    <h4 class="text-lg mb-2">Scan QR untuk Bayar:</h4>
                    <img src="{{ asset('images/qr-sample.png') }}" alt="QR Code" class="w-48 mx-auto border-2 border-orange-400 rounded-lg p-2 bg-white">
                    <p class="text-xs text-center mt-2 text-gray-400">Gunakan aplikasi e-wallet untuk scan.</p>
                </div>
            </div>
        </div>

        <div class="mt-10 text-center text-gray-400 text-sm">
            Pembayaran Anda aman dan terenkripsi. Jika mengalami kendala, silakan hubungi layanan pelanggan.
        </div>
    </div>
</div>
@endsection





































