@extends('layouts.plantilla')

@section('content')

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
        
                            <x-static_star_rating >

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
                            <div class="my-3">
                                <div class="text-center grid grid-cols-1">
                                    <span>Desde {{ $hotel->precio }}$</span>
                                    <span class="text-green-400 font-bold mt-2">Disponible</span>
                                </div>
                                <button data-modal-target="info-hotel-{{ $hotel->id }}" data-modal-toggle="info-hotel-{{ $hotel->id }}" class="mt-5 block text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center h-min" type="button">
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


            <ul class="space-y-2 font-medium ">
                <li class="border-t-4 border-orange-500 dark:border-gray-700 pt-4 mt-4 pb-2 ">
                    
                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 ">Origen</h6>
                
                    <div class="flex">
                        <button id="origen-button" data-dropdown-placement="left" data-dropdown-toggle="dropdown-origen-modal" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 " type="button">
                            Pais
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <div id="dropdown-origen-modal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                            <ul class="h-64 py-2 text-sm text-gray-700 overflow-y-auto" aria-labelledby="states-button">
                                
                                @foreach ($paises as $pais)

                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                                        <div class="inline-flex items-center">
                                            {{-- <input type="text" hidden value="{{ $pais->id }}" name="paisDestino"> --}}
                                            <span class="{{"fi fi-" . $pais->bandera }} fa-sm me-2"></span> 
                                            {{ $pais->nombre }}
                                        </div>
                                    </button>
                                </li>
                                @endforeach
                                
                                
                            </ul>
                        </div>
                        <label for="states" class="sr-only">Ciudad</label>
                        <select id="states" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-e-lg border-s-gray-100 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Ciudad</option>
                            <option value="CA">California</option>
                            <option value="TX">Texas</option>
                            <option value="WH">Washinghton</option>
                            <option value="FL">Florida</option>
                            <option value="VG">Virginia</option>
                            <option value="GE">Georgia</option>
                            <option value="MI">Michigan</option>
                        </select>
                    </div>
                </li>

            
                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Estrellas</h6>

                    <div class="flex gap-6">

                        <div class="flex items-center">
                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">1</label>
                        </div>

                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">2</label>
                        </div>

                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">3</label>
                        </div>

                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">4</label>
                        </div>

                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">5</label>
                        </div>
                    </div>
                </li>

                <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Precio</h6>

                    <div class="relative mb-6">
                        <label for="labels-range-input" class="sr-only">Labels range</label>

                        <input id="labels-range-input" type="range" value="1000" min="100" max="1500" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min ($100)</span>
                        
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max ($1500)</span>
                    </div>

                </li>

                <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Distancia al centro</h6>

                    <div class="relative mb-6">
                        <label for="labels-range-input" class="sr-only">Labels range</label>

                        <input id="labels-range-input" type="range" value="1000" min="100" max="1500" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min ($100)</span>
                        
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max ($1500)</span>
                    </div>

                </li>
            </ul>
            <div class="flex justify-center mt-5">
                <button type="button" class="text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Filtrar</button>

                <button type="button" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Restablecer</button>

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