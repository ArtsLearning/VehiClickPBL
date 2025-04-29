<!-- Pop Up Pesan Sekarang -->
@extends('layouts.app')
<body class="h-screen overflow-hidden m-0 p-0">

    <div class="relative w-screen h-screen overflow-hidden">
        <div id="moving-bg" 
             class="absolute top-0 left-0 w-full h-1/2 bg-cover bg-center transition-transform duration-200 ease-out"
             style="background-image: url('{{ asset('images/background.png') }}');">
        </div>

        <!-- Navbar -->
        @include('components.navbar')

    </div> 
</body>

