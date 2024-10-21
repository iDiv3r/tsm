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

        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireScripts
        
    </head>
    <body class="font-sans antialiased">
        
        @include('componentes.navBar')

        <div class="px-10 mb-10">
            @yield('content')
        </div>

        

        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

        @livewireScripts
    </body>
</html>
