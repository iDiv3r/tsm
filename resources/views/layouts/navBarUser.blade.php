
{{-- NavBar --}}

<nav class=" border-gray-200 dark:bg-gray-900 border border-b-orange-400 border-b-4 
bg-white
{{-- bg-gradient-to-t from-orange-300 to-yellow-100  --}}
">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <button style="cursor: pointer;" class="flex items-center space-x-3 rtl:space-x-reverse" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example" data-drawer-backdrop="true">
            <img src="{{ asset('images/logo.svg') }}" class="h-8" alt="Flowbite Logo" />
            {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Turista Sin Maps</span> --}}
            <div class="flex self-center text-2xl font-semibold whitespace-nowrap ">
                <span class="hover:text-orange-500">T</span>
                <span class="hover:text-orange-500">u</span>
                <span class="hover:text-orange-500">r</span>
                <span class="hover:text-orange-500">i</span>
                <span class="hover:text-orange-500">s</span>
                <span class="hover:text-orange-500">t</span>
                <span class="hover:text-orange-500">a</span>

                <span class="hover:text-orange-500 ms-2">S</span>
                <span class="hover:text-orange-500">i</span>
                <span class="hover:text-orange-500">n</span>

                <span class="hover:text-orange-500 ms-2">M</span>
                <span class="hover:text-orange-500">a</span>
                <span class="hover:text-orange-500">p</span>
                <span class="hover:text-orange-500">s</span>
                
            </div>
        </button>

        <div class="flex md:order-2">
            <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 me-1">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">{{__('Buscar')}}</span>
            </button>

            <div class="relative hidden md:block">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
            </div>

            <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>

            
            <div class="flex ms-5">

                
                <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="w-min font-medium rounded-lg py-2.5 text-center inline-flex items-center" type="button" data-dropdown-offset-skidding="120" data-dropdown-placement="left">
                    <i class="fa-solid fa-bell fa-2xl hover:text-gray-600"></i>
                </button>
                
                <div class="text-[9px] text-white place-self-start bg-red-600 w-auto rounded-full text-center me-4">
                    <span class="w-auto px-1">1</span>
                </div>
                
                <a href="{{ route('miCarrito') }}" class="place-self-center">
                    <i class="fa-solid fa-cart-shopping fa-2xl hover:text-gray-600"></i>
                </a>
                @if ($cantidadItemsCarrito > 0)
                    <div class="text-[9px] text-white place-self-start bg-red-600 w-auto rounded-full ms-1 text-center">
                        <span class="w-auto px-1">{{$cantidadItemsCarrito}}</span>
                    </div>
                @endif
                {{-- <div class="text-[9px] text-white place-self-start bg-red-600 w-auto rounded-full ms-1 text-center">
                    <span class="w-auto px-1">1 </span>
                </div> --}}

                <a href="{{route('profile.show')}}" class="place-self-center ms-4">
                    <i class="fa-solid fa-user fa-2xl fa-regular hover:text-gray-600"></i>
                </a>
            </div>
        </div>

        

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
            <div class="relative mt-3 md:hidden">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
            </div>
            

            {{-- <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
            </ul> --}}
        </div>
    </div>
</nav>



    
    <!-- Dropdown menu -->
    <div id="dropdownDivider" class="hidden bg-white rounded-lg shadow-lg lg:w-1/3 sm:w-2/3 border-2 border-gray-200 z-10">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
            <li>
                <span href="#" class="block px-4 py-2 text-xl text-black font-bold hover:bg-gray-100 border-b-2 border-gray-200">Notificaciones</span>
            </li>
            <li>
                <span href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Homero</span>
            </li>
            <li>
                <span href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hola</span>
            </li>
            <li>
                <span href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Homero</span>
            </li>
            <li>
                <span href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cerveza :talking_head: :flame:</span>
            </li>
            <li>
                <span href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Homero</span>
            </li>
            <li>
                <span href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Eso me gusta</span>
            </li>
        </ul> 
    </div>
    


{{-- Off Canvas Drawer --}}
<div id="drawer-example" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">Usuario</h5>
        <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        
        <div class="">
            <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                    {{-- <li class="pt-4 mt-4 space-y-2 font-medium border-t-4 border-gray-500 dark:border-gray-700">
                        <a href="{{route('rutaadminDestino')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-map-location fa-xl"></i>
                            <span class="ms-3">Destinos</span>
                        </a>
                    </li> --}}
                    <li class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                        <a href="{{route('rutaHotelesUsuarios')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-hotel fa-xl"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Hoteles</span>
                        </a>
                    </li>

                    <li class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                        <a href="{{route('rutaVuelosUsuarios')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-plane-departure fa-xl"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Vuelos</span>
                            
                        </a>
                    </li>
                
                    

                    <li class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>

            </div>
        </div>  
</div>
