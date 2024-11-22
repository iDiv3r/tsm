@extends('layouts.plantilla')

@section('content')


<div class="lg:flex md:grid lg:columns-2 md:columns-1 md:justify-items-center lg:gap-20">
    

    {{-- Container Derecha --}}
    <div class="container pt-10 lg:ps-10">
        
        
        <div class="flex justify-between items-center align-middle">
            {{-- Titulo --}}
            <div class="mb-5 flex items-center align-middle ">
                <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                <span class="text-[40px] ms-4">Carrito</span>
            </div>

            <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" class="h-min text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none sm:block lg:hidden">
                <i class="fa-solid fa-magnifying-glass fa-md me-2"></i>
                Filtros
            </button>

        </div>

        <div class="grid grid-cols-1 gap-5"> {{-- Div de cards --}}

            <div class="flex w-auto lg:m-0 bg-white border-2 border-gray-200 rounded-lg shadow-xl "> {{-- Card --}}
                

                <div class="h-auto lg:w-1/3 sm:w-1/2 place-content-center mx-3">
                    <img src="https://images.trvl-media.com/lodging/41000000/40600000/40594000/40593961/c2ec8eeb_w.jpg" alt="" class="rounded-lg flex w-min ">
                </div>

                <div class="flex justify-between w-full ms-5">

                    <div class="grid grid-cols-1 my-3">
    
                        <span class="text-xl h-min mb-2">Hotel Golden</span>
    
                        <x-static_star_rating ></x-static_star_rating>
    
                        <div class="flex align-center">
                            <div class="bg-gray-300 rounded flex items-center shadow h-min px-2 gap-2 sm:mb-2 mt-4  ">
                                <span class="fi fi-be fa-sm"></span> 
                                <span class="my-1">Ciudad: Belgica</span>
                            </div>
                        </div>
                        
                        <span class="">Distancia al centro: </span>
                        
                        <div class="">
                            2.5 km
                        </div>
                    
                        
                    </div>
                    <div class="border-s px-10 place-content-center ">
                        <div class="my-3">
                            <div class="text-center grid grid-cols-1">
                                <span>Desde 4500$</span>
                                <span class="text-green-400 font-bold mt-2">Disponible</span>
                            </div>
                            <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="mt-5 block text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center h-min" type="button">
                                Ver más
                            </button>
                        </div>
                    </div>
                    
                </div>

            </div> {{-- Cierra Card --}}

            <div class="flex w-auto lg:m-0 bg-white border-2 border-gray-200 rounded-lg shadow-xl justify-evenly "> {{-- Card --}}
                
                <div class="text-2xl font-medium self-center sm:hidden lg:block mx-5 w-1/5 text-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Aeromexico.png/1200px-Aeromexico.png" alt="" class="p-1">
                    {{-- Aeromexico --}}
                </div>

                <div class="grid grid-cols-1 items-center text-bottom mx-5">

                    <div class="lg:hidden sm:block align-baseline text-center items-center text-2xl font-medium">
                        {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Aeromexico.png/1200px-Aeromexico.png" alt="" class="p-1 "> --}}
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
                        <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="mt-5 block text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                            Ver más
                        </button>
                    </div>
                </div>

            </div> {{-- Cierra Card --}}
        </div> {{--}} Div de cards {{--}}
    </div>

    {{-- cierra container derecha ------------------------------------------------------------------------------------------------------------------------------------- --}}


    {{-- container filtros --}}

    <div class="pt-10 mt-10 lg:pe-10 sm:hidden lg:block">

        <div class="max-w-sm p-6 sm:hidden lg:block bg-white rounded-lg shadow-xl">
            

            <div class="mb-5 flex text-3xl items-center align-middle gap-5 whitespace-nowrap">
                {{-- <i class="fa-solid fa-filter fa-2xl"></i> --}}
                <span class="font-bold tracking-tight text-gray-900 dark:text-white">Total</span>
                <span class="">$50,000 mxn</span>
            </div>

            <button type="button" class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Proceder al Pago</button>

        </div>
    </div>

    {{-- cierra container filtros ------------------------------------------------------------------------------------------------------------------------------------------ --}}

</div>

@include('modales.infoHotelesUsu')

@include('modales.filtrosHoteles')

@endsection