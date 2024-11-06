@extends('layouts.plantilla1')

@section('content')

<link href="{{ asset('/css/adminDestinos.css') }}" rel="stylesheet">

<div  class="  bg-[#ECF0F5]">
    <button data-collapse-toggle="filtro" type="button" class="inline-flex items-center mt-3 p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="filtro" aria-expanded="false">
            <i class="fa-solid fa-filter h-2 m-2"></i>
    </button>

</div>
<div class=" flex grid grid-cols-1   gap-4  h-auto min-h-full  bg-[#ECF0F5]">

        <!-- Menu de Filtros -->
        
        <div class=" hidden md:hidden sm:block sm:col-span-12" id="filtro">
            <div class=" p-6 bg-orange-200 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" >
                
                <div class="mb-1 flex   justify-self-center gap-5">
                    <h5 class="mb-1 w-60 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white"><i class="fa-solid fa-filter h-2 m-2"></i>Filtros</h5>
                </div>
                    

                <ul class="space-y-2 font-medium ">
                    <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">País</h6>


                            <div class="flex items-center">
                                <input type="text" id="b-pais" class="block w-full p-2 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar...">
                            </div>
                    </li>

                    <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Ciudad</h6>


                            <div class="flex items-center">
                                <input type="text" id="b-ciudad" class="block w-full p-2 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar...">
                            </div>
                    </li>

                    <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4 ">

                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Aeropuerto</h6>

                        <div class="relative mb-3">
                            <input type="text" id="b-aeropuerto" class="block w-full p-2 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar...">
                        </div>

                    </li>

                    
                </ul>
            </div>
        
        </div>
        <!-- Fin de menu Filtros -->

    {{-- container tabla --}}
    <div class="container pt-10 ps-10 md:col-span-5 sm:col-span-12">

        <div class="mb-5 flex items-center align-middle">
            <i class="fa-solid fa-map-location fa-2xl"></i>
            <span class="text-[40px] ms-4">Destinos</span>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t-4 border-t-orange-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-2 " >
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Pais
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ciudad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aeropuerto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            España
                        </th>
                        <td class="px-6 py-4">
                            Madrid
                        </td>
                        <td class="px-6 py-4">
                            Aero espacial 1
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
                <a type="button" data-modal-target="editarDestino" data-modal-toggle="editarDestino" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sky-500" >Editar</a>
            </li>
            <li>
                <a type="button" data-modal-target="deleteDestino" data-modal-toggle="deleteDestino" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500" >Eliminar</a>
            </li>
            
        </ul>
    </div>

        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-green-700 hover:bg-green-800   focus:ring-green-300-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-5" type="button">
            Agregar
        </button>

    </div>

    {{-- cierra container tabla ------------------------------------------------------------------------------------------------------------------------------------- --}}




    {{-- container filtros --}}

    <div class=" hidden  pt-20 pe-10 md:col-span-2 md:col-end-9  sm:col-span-12  md:block sm:hidden">
        <div class=" p-6 bg-orange-200 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" >
            
            <div class="mb-1 flex items-center align-middle text-center gap-5  justify-self-center">
                <h5 class="mb-1 w-60 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white"><i class="fa-solid fa-filter h-2 m-2"></i>Filtros</h5>
            </div>
                

            <ul class="space-y-2 font-medium ">
                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">País</h6>


                        <div class="flex items-center">
                            <input type="text" id="b-pais" class="block w-full p-2 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar...">
                        </div>
                </li>

                <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Ciudad</h6>


                        <div class="flex items-center">
                            <input type="text" id="b-ciudad" class="block w-full p-2 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar...">
                        </div>
                </li>

                <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Aeropuerto</h6>

                    <div class="relative mb-3">
                        <input type="text" id="b-aeropuerto" class="block w-full p-2 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar...">
                    </div>

                </li>

                
            </ul>
        </div>
        
    </div>

    {{-- cierra container filtros ------------------------------------------------------------------------------------------------------------------------------------------ --}}

</div>

@session('exitoadd')
    <script>
    Swal.fire({
        icon: "success",
        title: "El destino fue guardado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession

@session('exitoedit')
    <script>
    Swal.fire({
        icon: "success",
        title: "El destino fue editado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession
@session('exitodel')
    <script>
    Swal.fire({
        icon: "success",
        title: "El destino fue eliminado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession



@include ('modales.addDestino')
@include ('modales.editarDestino')
@include ('modales.deleteDestino')

@endsection