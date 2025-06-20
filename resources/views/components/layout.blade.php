<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Profile Page' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            height: 100%;
            scroll-behavior: smooth;
        }

        main {
            padding-top: 80px;
        }
    </style>
    {{ $head ?? '' }}
</head>
<body class="bg-[#0f1419] text-gray-100" style="background-image:
    radial-gradient(at 40% 20%, rgba(255, 107, 53, 0.1), transparent 50%),
    radial-gradient(at 80% 0%, rgba(247, 147, 30, 0.1), transparent 50%),
    radial-gradient(at 0% 50%, rgba(255, 107, 53, 0.05), transparent 50%);
">
    {{ $header ?? '' }}
    <main class="px-8 pb-8">
        {{ $slot }}
    </main>
</body>
</html>
