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
<body class="bg-gray-100 text-gray-800">
    {{ $header ?? '' }}
    <main class="px-8 pb-8">
        {{ $slot }}
    </main>
</body>
</html>
