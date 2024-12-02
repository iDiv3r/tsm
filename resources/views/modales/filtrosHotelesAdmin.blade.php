
<div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl g max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Filtros
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="small-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-4 md:p-5 space-y-4">
                <form action="{{ route('rutaFiltrarHotelesAdmin') }}" method="POST">
                    @csrf
                    
                    <ul class="space-y-2 font-medium ">
        
                        <li class=" pb-4 ">
                            <div class="flex justify-between mb-5">
                                
                                <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Precio</h6>
                                
                                <select id="small" class="block w-min p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " name="selPrecio">
                                <option value="1">Menor a</option>
                                <option value="2" selected>Mayor a</option>
                                </select>
                                
                            </div>

                            @php
                                $diff = $precios[0]->maxPrecio - $precios[0]->minPrecio;      
                            @endphp
                            <div class="relative mb-6">
                                <label for="labels-range-input" class="sr-only">Labels range</label>
        
                                <input id="labels-range-input" type="range" name="precio" value="{{ $precios[0]->minPrecio }}"  min="{{ $precios[0]->minPrecio }}" max="{{ $precios[0]->maxPrecio }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">${{ $precios[0]->minPrecio }}</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">$ {{ $precios[0]->minPrecio + ($diff*0.25) }} </span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">$ {{ $precios[0]->minPrecio + ($diff*0.5) }} </span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">${{ $precios[0]->maxPrecio }}</span>
                            </div>

                            
        
                        </li>
        
                        <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4 ">
                                    
                            <div class="flex justify-between mb-5">
                                <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Distancia al Centro</h6>
                                
                                <select id="small" class="block w-min p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " name="selDistancia">
                                <option value="1">Menor a</option>
                                <option value="2" selected>Mayor a</option>
                                </select>
                                
                            </div>

                            <div class="relative mb-6">
                                <label for="labels-range-input" class="sr-only">Labels range</label>

                                @php
                                    $diff = $precios[0]->maxDistancia - $precios[0]->minDistancia;
                                @endphp
        
                                <input id="labels-range-input" type="range" name="distancia" value="{{ $precios[0]->minDistancia }}" min="{{ $precios[0]->minDistancia}}" max="{{ $precios[0]->maxDistancia }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">{{ $precios[0]->minDistancia}} km</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"> {{ $precios[0]->minDistancia + ($diff*0.25) }} km</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"> {{ $precios[0]->minDistancia + ($diff*0.5) }} km</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">{{ $precios[0]->maxDistancia }} km</span>
                            </div>
        
                        </li>
        
                        <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 my-4 ">
                            <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Estrellas</h6>
                            <div class="flex justify-evenly">

                                @for ($i = 1; $i <= 5; $i++)
                                        <x-checkbox-input 
                                        name="estrellas-{{ $i}}" 
                                        id="checkStar-{{ $i }}" 
                                        status=""
                                        >
                                            <span class="sm:text-sm ms-1">
                                                {{ $i}}
                                            </span>
                                        </x-checkbox-input>

                                @endfor
                                
                            </div>
                        </li>
        
                        <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">
        
                            <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Servicios</h6>
                            <div class="grid grid-cols-3 flex-col">
                                
                                @foreach ($servicios as $servicio)
                                
                                    <x-checkbox-input 
                                    name="checkbox-{{ $servicio->id }}" 
                                    id="checkbox-{{ $hotel->id }}-{{ $servicio->id }}" 
                                    status=""
                                    >
                                        <i class="fa-solid fa-{{ $servicio->icono }} ms-1 fa-xs"></i>
                                        <span class=" ms-1">
                                            {{ $servicio->nombre }}
                                        </span>
                                    </x-checkbox-input>

                                @endforeach
                            </div>
                        </li>
                        <div class="flex justify-between w-full border-t-2 border-orange-500">

                            <li class=" dark:border-gray-700 py-4 my-4 ">
                                <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Localización</h6>
                                <div class="flex justify-evenly gap-2">
    
                                    <div class="w-50 mx-auto">
                                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pais</label>
                                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="pais">
                                        <option class="text-sky-500" value="">Seleccionar</option>
                                        @foreach ($paises as $pais)
                                            <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="w-50 mx-auto">
                                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ciudad</label>
                                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="ciudad">
                                        <option class="text-sky-500" value="">Seleccionar</option>
                                        @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}">{{ $ciudad->ciudad }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    
                                    
                                </div>
                            </li>
                            <li class="dark:border-gray-700 p-4 my-4 ">
                                <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Disponibilidad</h6>
                                <div class="flex justify-evenly">
                                    <x-checkbox-input name="disponible" status="" id="dis">
                                        Disponible
                                    </x-checkbox-input>
                                    <x-checkbox-input name="disponiblent" status="" id="nodis">
                                        No Disponible
                                    </x-checkbox-input>
                                </div>
                            </li>
                        </div>

                        

        
                        
                    </ul>
    
                    <div class="flex justify-center mt-5">
                        <button type="submit" class="text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Filtrar</button>
                        
                    </form>
                    <form action="{{ route('hotelesAdministrador') }}">
                        <button type="submit" name="restablecer" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Restablecer</button>
                    </form>
        
                    </div>

            </div>
        </div>
    </div>
</div>