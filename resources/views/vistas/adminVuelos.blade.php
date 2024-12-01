@extends('layouts.plantilla')

@section('content')

{{-- @dump($categoriasVuelos) --}}

{{-- @dump($vuelos) --}}

<div class="flex grid-cols-1 w-100 md:row">
    @session('exito')

        <script>
            Swal.fire({
                text: '{{ $value }}',
                icon: "success"
            });
        </script>
    @endsession


    {{-- container tabla --}}
    <div class="container pt-10 ms-10 me-20 ">
        <div class="flex justify-between items-center">

            <div class="mb-5 flex items-center align-middle">
                <i class="fa-solid fa-map-location fa-2xl"></i>
                <span class="text-[40px] ms-4">Vuelos</span>
            </div>

            <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" class="h-min text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">
                <i class="fa-solid fa-magnifying-glass fa-md me-2"></i>
                Filtros
            </button>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t-4 border-t-orange-500">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400 border-2 " >
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Código
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Duracion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pasajeros
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Escalas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aerolínea
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Origen
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Destino
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Opciones
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($vuelos as $vuelo)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"> 
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $vuelo->codigo }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $vuelo->duracion }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vuelo->pasajeros }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vuelo->escalas }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vuelo->aerolinea }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="fi fi-{{ $vuelo->banderaorigen }} fa-xl mb-1"></span>
                                <br> 
                                {{ $vuelo->origen }}
                                <br>
                                {{ $vuelo->paisorigen }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="fi fi-{{ $vuelo->banderadestino }} fa-xl mb-1"></span> 
                                <br>
                                {{ $vuelo->destino }}
                                <br>
                                {{ $vuelo->paisdestino }}
                            </td>
                            <td class="">
                                {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                                
                                <button id="dropdownBottomButton-{{ $vuelo->id }}" data-dropdown-toggle="dropdownBottom-{{ $vuelo->id }}" data-dropdown-trigger="click" data-dropdown-placement="top" class=" mb-3 md:mb-0 text-black  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Opciones
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    
    @foreach ($vuelos as $vuelo)

        <!-- Dropdown menu -->
        <div id="dropdownBottom-{{ $vuelo->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 border-gray-200 border-2" >
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBottomButton">
                <li>
                    <a href="#" data-modal-target="editar-vuelo-{{ $vuelo->id }}" data-modal-toggle="editar-vuelo-{{ $vuelo->id }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sky-500">Editar</a>
                </li>
                <li>
                    <a href="#" data-modal-target="eliminar-vuelo-{{ $vuelo->id }}" data-modal-toggle="eliminar-vuelo-{{ $vuelo->id }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500">
                        Eliminar 
                    </a>
                    {{--<a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500">Eliminar</a>--}}
                </li>
                
            </ul>
        </div>

        @include ('modales.adminEditarVuelo')

        @include ('modales.adminEliminarVuelo')

    @endforeach
    

        <button data-modal-target="agregarVuelo" data-modal-toggle="agregarVuelo" class="block text-white bg-green-700 hover:bg-green-800   focus:ring-green-300-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-5" type="button">
            Agregar vuelo 
        </button>

    </div>

    {{-- cierra container tabla ------------------------------------------------------------------------------------------------------------------------------------- --}}

</div>

@include ('modales.filtrosVuelosAdmin')

@include ('modales.adminAgregarVuelo')


@endsection
