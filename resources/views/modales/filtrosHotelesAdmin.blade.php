
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
            <div class="px-4 md:p-5 space-y-4">
    
                <ul class="space-y-2 font-medium ">
    
                    <li class=" pb-4 ">
    
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Precio</h6>
    
                        <div class="relative mb-6">
                            <label for="labels-range-input" class="sr-only">Labels range</label>
    
                            <input id="labels-range-input" type="range" value="1000" min="100" max="1500" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min ($0)</span>
                            
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max ($100,000)</span>
                        </div>
    
                    </li>
    
                    <li class="border-t-2 border-orange-500 dark:border-gray-700 py-4 mt-4 ">
    
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Distancia al Centro</h6>
    
                        <div class="relative mb-6">
                            <label for="labels-range-input" class="sr-only">Labels range</label>
    
                            <input id="labels-range-input" type="range" value="1000" min="100" max="1500" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min (0 Km)</span>
                            
                            <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max (100 Km)</span>
                        </div>
    
                    </li>
    
                    <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Estrellas</h6>
                        <div class="flex grid grid-cols-2 flex-col">
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">1</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">2</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">3</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">4</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">5</label>
                            </div>
                        </div>
                    </li>
    
                    <li class="border-t-2 border-orange-500 dark:border-gray-700 pt-4 mt-4 ">
    
                        <h6 class="mb-2 w-72 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Servicios</h6>
                        <div class="flex grid grid-cols-3 flex-col">
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wi-Fi</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Desayuno</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Piscina</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Zona Infantil</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Buffet</label>
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