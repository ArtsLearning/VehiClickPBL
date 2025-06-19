<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- atau sesuaikan jika pakai CDN --}}
</head>
<body class="bg-gray-100 text-gray-800">
    <main class="p-8">
        {{ $slot }}
    </main>
</body>
</html>
