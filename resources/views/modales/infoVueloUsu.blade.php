
<div id="info-vuelo-{{ $vuelo->id }}" data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Información del Vuelo
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="info-vuelo-{{ $vuelo->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="flex justify-around px-10 items-center">


                    {{-- <img src="https://pbs.twimg.com/profile_images/1833390522876014592/XRQudU2m_400x400.jpg" alt="" class=" w-2/5"> --}}

                    <div class="w-50">
                    
                        <div class="grid columns-1">
                    
                            <div class="h-min text-center grid columns-1 my-5">
                                <div class="inline-block">
                                    <i class="fa-solid fa-plane"></i>
                                    <span class="font-semibold">IDA</span>
                                </div>
                                <span>{{ $vuelo->fecha_salida }} </span>
                                <span>{{ $vuelo->hora_salida}}</span>
                                {{-- <span>6:00 hrs</span> --}}
                            </div>
                            
                            @if ($vuelo->fecha_regreso != $vuelo->fecha_salida)
                                <div class="h-min text-center grid columns-1">
                                    <div class="inline-block">
                                        <i class="fa-solid fa-plane fa-rotate-180"></i>
                                        <span class="font-semibold">REGRESO</span>
                                    </div>
                                    <span>{{ $vuelo->fecha_regreso }}</span>
                                    {{-- <span>6:00 hrs</span> --}}
                                </div>
                            @endif

                            
                            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium
                            rounded-lg text-sm px-5 py-2.5 mx-2 mb-2 mt-5">
                            Agregar al carro
                            <i class="fa-solid fa-cart-shopping ms-1"></i>
                            
                            </button>

                        </div>
                    </div>

                    <div class="justify-items-center text-center">
    
                        <span class="text-2xl font-medium">{{ $vuelo->aerolinea }}</span>
        
                        <div class="bg-gray-300 rounded flex items-center w-auto mt-2 shadow">
                            <div class="justify-items-center grid columns-1">
                                <span class="fi fi-{{ $vuelo->banderaorigen }} fa-2xl mx-3 mt-3"></span> 
                                <span class="mt-1 text-xs font-bold">{{ $vuelo->abvorigen }}</span>
                                <span class="mb-1 text-xs">{{ $vuelo->abvciudadorigen }}</span>
                            </div>
                            <i class="fa-solid fa-arrow-right position-self-center mx-3 fa-xl hover:text-white"></i>
        
                            <div class="justify-items-center grid columns-1">
                                <span class="fi fi-{{ $vuelo->banderadestino }} fa-2xl mx-3 mt-3"></span> 
                                <span class="mt-1 text-xs font-bold">{{ $vuelo->abvdestino }}</span>
                                <span class="mb-1 text-xs">{{ $vuelo->abvciudaddestino }}</span>
                            </div>
                        </div>
        
                        <div class="text-center mt-3 grid columns-1 gap-5">
                            <span class="text-2xl text-green-400 font-semibold" id="sel-{{ $vuelo->id }}-precio">
                                @foreach ($categoriasVuelos as $cv)
                                    @if ($cv->flight_date_id == $vuelo->id && $cv->categoria == 'Clase Turista')
                                        ${{ $cv->precio }}
                                    @endif
                                @endforeach    
                            </span>
                            {{-- <span>Clase Turista</span> --}}
                            <div class="max-w-sm mx-auto">
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar Clase</label>
                                <select id="sel-{{ $vuelo->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($categoriasVuelos as $cv)
                                    @if ($cv->flight_date_id == $vuelo->id)
                                        <option value="{{ $cv->categoria}}">{{ $cv->categoria}}</option>
                                    @endif
                                @endforeach
                                    {{-- <option value="3">Clase Turista</option>
                                <option value="2">Clase Ejecutiva</option>
                                <option value="1">Primera Clase</option> --}}
                                </select>
                            </div>

                            


                        </div>
                    </div>
        
                    
                </div>

                {{-- <div class="flex justify-between px-10 pt-5">
                    <div class="grid columns-1 w-2/5 h-min">
                        <span class="font-semibold mb-3">Servicios Extra:</span>
                        <span>
                            <i class="fa-solid fa-wifi mt-3 ms-1 fa-xs"></i>
                            Wi-Fi gratis
                        </span>
                        <span>
                            <i class="fa-solid fa-utensils mt-2 ms-1"></i>
                            Restaurante
                        </span>
                        <span>
                            <i class="fa-solid fa-bone mt-2 ms-1"></i>
                            Mascotas
                        </span>
                    </div>
                    <div class="px-10">
                        <div class="">
                            <span class="font-semibold text-2xl mb-1">Descripción</span>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </p>
                        </div>
                        <div class="my-5">
                            <span class="font-semibold">Políticas de Cancelación</span>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </p>
                        </div>

                    </div>

                    

                </div> --}}

                <div class="border-t-4 border-t-orange-800 p-8">

                    <div class="text-center">
                        <span class="text-2xl font-semibold">Comentarios</span>
                    </div>

                    <div class="flex mt-5">
                        <div class="aspect-square sm:w-2/4 md:w-1/4 me-5">
                            <img src="{{ asset('images/pfp.jpg') }}" class="rounded-full"  alt="">
                            
                        </div>
                        <div class="">
                            {{-- <div class="rating-wrapper-hl mb-1">
            
                                <!-- star 5 -->
                                
                                <label for="5-star-rating" class="star-rating">
                                <i class="fas fa-star fa-2xs d-inline-block"></i>
                                </label>
                                
                                <!-- star 4 -->
                                <input type="radio" disabled checked>
                                <label for="4-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block fa-2xs"></i>
                                </label>
                                
                                <!-- star 3 -->
                                
                                <label for="3-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block fa-2xs"></i>
                                </label>
                                
                                <!-- star 2 -->
                                
                                <label for="2-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block fa-2xs"></i>
                                </label>
                                
                                <!-- star 1 -->
                                
                                <label for="1-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block fa-2xs"></i>
                                </label>
                                
                            </div> --}}

                            <x-static_star_rating></x-static_star_rating>
                            <p class="mt-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>