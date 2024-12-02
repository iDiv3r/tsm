@extends('layouts.plantilla')

@section('content')
<div class="flex grid-cols-2 gap-20 w-100 md:row">
    @session('successAdd')
        <script>
            Swal.fire({
                title: "¡Listo!",
                text: "¡{{$value}}!",
                icon: "success"
            });
        </script> 
    @endsession

    @session('successEdit')
        <script>
            Swal.fire({
                title: "¡Listo!",
                text: "¡{{$value}}!",
                icon: "success"
            });
        </script>
    @endsession

    @session('successDelete')
        <script>
            Swal.fire({
                title: "¡Listo!",
                text: "¡{{$value}}!",
                icon: "success"
            });
        </script>
    @endsession

    {{-- container tabla --}}
    <div class="container pt-10 ps-10 ">

        <div class="mb-5 flex items-center align-middle">
            <i class="fa-solid fa-user fa-2xl"></i>
            <span class="text-[40px] ms-4">Usuarios</span>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t-4 border-t-orange-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-2 " >
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Correo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Correo Verificado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rol
                        </th>
                        <th scope="col" class="px-6 py-3">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $item)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->name}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->email}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($item->email_verified_at)
                                Activado
                            @else
                                Desactivado
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($item->rol == '0')
                                Usuario
                            @else
                                Administrador
                            @endif
                        </td>
                        <td class="">
                            {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                            @if ($item->rol == '0' or $item->rol == '1')
                            <button id="dropdownBottomButton" data-dropdown-toggle="dropdownButton{{$item->id}}" data-dropdown-placement="right" class=" mb-3 md:mb-0 text-black  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Opciones
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <!-- Dropdown menu -->
                    <div id="dropdownButton{{$item->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBottomButton">
                            <li>
                                <a data-modal-target="modal-edit-user{{$item->id}}" data-modal-toggle="modal-edit-user{{$item->id}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sky-500">
                                    Editar
                                </a>
                            </li>
                            <li>
                                <a data-modal-target="modal-delete-user{{$item->id}}" data-modal-toggle="modal-delete-user{{$item->id}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500">
                                    Eliminar
                                </a>
                            </li>
                        </ul>
                    </div>
                    @include ('modales.edit-user')
                    @include ('modales.delete-user')
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <button data-modal-target="modal-add-user" data-modal-toggle="modal-add-user" class="block text-white bg-green-700 hover:bg-green-800   focus:ring-green-300-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-5" type="button">
            Agregar Administrador/Usuario
        </button>

    </div>

    {{-- cierra container tabla ------------------------------------------------------------------------------------------------------------------------------------- --}}




    {{-- container filtros --}}

    <div class="pt-20 pe-10 sm:block sm:col-span-12">
        <div class="max-w-sm p-6 bg-orange-200 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            
            <div class="mb-5 flex items-center align-middle gap-5">
                {{-- <i class="fa-solid fa-filter fa-2xl"></i> --}}
                <h5 class="mb-2 w-72 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Configuración y Filtros</h5>
            </div>

            <ul class="space-y-2 font-medium ">

                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">
                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Rol</h6>
                    <div class="flex grid grid-cols-2 flex-col">
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Administrador</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Usuario</label>
                        </div>
                        
                    </div>
                </li>

                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Autentificación</h6>
                    <div class="flex grid grid-cols-3 flex-col">
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Activada</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Desactivada</label>
                        </div>
                    </div>
                </li>

                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Mensajes Automatizados</h6>
                    <div class="flex grid grid-cols-2 flex-col">
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirmar Autentificación</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Recordatorio de Vuelo/Hotel</label>
                        </div>
                        <div class="flex items-center">
                            <div class="relative mb-6">
                                <label for="labels-range-input" class="sr-only">Labels range</label>
                                <input id="labels-range-input" type="range" value="1000" min="100" max="1500" class="w-full h-2 bg-white rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">1 Hora</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">72 Horas</span>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Actualizaciones sobre Vuelos/Hoteles</h6>
                    <div class="flex grid grid-cols-2 flex-col">
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Retraso</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cancelaciones</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ofertas</label>
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
@include ('modales.add-user')
@include ('modales.edit-user')
@include ('modales.delete-user')

@endsection