<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="bg-gray-100 text-gray-800">
        <!-- Navbar -->
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="{{route('dashboard')}}">
                    <button style="cursor: pointer;" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="{{ asset('images/logo.svg') }}" class="h-8" alt="Flowbite Logo" />
                        {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Turista Sin Maps</span> --}}
                        <div class="flex self-center text-2xl font-semibold whitespace-nowrap ">
                            <span class="hover:text-orange-500">T</span>
                            <span class="hover:text-orange-500">u</span>
                            <span class="hover:text-orange-500">r</span>
                            <span class="hover:text-orange-500">i</span>
                            <span class="hover:text-orange-500">s</span>
                            <span class="hover:text-orange-500">t</span>
                            <span class="hover:text-orange-500">a</span>
            
                            <span class="hover:text-orange-500 ms-2">S</span>
                            <span class="hover:text-orange-500">i</span>
                            <span class="hover:text-orange-500">n</span>
            
                            <span class="hover:text-orange-500 ms-2">M</span>
                            <span class="hover:text-orange-500">a</span>
                            <span class="hover:text-orange-500">p</span>
                            <span class="hover:text-orange-500">s</span>
                            
                        </div>
                    </button>
                </a>
                <div class="space-x-4">
                <nav class="-mx-3 flex flex-1 justify-end">
                @if (Route::has('login'))
                            @auth
                                <a
                                    href="{{ route('dashboard') }}"
                                    class="text-gray-600 hover:text-orange-500"
                                >
                                    Página Principal
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="pe-5 pt-2 text-gray-600 hover:text-orange-500"
                                >
                                    Iniciar Sesión
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600"
                                    >
                                        Registrarse
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </nav>
    
        <!-- Hero Section -->
        <section class="bg-cover bg-center text-white h-screen flex items-center justify-center" style="background-image: url('{{ asset('images/landing-image.jpg') }}');">
        <div class="text-center px-4 bg-gray-900 bg-opacity-70 rounded-lg p-8">
            <h1 class="text-4xl font-bold mb-2">Encuentra tus vacaciones ideales</h1>
            <p class="">Reserva vuelos y hoteles rápido y fácil</p>
        </div>
        </section>
    
    
        <!-- Footer -->
        <footer class="bg-gray-800 text-white">
            <div class="container mx-auto px-4 py-8 text-center">
                <p>© 2024 Turista Sin Maps. All Rights Reserved.</p>
            </div>
        </footer>
    </body>
</html>
