@extends('layouts.plantilla')

@section('content')
<div class="flex grid-cols-1 gap-20 w-100 md:row">
    
    

    {{-- container tabla --}}
    <div class="container pt-10 ps-10 ">

        <div class="mb-5 flex items-center align-middle">
            <i class="fa-solid fa-map-location fa-2xl"></i>
            <span class="text-[40px] ms-4">Vuelos</span>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t-4 border-t-orange-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-2 " >
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Código de vuelos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Destino
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aerolinea
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Escala
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Opciones
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            0987uy6
                        </th>
                        <td class="px-6 py-4">
                            Yucatán
                        </td>
                        <td class="px-6 py-4">
                            Aeroméxico
                        </td>
                        <td class="px-6 py-4">
                            13/09/2025
                        </td>
                        <td class="px-6 py-4">
                            Tabasco
                        </td>
                        <td class="">
                            {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                            
                            <button id="dropdownBottomButton" data-dropdown-toggle="dropdownBottom" data-dropdown-trigger="hover" data-dropdown-placement="right" class=" mb-3 md:mb-0 text-black  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Opciones
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                            </button>
    
                        </td>
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>


    
    <!-- Dropdown menu -->
    <div id="dropdownBottom" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBottomButton">
            <li>
                <a href="#" data-modal-target="editarDestinos" data-modal-toggle="editarDestinos" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sky-500">Editar</a>
            </li>
            <li>
                <a href="#" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500">
                    Eliminar 
                </a>
                {{--<a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500">Eliminar</a>--}}
            </li>
            
        </ul>
    </div>

        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-green-700 hover:bg-green-800   focus:ring-green-300-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-5" type="button">
            Agregar vuelo
        </button>

    </div>

    {{-- cierra container tabla ------------------------------------------------------------------------------------------------------------------------------------- --}}




    {{-- container filtros --}}

    <div class="pt-20 pe-10">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            
            <div class="mb-5 flex items-center align-middle gap-5">
                {{-- <i class="fa-solid fa-filter fa-2xl"></i> --}}
                <h5 class="mb-2 w-72 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Filtros</h5>
            </div>

            <ul class="space-y-2 font-medium ">

    {{-- Precios --}}
                <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Precio</h6>

                    <div class="relative mb-6">
                        <label for="labels-range-input" class="sr-only">Labels range</label>

                        <input id="labels-range-input" type="range" value="1000" min="100" max="1500" class="w-full h-2 bg-gray-200  rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min ($0)</span>
                        
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max ($100,000)</span>
                    </div>

                </li>

                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Salida</h6>

                    <div class="flex items-center">
                        <i class="fa-regular fa-calendar"></i>
                        <input type="date" class="ms-3 border-0 rounded px-3 py-1 bg-transparent" />
                    </div>
                    <div class="flex items-center">
                        <i class="fa-regular fa-clock"></i>
                        <input type="time" class="ms-3 border-0 rounded px-3 py-1 bg-transparent" />
                    </div>
                </li>

                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Salida</h6>
                    <div class="flex flex-col">
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">AAAAA</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">BBBBBB</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">CCCCC</label>
                        </div>
                    </div>
                </li>
                <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4">

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
                                        
                                        

                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <div class="inline-flex items-center">
                                                    {{-- <input type="text" hidden value="{{ $pais->id }}" name="paisDestino"> --}}
                                                    <span class="fi fi-mx fa-sm me-2"></span> 
                                                    México
                                                </div>
                                            </button>
                                        </li>
                                        
                                        
                                        
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
                        
                                        
                                            <li>
                                                <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <div class="inline-flex items-center">
                                                        <span class="fi fi-mx fa-sm me-2"></span> 
                                                        México
                                                    </div>
                                                </button>
                                            </li>
                                        
                                            
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

                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Aerolínea</h6>
                    <div class="flex flex-col">
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">AAAAA</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">BBBBBB</label>
                        </div>
                        <div class="flex justify-center items-center">
                            <a href="#" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-center underline" >
                                Más
                            </a>
                        </div>
                    </div>
                </li>
                <li class="border-t-2 border-orange-500 dark:border-gray-700 p-6 mt-4 ">
                    <div class="flex flex-col">
                        <div class="flex justify-center items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Escala</label>
                        </div>
                    </div>
                </li>
                <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4">
                    <div class="flex items-center mt-5">
                        <button  class="text-white bg-lime-600 hover:bg-lime-800 focus:ring-green-300 focus:outline-none focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                            Aplicar
                        </button>
                        <button class="text-white bg-amber-500 hover:bg-amber-800 focus:ring-green-300 focus:outline-none focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 ml-4" type="button">
                            Restablecer
                        </button>
                    </div>
                    
                </li>
            </ul>
        </div>
    </div>

    {{-- cierra container filtros ------------------------------------------------------------------------------------------------------------------------------------------ --}}
</div>
@include ('modales.agregarDestinos')
@include ('modales.eliminarDestinos')
@include ('modales.editarDestinos')

@endsection
