@extends('layouts.plantillaUser')

@section('content')

@session('successAdd')
        <script>
            Swal.fire({
                title: "¡Listo!",
                text: "¡{{$value}}!",
                icon: "success"
            });
        </script> 
@endsession

<div class="lg:flex md:grid lg:columns-2 md:columns-1 md:justify-items-center lg:gap-20">
    

    {{-- Container Derecha --}}
    <div class="container pt-10 lg:ps-10">
        
        
        <div class="flex justify-between items-center align-middle">
            {{-- Titulo --}}
            <div class="mb-5 flex items-center align-middle ">
                <i class="fa-solid fa-hotel fa-2xl"></i>
                <span class="text-[40px] ms-4">Hoteles</span>
            </div>

            <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" class="h-min text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none sm:block lg:hidden">
                <i class="fa-solid fa-magnifying-glass fa-md me-2"></i>
                Filtros
            </button>

        </div>

        <div class="grid grid-cols-1 gap-5"> {{-- Div de cards --}}

            @foreach ($hoteles as $hotel)
                
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
        
                            <span class="text-xl h-min mb-2">{{ $hotel->nombre }}</span>
        
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
                        <div class="border-s px-10 place-content-center ">
                            <div class="my-3 grid grid-cols-1">
                                <div class="text-center grid grid-cols-1">
                                    <span>Desde {{ $hotel->precio }}$</span>
                                    @if ($hotel->num_huespedes > 0)
                                        <span class="text-green-400 font-bold mt-2"> Disponible</span>
                                    @else
                                    <span class="text-red-500 font-bold mt-2">No Disponible</span>
                                    @endif
                                </div>
                                <button data-modal-target="info-hotel-{{ $hotel->id }}" data-modal-toggle="info-hotel-{{ $hotel->id }}" class="mt-5 block text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center h-min self-center" type="button">
                                    Ver más
                                </button>
                            </div>
                        </div>
                        
                    </div>

                </div> {{-- Cierra Card --}}

            @endforeach

        </div> {{--}} Div de cards {{--}}
    </div>



    {{-- cierra container derecha ------------------------------------------------------------------------------------------------------------------------------------- --}}


    {{-- container filtros --}}

    <div class="pt-10 mt-10 lg:pe-10 sm:hidden lg:block">

        <div class="max-w-sm p-6 sm:hidden lg:block bg-white rounded-lg shadow-xl">
            

            <div class="mb-5 flex items-center align-middle gap-5">
                {{-- <i class="fa-solid fa-filter fa-2xl"></i> --}}
                <h5 class="mb-2 w-72 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Filtros</h5>
            </div>

            <form action="{{ route('rutaFiltrarHotelesUsuario') }}" method="POST">
                    @csrf
                    
                <ul class="space-y-2 font-medium ">

                    <li class="mb-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Buscar</span>
                            </div>
                            <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar" name="busqueda" value="">
                        </div>                    
                    </li>
    
                    <li class=" py-4 mt-4 border-t-2 border-orange-500">
                        <div class="flex justify-between mb-5">
                            
                            <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Precio</h6>
                            
                            <select id="small" class="block w-min p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " name="selPrecio">
                            <option value="1">Menor a</option>
                            <option value="2" selected>Mayor a</option>
                            </select>
                            
                        </div>

                        @php
                            $diff = $precios[0]->maxPrecio - $precios[0]->minPrecio;      
                        @endphp
                        <div class="relative mb-6">
                            <label for="labels-range-input" class="sr-only">Labels range</label>
    
                            <input id="labels-range-input" type="range" name="precio" value="{{ $precios[0]->minPrecio }}"  min="{{ $precios[0]->minPrecio }}" max="{{ $precios[0]->maxPrecio }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">${{ $precios[0]->minPrecio }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">$ {{ $precios[0]->minPrecio + ($diff*0.25) }} </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">$ {{ $precios[0]->minPrecio + ($diff*0.5) }} </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">${{ $precios[0]->maxPrecio }}</span>
                        </div>

                        
    
                    </li>
    
                    <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4 ">
                                
                        <div class="flex justify-between mb-5">
                            <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Distancia al Centro</h6>
                            
                            <select id="small" class="block w-min p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " name="selDistancia">
                            <option value="1">Menor a</option>
                            <option value="2" selected>Mayor a</option>
                            </select>
                            
                        </div>

                        <div class="relative mb-6">
                            <label for="labels-range-input" class="sr-only">Labels range</label>

                            @php
                                $diff = $precios[0]->maxDistancia - $precios[0]->minDistancia;
                            @endphp
    
                            <input id="labels-range-input" type="range" name="distancia" value="{{ $precios[0]->minDistancia }}" min="{{ $precios[0]->minDistancia}}" max="{{ $precios[0]->maxDistancia }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">{{ $precios[0]->minDistancia}} km</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"> {{ $precios[0]->minDistancia + ($diff*0.25) }} km</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"> {{ $precios[0]->minDistancia + ($diff*0.5) }} km</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">{{ $precios[0]->maxDistancia }} km</span>
                        </div>
    
                    </li>
    
                    <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 my-4 ">
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Estrellas</h6>
                        <div class="flex justify-evenly">

                            @for ($i = 1; $i <= 5; $i++)
                                    <x-checkbox-input 
                                    name="estrellas-{{ $i}}" 
                                    id="checkStar-{{ $i }}" 
                                    status=""
                                    >
                                        <span class="sm:text-sm ms-1">
                                            {{ $i}}
                                        </span>
                                    </x-checkbox-input>

                            @endfor
                            
                        </div>
                    </li>
    
                    <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">
    
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Servicios</h6>
                        <div class="grid grid-cols-2 flex-col">
                            
                            @foreach ($servicios as $servicio)
                            
                                <x-checkbox-input 
                                name="checkbox-{{ $servicio->id }}" 
                                id="checkbox-{{ $hotel->id }}-{{ $servicio->id }}" 
                                status=""
                                >
                                    <i class="fa-solid fa-{{ $servicio->icono }} ms-1 fa-xs"></i>
                                    <span class=" ms-1">
                                        {{ $servicio->nombre }}
                                    </span>
                                </x-checkbox-input>

                            @endforeach
                        </div>
                    </li>

                    <li class=" dark:border-gray-700 py-4 my-4 border-t-2 border-orange-500 ">
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Localización</h6>
                        <div class="flex justify-evenly gap-2">

                            <div class="w-50 mx-auto">
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pais</label>
                                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="pais">
                                <option class="text-sky-500" value="">Seleccionar</option>
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="w-50 mx-auto">
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ciudad</label>
                                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="ciudad">
                                <option class="text-sky-500" value="">Seleccionar</option>
                                @foreach ($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}">{{ $ciudad->ciudad }}</option>
                                @endforeach
                                </select>
                            </div>
                            
                            
                        </div>
                    </li>
                    <li class="dark:border-gray-700 p-4 my-4 border-t-2 border-orange-500">
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Disponibilidad</h6>
                        <div class="flex justify-evenly">
                            <x-checkbox-input name="disponible" status="" id="dis">
                                Disponible
                            </x-checkbox-input>
                            <x-checkbox-input name="disponiblent" status="" id="nodis">
                                No Disponible
                            </x-checkbox-input>
                        </div>
                    </li>

                </ul>

                <div class="flex justify-center mt-5">
                <button type="submit" class="text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Filtrar</button>
                        
            </form>
                <form action="{{ route('rutaHotelesUsuarios') }}">
                    <button type="submit" name="restablecer" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Restablecer</button>
                </form>
    
                </div>
            
        </div>
    </div>

    {{-- cierra container filtros ------------------------------------------------------------------------------------------------------------------------------------------ --}}

</div>

    @foreach ($hoteles as $hotel)
        @include('modales.infoHotelesUsu')

    @endforeach
        
@include('modales.filtrosHoteles')

@endsection