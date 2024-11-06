<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="https://kit.fontawesome.com/932290cf31.js" crossorigin="anonymous"></script>   
        
        <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/icon type">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireScripts
        
    </head>
    <body class="font-sans antialiased bg-orange-50">
        
        @include('componentes.navBar')

        <div class="px-10 mb-10">
            @yield('content')
        </div>

        

        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        

        @livewireScripts
        
    </body>
</html>
