@extends('layouts.plantilla')

@section('content')

<link href="{{ asset('/css/adminDestinos.css') }}" rel="stylesheet">


<div class="lg:flex lg:columns-2 lg:gap-20 md:grid md:columns-1 md:justify-items-center">
    
    {{-- container tabla --}}
    <div class="container pt-10 ps-10 md:col-span-5 sm:col-span-12">
        
        <div class="flex justify-between items-center align-middle">
            {{-- Titulo --}}
            <div class="mb-5 flex items-center align-middle">
                <i class="fa-solid fa-map-location fa-2xl"></i>
                <span class="text-[40px] ms-4">Destinos</span>
            </div>
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-green-700 hover:bg-green-800   focus:ring-green-300-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-5" type="button">
                Agregar
            </button>
            
            <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" class="h-min text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none sm:block lg:hidden">
                <i class="fa-solid fa-magnifying-glass fa-md me-2"></i>
                Filtros
            </button>

        </div>

        <div class="relative overflow-x-auto shadow-md mb-5 sm:rounded-lg border-t-4 border-t-orange-500">
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
                            Aerolinea
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($destinos as $destino)

                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $destino->pais }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $destino->ciudad }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $destino->aerolinea }}
                        </td>
                        <td class="">
                            {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                            
                            <button id="dropdownBottom{{$destino->id}}" data-dropdown-toggle="dropdownBottom{{$destino->id}}"  data-dropdown-placement="right" class=" mb-3 md:mb-0 text-black  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Opciones
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                            </button>
    
                        </td>
                    </tr>
                    <div id="dropdownBottom{{$destino->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBottomButton{{$destino->id}}">
                            <li>
                                <a type="button" data-modal-target="editarDestino{{$destino->id}}" data-modal-toggle="editarDestino{{$destino->id}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sky-500" >Editar</a>
                            </li>
                            <li>
                                <a type="button" data-modal-target="deleteDestino{{$destino->id}}" data-modal-toggle="deleteDestino{{$destino->id}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500" >Eliminar</a>
                            </li>
                            
                        </ul>
                    </div>
                    @include ('modales.editarDestino')
                    @include ('modales.deleteDestino')
                    @endforeach
                </tbody>
            </table>
        </div>


    
        <!-- Dropdown menu -->


    </div>

    {{-- cierra container tabla ------------------------------------------------------------------------------------------------------------------------------------- --}}




    {{-- container filtros --}}

    <div class="pt-10 mt-10 lg:pe-10 sm:hidden lg:block">

        <div class="max-w-sm p-6 sm:hidden lg:block bg-white rounded-lg shadow">
            

            <div class="mb-5 flex items-center align-middle gap-5">
                {{-- <i class="fa-solid fa-filter fa-2xl"></i> --}}
                <h5 class="mb-2 w-72 text-3xl font-bold tracking-tight text-gray-900 ">Filtros</h5>
            </div>


            <ul class="space-y-2 font-medium">
                <li class="border-t-4 border-orange-500  pt-4 mt-4 pb-2 ">
                    <div class="">
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 ">Origen</h6>
                        <div class="max-w-sm mx-auto">
                            <div class="flex">
                                <button id="origen-button" data-dropdown-placement="left" data-dropdown-toggle="dropdown-origen-modal" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 " type="button">
                                    Pais
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <div id="dropdown-origen-modal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                    <ul class="h-64 py-2 text-sm text-gray-700 overflow-y-auto" aria-labelledby="states-button">
                                        
                                        {{-- @foreach ($paises as $pais)

                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                                                <div class="inline-flex items-center">
                                                    {{-- <input type="text" hidden value="{{ $pais->id }}" name="paisDestino"> 
                                                    <span class="{{"fi fi-" . $pais->bandera }} fa-sm me-2"></span> 
                                                    {{ $pais->nombre }}
                                                </div>
                                            </button>
                                        </li>
                                        @endforeach --}}
                                        
                                        
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
                        </div>
                    </div> 
                </li>


                <li class="border-t-2 border-orange-500  py-4 mt-4 ">

                    <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 ">aerolinea</h6>

                    
                    <div class="max-w-sm mx-auto">
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Seleccionar</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                        </select>
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
@include ('modales.filtrosDestinosAdmin')

@endsection