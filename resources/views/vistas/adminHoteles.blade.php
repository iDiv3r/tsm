@extends('layouts.plantilla')

@section('content')

{{-- @dump($hoteles) --}}




<div class="flex justify-center">
    @session('success')
        <script>
            Swal.fire({
                title: "¡Listo!",
                text: "¡{{$value}}!",
                icon: "success"
            });
        </script> 
    @endsession

    
    {{-- container tabla --}}
    <div class="container pt-10 ">

        <div class="flex justify-between items-center">
            <div class="mb-5 flex items-center align-middle">
                <i class="fa-solid fa-hotel fa-2xl"></i>
                <span class="text-[40px] ms-4">Hoteles</span>
            </div>
            
            <div class="place-items-end">
                <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" class="h-min text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">
                    <i class="fa-solid fa-magnifying-glass fa-md me-2"></i>
                    Filtros
                </button>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t-4 border-t-orange-500">
            <table class="w-full text-center rtl:text-right text-gray-500 border-2" >
                <thead class=" text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Calificación
                            <br>
                            Estrellas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Distancia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Huéspedes
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Políticas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Direccion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ciudad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Servicios
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hoteles as $hotel)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $hotel->nombre }}
                            </th>

                            <td class="px-6 py-4">
                                {{ $hotel->calificacion }}
                                <br>
                                {{ $hotel->estrellas  }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $hotel->distancia }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $hotel->num_huespedes }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $hotel->precio }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $hotel->politicas }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $hotel->direccion }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="fi fi-{{ $hotel->bandera }} fa-xl mb-1"></span> 
                                <br>
                                <span >
                                    {{ $hotel->ciudad }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-start">
                                @foreach ($serviciosHoteles as $servicioHotel)
                                    @if ($servicioHotel->hotel == $hotel->id)
                                        <i class="fa-solid fa-{{ $servicioHotel->icono }} ms-1 fa-xs"></i>
                                        <span class="sm:text-sm">
                                            {{ $servicioHotel->servicio }}
                                        </span>
                                        <br>
                                    @endif
                                @endforeach
                            </td>

                            <td class="">
                                {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                                
                                <button id="dropdownBottomButton-{{ $hotel->id }}" data-dropdown-toggle="dropdownBottom-{{ $hotel->id }}" data-dropdown-trigger="click" data-dropdown-placement="right" class=" mb-3 md:mb-0 text-black  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Opciones
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                </button>
        
                            </td>
                        </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>


    @foreach ($hoteles as $hotel)
    
        <!-- Dropdown menu -->
        <div id="dropdownBottom-{{ $hotel->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 border border-gray-200">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBottomButton-{{ $hotel->id }}">
                <li>
                    <a href="#" data-modal-target="modal-edit-hotel-{{ $hotel->id }}" data-modal-toggle="modal-edit-hotel-{{ $hotel->id }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sky-500">Editar</a>
                </li>
                <li>
                    <a href="#" data-modal-target="modal-delete-hotel-{{ $hotel->id }}" data-modal-toggle="modal-delete-hotel-{{ $hotel->id }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500">
                        Eliminar 
                    </a>
                    {{--<a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500">Eliminar</a>--}}
                </li>
                
            </ul>
        </div>


        @include ('modales.adminEditarHotel')
        @include ('modales.adminEliminarHotel')

    @endforeach

        <button data-modal-target="modal-add-hotel" data-modal-toggle="modal-add-hotel" class="block text-white bg-green-700 hover:bg-green-800   focus:ring-green-300-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-5" type="button">
            Agregar Hotel
        </button>

    </div>

    {{-- cierra container tabla ------------------------------------------------------------------------------------------------------------------------------------- --}}





</div>

@include('modales.filtrosHotelesAdmin')

@include ('modales.adminAgregarHotel')



@endsection