@extends('layouts.plantillaUser')

@section('content')

@session('success')
        <script>
            Swal.fire({
                title: "¡Listo!",
                text: "¡{{$value}}!",
                icon: "success"
            });
        </script> 
@endsession

@session('error')
        <script>
            Swal.fire({
                title: "¡Error!",
                text: "¡{{$value}}!",
                icon: "error"
            });
        </script> 
    @endsession

<div class="lg:flex md:grid lg:columns-2 md:columns-1 md:justify-items-center lg:gap-20">
    

    {{-- Container Derecha --}}
    <div class="container pt-10 lg:ps-10">
        
        
        <div class="flex justify-between items-center align-middle">
            {{-- Titulo --}}
            <div class="mb-5 flex items-center align-middle ">
                <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                <span class="text-[40px] ms-4">Carrito</span>
            </div>

            <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" class="h-min text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none sm:block lg:hidden">
                <i class="fa-solid fa-magnifying-glass fa-md me-2"></i>
                Filtros
            </button>

        </div>

        <div class="grid grid-cols-1 gap-5"> {{-- Div de cards --}}
                @php
                    $total = 0;
                @endphp
            @foreach ($hoteles as $hotel)
                @php
                    $total += $hotel->precio * $hotel->noches * $hotel->habitaciones;
                @endphp
                <div class="flex w-auto lg:m-0 bg-white border-2 border-gray-200 rounded-lg shadow-xl "> {{-- Card --}}
                    

                    <div class="h-min lg:w-1/3 sm:w-1/2 place-content-center mx-3">

                        {{-- Carousel --}}	
                        <div id="controls-carousel" class="relative w-full rounded " data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative h-48 overflow-hidden rounded-lg ">
                                
                                @php  
                                    $num_img = 0;
                                @endphp

                                @foreach ($imagenes as $imagen)                                    
                                    @if ($hotel->id == $imagen->hotel_id)
                                        <?php
                                            $num_img ++;
                                        ?>
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                            <img src={{'storage/'.$imagen->foto}} class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded" alt="..." style="aspect-ratio:400/267">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @if ($num_img > 1)
                                
                                <!-- Slider controls -->
                                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                    <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-2 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-2 h-2 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                    <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-2 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-2 h-2 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            @endif
                        </div>

                    </div>

                    <div class="flex justify-between w-full ms-5">

                        <div class="grid grid-cols-1 my-3">
        
                            <span class="text-xl font-bold h-min mb-2">{{ $hotel->nombre }}</span>
        
                            <x-static_star_rating rating="{{ $hotel->estrellas }}">

                            </x-static_star_rating>
        
                            <div class="flex align-center">
                                <div class="bg-gray-300 rounded flex items-center shadow h-min px-2 gap-2 sm:mb-2 mt-4  ">
                                    <span class="fi fi-{{ $hotel->bandera }} fa-sm"></span> 
                                    <span class="my-1">Ciudad: {{ $hotel->ciudad }}</span>
                                </div>
                            </div>
                            
                            <span class="">Distancia al centro: </span>
                            
                            <div class="">
                                {{ $hotel->distancia }} km
                            </div>  
                        
                            
                        </div>
                        <div class="grid grid-cols-1 my-3">
                            <span class="text-lg h-min mb-2 font-bold">Datos de Reservación:</span>
                            <span>Número de Habitaciones: {{$hotel->habitaciones}}</span>
                            <span>Número de Noches: {{$hotel->noches}}</span>
                            <span>Día de Llegada: {{$hotel->checkin}}</span>
                            <span>Día de Partida: {{$hotel->checkout}}</span>
                        </div>
                        
                        <div class="border-s px-10 place-content-center ">
                            <div class="my-3 grid grid-cols-1">
                                <div class="text-center grid grid-cols-1">
                                    <span class="text-lg font-bold">Precio Total:</span>
                                    <span class="text-2xl text-green-400 font-bold mt-1">${{$hotel->precio * $hotel->noches * $hotel->habitaciones}}</span>
                                    <span class="mt-3">Precio por Noche:</span>
                                    <span class="text-green-400 font-bold">${{$hotel->precio}}</span>
                                </div>
                                {{-- <button data-modal-target="info-hotel-{{ $hotel->id }}" data-modal-toggle="info-hotel-{{ $hotel->id }}" class="mt-5 block text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center h-min self-center" type="button">
                                    Ver más
                                </button> --}}
                                <button data-modal-target="delete-reservation-{{$hotel->reservation_id }}" data-modal-toggle="delete-reservation-{{$hotel->reservation_id }}" class="mt-2 block text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center h-min self-center" type="button">
                                    Eliminar
                                </button>
                                @include('modales.delete-reservation')
                            </div>
                        </div>
                        
                    </div>

                </div> {{-- Cierra Card --}}

            @endforeach

            
            @foreach ($vuelos as $vuelo)
                
            <div class="flex w-auto lg:m-0 bg-white border-2 border-gray-200 rounded-lg shadow-xl justify-evenly "> {{-- Card --}}
                
                <div class="text-2xl font-medium self-center sm:hidden lg:block mx-5 w-1/5 text-center">
                    {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Aeromexico.png/1200px-Aeromexico.png" alt="" class="p-1"> --}}
                    {{ $vuelo->aerolinea }}
                </div>

                <div class="grid grid-cols-1 items-center text-bottom mx-5">

                    <div class="lg:hidden sm:block align-baseline text-center items-center text-2xl font-medium">
                        {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Aeromexico.png/1200px-Aeromexico.png" alt="" class="p-1 "> --}}
                        {{ $vuelo->aerolinea }}
                    </div>

                    <div class="bg-gray-300 rounded flex items-center w-min shadow h-min px-3 sm:mb-2">
                        <div class="justify-items-center grid columns-1">
                            <span class="fi fi-{{ $vuelo->banderaorigen }} fa-2xl  mt-3"></span> 
                            <span class="mt-1 text-xs font-bold">{{ $vuelo->abvorigen }}</span>
                            <span class="mb-1 text-xs">{{ $vuelo->abvciudadorigen }}</span>
                        </div>
                        <i class="fa-solid fa-arrow-right position-self-center mx-3 fa-xl hover:text-white"></i>
    
                        <div class="justify-items-center grid columns-1">
                            <span class="fi fi-{{ $vuelo->banderadestino }} fa-2xl mt-3"></span> 
                            <span class="mt-1 text-xs font-bold">{{ $vuelo->abvdestino }}</span>
                            <span class="mb-1 text-xs">{{ $vuelo->abvciudaddestino }}</span>
                        </div>
                    </div>
                </div>

                <div class="w-2/5 flex items-center justify-around">
                    
                    <div class="h-min text-center grid columns-1">
                        <div class="inline-block">
                            <i class="fa-solid fa-plane"></i>
                            <span class="font-semibold">IDA</span>
                        </div>
                        <span>{{ $vuelo->fecha_salida }}</span>
                        <span>{{ $vuelo->hora_salida }}</span>
                    </div>

                    <div class="h-min text-center grid columns-1">
                        <div class="inline-block">
                            <i class="fa-solid fa-plane fa-rotate-180"></i>
                            <span class="font-semibold">REGRESO</span>
                        </div>
                        <span>{{ $vuelo->fecha_regreso }}</span>
                    </div>
                    
                </div>
                
                <div class="border-l-2 h-100 w-1/5 p-4">
                    <div class="text-center mt-3 grid columns-1 h-min self-center">
                        <span class="text-2xl text-green-400 font-semibold self-center">
                            {{$vuelo->clase}}
                            @foreach ($categoriasVuelos as $cv)
                                @if ($cv->flight_date_id == $vuelo->id && $cv->categoria == $vuelo->clase)
                                    ${{$cv->precio * $vuelo->cantidad_asientos}}
                                    @php
                                        $total += $cv->precio*$vuelo->cantidad_asientos;
                                        $precio_unitario = $cv->precio;
                                    @endphp
                                @endif
                            @endforeach
                        </span>
                        <span class="text-lg font-bold mt-2">Asientos: {{$vuelo->cantidad_asientos}}</span>
                        <span>(${{$precio_unitario}}) c/u</span>
                        <button data-modal-target="delete-ticket-{{$vuelo->ticket_id}}" data-modal-toggle="delete-ticket-{{$vuelo->ticket_id}}" class="mt-5 block text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div> {{-- Cierra Card --}}
            @include('modales.delete-ticket')
            @endforeach
        </div> {{--}} Div de cards {{--}}
    </div>
    {{-- cierra container derecha ------------------------------------------------------------------------------------------------------------------------------------- --}}


    {{-- container filtros --}}

    <div class="pt-10 mt-10 lg:pe-10 sm:hidden lg:block">

        <div class="max-w-sm p-6 sm:hidden lg:block bg-white rounded-lg shadow-xl">
            

            <div class="mb-5 flex text-3xl items-center align-middle gap-5 whitespace-nowrap">
                {{-- <i class="fa-solid fa-filter fa-2xl"></i> --}}
                <span class="font-bold tracking-tight text-gray-900 dark:text-white">Total</span>
                <span class="">${{$total}}</span>
            </div>

            <a href="{{route("realizarCompra")}}"><button type="button" class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Proceder al Pago</button></a>

        </div>
    </div>

    {{-- cierra container filtros ------------------------------------------------------------------------------------------------------------------------------------------ --}}

</div>

{{-- @include('modales.infoHotelesUsu')

@include('modales.filtrosHoteles') --}}

@endsection