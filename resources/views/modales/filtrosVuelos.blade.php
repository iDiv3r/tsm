
<div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
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
            <div class="p-4 md:p-5 space-y-4">
                    
                <ul class="space-y-2 font-medium ">
                    <li class="pb-2 ">
                        <div class="">
                            <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 ">Origen</h6>
                            <div class="max-w-sm mx-auto">
                                <div class="flex">
                                    <button id="origen-button" data-dropdown-placement="left" data-dropdown-toggle="dropdown-origen" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 " type="button">
                                        Pais
                                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                    </button>
                                    <div id="dropdown-origen" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                        <ul class="h-64 py-2 text-sm text-gray-700 overflow-y-auto" aria-labelledby="states-button">
                                            
                                            @foreach ($paises as $pais)
    
                                            <li>
                                                <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                                                    <div class="inline-flex items-center">
                                                        {{-- <input type="text" hidden value="{{ $pais->id }}" name="paisDestino"> --}}
                                                        <span class="{{"fi fi-" . $pais->bandera }} fa-sm me-2"></span> 
                                                        {{ $pais->nombre }}
                                                    </div>
                                                </button>
                                            </li>
                                            @endforeach
                                            
                                            
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
    
                        <div class="mt-2">
                            <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900">Destino</h6>
                            <div class="max-w-sm mx-auto">
                                <div class="flex">
                                    <button id="destino-button" data-dropdown-placement="left" data-dropdown-toggle="dropdown-destino" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 " type="button">
                                        Pais
                                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                    </button>
                                    <div id="dropdown-destino" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                        <ul class="h-64 py-2 text-sm text-gray-700  overflow-y-auto" aria-labelledby="states-button">
                            
                                            @foreach ($paises as $pais)
                                                <li>
                                                    <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                                                        <div class="inline-flex items-center">
                                                            <span class="{{"fi fi-" . $pais->bandera }} fa-sm me-2"></span> 
                                                            {{ $pais->nombre }}
                                                        </div>
                                                    </button>
                                                </li>
                                            @endforeach
                                                
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
    
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 ">Precio</h6>
    
                        <div class="relative mb-6">
                            <label for="labels-range-input" class="sr-only">Labels range</label>
    
                            <input id="labels-range-input" type="range" value="1000" min="100" max="1500" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                            <span class="text-sm text-gray-500  absolute start-0 -bottom-6">Min ($100)</span>
                            
                            <span class="text-sm text-gray-500  absolute end-0 -bottom-6">Max ($1500)</span>
                        </div>
    
                    </li>
    
                    
                    <li id="accordion-flush-modal" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400" class="border-t-2 border-orange-500">
                        <h2 id="accordion-flush-modal-heading-1">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#accordion-modal-1" aria-expanded="false" aria-controls="accordion-flush-modal-body-1">
                                <span>Categoría</span>
                                <x-down-arrow></x-down-arrow>
                            </button>
                        </h2>
                        <div id="accordion-modal-1" class="hidden" aria-labelledby="accordion-flush-modal-heading-1">
                            <div class="py-5 border-b border-gray-200">
    
                                
                                <x-checkbox-input name="clase" id="turista"  status="">
                                    Turista
                                </x-checkbox-input>
                                
                                <x-checkbox-input name="clase" id="ejecutiva"  status="">
                                    Clase Ejecutiva
                                </x-checkbox-input>
    
                                <x-checkbox-input name="clase" id="first"  status="">
                                    Primera Clase
                                </x-checkbox-input>
    
                            </div>
                        </div>
    
                        <h2 id="accordion-flush-modal-heading-2">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200  gap-3" data-accordion-target="#accordion-modal-2" aria-expanded="false" aria-controls="accordion-flush-modal-body-2">
                                <span>Aerolínea</span>
                                <x-down-arrow></x-down-arrow>
                            </button>
                        </h2>
                        <div id="accordion-modal-2" class="hidden" aria-labelledby="accordion-flush-modal-heading-2">
                            <div class="py-5 border-b border-gray-200 ">
                                
                                <x-checkbox-input name="aerolinea" id="aeromexico" status="">
                                    Aeromexico
                                </x-checkbox-input>
    
                            </div>
                        </div>
    
                        <h2 id="accordion-flush-modal-heading-3">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200  gap-3" data-accordion-target="#accordion-modal-2" aria-expanded="false" aria-controls="accordion-flush-modal-body-3">
                                <span>Escalas</span>
                                <x-down-arrow></x-down-arrow>
                            </button>
                        </h2>
                        <div id="accordion-modal-2" class="hidden" aria-labelledby="accordion-flush-modal-heading-3">
                            <div class="py-5 border-b border-gray-200 ">
                                
                                <x-checkbox-input name="directo" id="directo" status="">
                                    Directo
                                </x-checkbox-input>
    
                                
                                <x-checkbox-input name="escalas" id="escalas" status="">
                                    Escalado
                                </x-checkbox-input>
    
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="flex justify-center mt-5">
                    <button type="button" class="text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Filtrar</button>
    
                    <button type="button" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Restablecer</button>
    
                </div>
            </div>
        </div>
    </div>
</div>