@extends('layouts.plantilla')

@section('content')


<div class="lg:flex md:grid lg:columns-2 md:columns-1 md:justify-items-center lg:gap-20">
    

    {{-- Container Derecha --}}
    <div class="container pt-10 lg:ps-10">
        
        {{-- Titulo --}}
        <div class="mb-5 flex items-center align-middle">
            <i class="fa-solid fa-plane-departure fa-2xl"></i>
            <span class="text-[40px] ms-4">Vuelos</span>
        </div>

        <div class="grid grid-cols-1 gap-5"> {{-- Div de cards --}}

            <div class="flex w-auto lg:m-0 bg-white border-2 border-gray-200 rounded-lg shadow-xl justify-evenly "> {{-- Card --}}
                
                <div class="text-2xl font-medium self-center sm:hidden lg:block mx-5 w-1/5 text-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Aeromexico.png/1200px-Aeromexico.png" alt="" class="p-1">
                    {{-- Aeromexico --}}
                </div>

                <div class="grid grid-cols-1 items-center text-bottom mx-5">

                    <div class="md:hidden sm:block align-baseline text-center text-2xl font-medium">
                        Aeromexico
                    </div>

                    <div class="bg-gray-300 rounded flex items-center w-min shadow h-min px-3 sm:mb-2">
                        <div class="justify-items-center grid columns-1">
                            <span class="fi fi-mx fa-2xl  mt-3"></span> 
                            <span class="my-1">Mex</span>
                        </div>
                        <i class="fa-solid fa-arrow-right position-self-center mx-3 fa-xl hover:text-white"></i>
    
                        <div class="justify-items-center grid columns-1">
                            <span class="fi fi-jp fa-2xl mt-3"></span> 
                            <span class="my-1">Jap</span>
                        </div>
                    </div>
                </div>

                <div class="w-2/5 flex items-center justify-around">
                    
                    <div class="h-min text-center grid columns-1">
                        <div class="inline-block">
                            <i class="fa-solid fa-plane"></i>
                            <span class="font-semibold">IDA</span>
                        </div>
                        <span>25 de Sep</span>
                        <span>6:00 hrs</span>
                    </div>

                    <div class="h-min text-center grid columns-1">
                        <div class="inline-block">
                            <i class="fa-solid fa-plane fa-rotate-180"></i>
                            <span class="font-semibold">REGRESO</span>
                        </div>
                        <span>25 de Sep</span>
                        <span>6:00 hrs</span>
                    </div>
                    
                </div>
                
                <div class="border-l-2 h-100 w-1/5 p-4">
                    <div class="text-center mt-3 grid columns-1 h-min self-center">
                        <span class="text-2xl text-green-400 font-semibold self-center">$25,0000</span>
                        <span>Clase Turista</span>
                        <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="mt-5 block text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Ver más
                        </button>
                    </div>
                </div>

            </div> {{-- Cierra Card --}}
    
        </div> {{--}} Div de cards {{--}}
        
    </div> {{-- cierra container derecha ------------------------------------------------------------------------------------------------------------------------------------- --}}


    {{-- container filtros --}}

    <div class="pt-10 mt-10 lg:pe-10 sm:hidden lg:block">

        <div class="max-w-sm p-6 sm:hidden lg:block bg-white rounded-lg shadow-xl">
            

            <div class="mb-5 flex items-center align-middle gap-5">
                {{-- <i class="fa-solid fa-filter fa-2xl"></i> --}}
                <h5 class="mb-2 w-72 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Filtros</h5>
            </div>


            <ul class="space-y-2 font-medium ">
                <li class="border-t-4 border-orange-500 dark:border-gray-700 pt-4 mt-4 pb-2 ">
                    <div class="">
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Origen</h6>
                        <div class="max-w-sm mx-auto">
                            <div class="flex">
                                <button id="origen-button" data-dropdown-placement="left" data-dropdown-toggle="dropdown-origen" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                                    Pais
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <div id="dropdown-origen" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="h-64 py-2 text-sm text-gray-700 dark:text-gray-200 overflow-y-auto" aria-labelledby="states-button">
                                        
                                        @foreach ($paises as $pais)

                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
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
                                <select id="states" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-e-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        </div>
                    </div> 

                    <div class="mt-2">
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Destino</h6>
                        <div class="max-w-sm mx-auto">
                            <div class="flex">
                                <button id="destino-button" data-dropdown-placement="left" data-dropdown-toggle="dropdown-destino" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                                    Pais
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <div id="dropdown-destino" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="h-64 py-2 text-sm text-gray-700 dark:text-gray-200 overflow-y-auto" aria-labelledby="states-button">
                        
                                        @foreach ($paises as $pais)
                                            <li>
                                                <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <div class="inline-flex items-center">
                                                        <span class="{{"fi fi-" . $pais->bandera }} fa-sm me-2"></span> 
                                                        {{ $pais->nombre }}
                                                    </div>
                                                </button>
                                            </li>
                                        @endforeach
                                            
                                    </ul>

                                </div>
                                <label for="states" class="sr-only">Ciudad</label>
                                <select id="states" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-e-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

                
                <li id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400" class="border-t-2 border-orange-500">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                            <span>Categoría</span>
                            <x-down-arrow></x-down-arrow>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-gray-200">

                            
                            <x-checkbox-input name="clase" id="turista">
                                Turista
                            </x-checkbox-input>
                            
                            <x-checkbox-input name="clase" id="ejecutiva">
                                Clase Ejecutiva
                            </x-checkbox-input>

                            <x-checkbox-input name="clase" id="first">
                                Primera Clase
                            </x-checkbox-input>

                        </div>
                    </div>

                    <h2 id="accordion-flush-heading-2">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                            <span>Aerolínea</span>
                            <x-down-arrow></x-down-arrow>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            
                            <x-checkbox-input name="aerolinea" id="aeromexico">
                                Aeromexico
                            </x-checkbox-input>

                        </div>
                    </div>

                    <h2 id="accordion-flush-heading-3">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                            <span>Escalas</span>
                            <x-down-arrow></x-down-arrow>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            
                            <x-checkbox-input name="directo" id="directo">
                                Directo
                            </x-checkbox-input>

                            
                            <x-checkbox-input name="escalas" id="escalas">
                                Escalado
                            </x-checkbox-input>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    {{-- cierra container filtros ------------------------------------------------------------------------------------------------------------------------------------------ --}}

</div>

@include('modales.infoVueloUsu')

@endsection