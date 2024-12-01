@extends('layouts.plantilla')

@section('content')

<link href="{{ asset('/css/adminDestinos.css') }}" rel="stylesheet">


<div class="grid grid-cols-3 gap-4 gap-4 h-auto min-h-full ">

    {{-- container tabla --}}
    <div class="container pt-10  col-start-1 col-end-4">

        <div class="mb-5 flex items-center align-middle">
            <i class="fa-solid fa-file fa-2xl"></i>
            <span class="text-[40px] ms-4">Generar Reportes</span>
        </div>

        <div class="relative  overflow-x-auto shadow-md sm:rounded-lg border-t-4 border-t-orange-500">
            <div class="mb-5 mt-3 flex items-center align-middle text-center gap-5  justify-self-center">
                <h5 class="mb-1 w-60 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white"></i>Filtros</h5>
            </div>
            
            <div id="date-range-picker2" date-rangepicker class=" ms-4 grid grid-cols-4 gap-4 mb-8" datepicker-format="dd-mm-yyyy">
                <div>
                    <span class="mb-2">Fecha de Inicio:</span>
                    <div class="relative max-w-sm  mb-4">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input id="datepicker-range-start2" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Inicio" >
                    </div>
                </div>
                
                <div>
                    <span class="mb-2">Fecha Final:</span>
                    <div class="relative max-w-sm mb-4 ">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input id="datepicker-range-end2" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Fin" >
                    </div>
                </div>
                
                <!-- input destino -->
                <div class="col-start-1 col-end-2">
                    <form action="/adminrepodestadd" method="POST">
                    @csrf 
                    <label for="destino" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destino:</label>
                    <select id="destino" name="destino" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="">Selecciona una aerolínea</option>
                        @foreach($destinos as $destino)
                            <option value="{{$destino->id}}">{{$destino->nombre}}</option>
                        @endforeach
                    </select>
                    <small class="text-red-900">{{$errors->first('destino')}}</small>
                </div>
                <div class=" flex items-stretch ">
                    <button type="submit" class= " text-white  self-end bg-green-600 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Guardar 
                    </button>
                    </form>
                </div>

                <!-- input aerolinea -->
                <div class="col-start-3 col-end-4">
                    <form action="/adminrepoaeroadd" method="POST">
                    @csrf 
                    <label for="aerolinea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aerolínea:</label>
                    <select id="aerolinea" name="aerolinea" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="">Selecciona una aerolínea</option>
                        @foreach($aerolineas as $aeroline)
                            <option value="{{$aeroline->id}}">{{$aeroline->nombre}}</option>
                        @endforeach
                    </select>
                    <small class="text-red-900">{{$errors->first('aerolinea')}}</small>
                </div>
                <div class=" flex items-stretch ">
                    <button type="submit" class= " text-white  self-end bg-green-600 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Guardar
                    </button>
                    </form>
                </div>

                <!-- input clientes -->
                <div class="col-start-1 col-end-2 ">
                    <form action="/adminrepoaclieadd" method="POST">
                    @csrf 
                    <label for="cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destino:</label>
                    <input type="text" id="cliente" name="cliente" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <small class="text-red-900">{{$errors->first('cliente')}}</small>
                </div>
                <div class=" flex items-stretch ">
                    <button type="submit" class= " text-white  self-end bg-green-600 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Guardar 
                    </button>
                    </form>
                </div>
                
            </div>
            
        </div>
            
        

    </div>

   <!-- Contenedor Destinos -->
    <div class="container col-start-1 col-end-2">
        <div  class=" sm:rounded-lg border-t-4 border-t-orange-500">
            <div class="mb-1 mt-1 flex items-center align-middle text-center gap-5  justify-self-center">
                <h5 class="mb-1 w-60 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white"></i>Destinos</h5>
            </div>    
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-2 " >
                <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            España
                        </th>
                        <td class="">
                            <button  type="button" data-modal-target="deleteDestinoRepo" data-modal-toggle="deleteDestinoRepo" class=" md:mb-0 text-black  font-medium rounded-lg text-sm  text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <i class="fa-solid fa-trash" style="color: #e42121;"></i>
                            </button>
                        </td>
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>


    <!-- Contenedor Aerolineas -->
    <div class="container col-start-2 col-end-3 ">
        <div  class=" sm:rounded-lg border-t-4 border-t-orange-500">
            <div class="mb-1 mt-1 flex items-center align-middle text-center gap-5  justify-self-center">
                <h5 class="mb-1 w-60 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white"></i>Aerolíneas</h5>
            </div>    
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-2 " >
                <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            AeroMexico
                        </th>
                        <td class="">
                            <button  type="button" data-modal-target="deleteAeroRepo" data-modal-toggle="deleteAeroRepo" class=" md:mb-0 text-black  font-medium rounded-lg text-sm  text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <i class="fa-solid fa-trash" style="color: #e42121;"></i>
                            </button>
                        </td>
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>


    <!-- Contenedor Cliente -->
    <div class="container col-start-3 col-end-4 ">
        <div  class=" sm:rounded-lg border-t-4 border-t-orange-500">
            <div class="mb-1 mt-1 flex items-center align-middle text-center gap-5  justify-self-center">
                <h5 class="mb-1 w-60 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white"></i>Clientes</h5>
            </div>    
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-2 " >
                <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Alfredo Hernandez Cuevas
                        </th>
                        <td class="">
                            <button  type="button" data-modal-target="deleteClienRepo" data-modal-toggle="deleteClienRepo" class=" md:mb-0 text-black  font-medium rounded-lg text-sm  text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <i class="fa-solid fa-trash" style="color: #e42121;"></i>
                            </button>
                        </td>
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>


    <!-- Contenedor Boton -->
    <div class= " mt-9 mb-20 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <button>
            Generar Reporte
        </button>
    </div>

    

</div>

@session('exitodesadd')
    <script>
    Swal.fire({
        icon: "success",
        title: "El destino fue guardado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession

@session('exitoaeroadd')
    <script>
    Swal.fire({
        icon: "success",
        title: "La aerolinea fue guardado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession

@session('exitoClienadd')
    <script>
    Swal.fire({
        icon: "success",
        title: "El cliente fue guardado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession


@session('exitoDestdel')
    <script>
    Swal.fire({
        icon: "success",
        title: "El destino fue eliminado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession

@session('exitoAerodel')
    <script>
    Swal.fire({
        icon: "success",
        title: "La aerolinea fue eliminada correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession

@session('exitocliedel')
    <script>
    Swal.fire({
        icon: "success",
        title: "El cliente fue eliminada correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession



@include ('modales.deleteClienRepo')
@include ('modales.deleteAeroRepo')
@include ('modales.deleteDestinoRepo')

@endsection