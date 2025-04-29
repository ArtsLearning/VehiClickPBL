<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tentang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Hero Image -->
    <div class="relative h-48 overflow-hidden">
        <img src="{{ asset('images/background.png') }}" class="w-full h-full object-cover" alt="Landscape with road">
        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
            <h1 class="text-white text-4xl font-bold">Tentang</h1>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- About Us Section -->
        <section class="mb-16 mt-8">
            <h2 class="text-3xl font-bold text-center mb-6">Tentang Kami</h2>
            <p class="text-center text-gray-700">Anda Mempunyai Pertanyaan? Silahkan Menghubungi Kami Melalui:</p>
        </section>

        <!-- Contact Section -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-8">Hubungi Kami</h2>
            <div class="flex flex-col md:flex-row justify-center items-center gap-8">
                <!-- Map -->
                <div class="w-full md:w-1/2 flex justify-center">
                    <iframe 
                        class="w-full max-w-xl h-80 rounded-lg shadow-md"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.0577989284434!2d104.0458817!3d1.1187259!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sid!2sid!4v1745934382529!5m2!1sid!2sid" 
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Contact Info -->
                <div class="w-full md:w-1/2">
                    <div class="flex items-start mb-6">
                        <div class="mr-4">
                            <div class="bg-gray-100 p-3 rounded-full">
                                <i class="fas fa-phone text-gray-600"></i>
                            </div>
                        </div>
                        <div>
                            <p class="font-semibold">0812-7899-9987</p>
                            <p class="text-sm text-gray-600">Senin - Jum'at : 09.00 - 17.00</p>
                            <p class="text-sm text-gray-600">Sabtu - Minggu : 10.00 - 16.00</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="mr-4">
                            <div class="bg-gray-100 p-3 rounded-full">
                                <i class="fas fa-envelope text-gray-600"></i>
                            </div>
                        </div>
                        <div>
                            <p class="font-semibold">cs@vehiclick.id</p>
                            <p class="text-sm text-gray-600">Email Customer Service</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer (included as component) -->
    @include('components.footer')
</body>
</html>
