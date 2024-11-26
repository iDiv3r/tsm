<!-- Large Modal -->
<div id="modal-edit-hotel-{{ $hotel->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Editar hotel: 
                    <span class="text-red-500">
                        {{ $hotel->nombre }}
                    </span>
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-edit-hotel-{{ $hotel->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form  action="{{ route('editarHotel') }}" method="POST" class="p-4 md:p-5" enctype="multipart/form-data">
                @csrf
                    <div class="grid gap-4 mb-3">

                        <input type="hidden" name="idHotel" value="{{ $hotel->id }}">

                        <div class="grid grid-cols-4 gap-4">
                            <!-- Código, Fecha Salida, Fecha Regreso ----------------------------------------------------------->
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" name="txtNombre-{{ $hotel->id }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtNombre' . $hotel->id ) !== null ? old('txtNombre' . $hotel->id):$hotel->nombre }}">
                                <small class="text-red-500"> {{ $errors->first('txtNombre-'. $hotel->id) }}</small>
                            </div>

                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                                <input type="text" name="txtDireccion-{{ $hotel->id }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtDireccion' . $hotel->id ) !== null ? old('txtDireccion' . $hotel->id):$hotel->direccion }}">
                                <small class="text-red-500"> {{ $errors->first('txtDireccion-'. $hotel->id) }}</small>
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ciudad</label>
                                <select id="" name="txtCiudad-{{ $hotel->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected value="">----</option>
                                    
                                    @foreach ($ciudades as $ciudad)
                                        <option 
                                    
                                        @if ($ciudad->id == $hotel->city_id)
                                            selected
                                        @endif
                                        
                                        value="{{ $ciudad->id }}">{{ $ciudad->ciudad }} - {{ $ciudad->pais}}
                                        
                                        </option>
                                        
                                    @endforeach
                                    
                                </select>
                                <small class="text-red-500"> {{ $errors->first('txtCiudad-'. $hotel->id) }} </small>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estrellas</label>
                                <select id="categoria" name="selectEstrellas-{{ $hotel->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('selectEstrellas')}}">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <small class="text-red-500"> {{ $errors->first('selectEstrellas-'. $hotel->id) }} </small>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Distancia</label>
                                <input type="number" name="floatDistancia-{{ $hotel->id }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('floatDistancia' . $hotel->id ) !== null ? old('floatDistancia' . $hotel->id):$hotel->distancia }}">
                                <small class="text-red-500"> {{ $errors->first('floatDistancia-'. $hotel->id) }} </small>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Habitaciones</label>
                                <input type="number" name="intHabitaciones-{{ $hotel->id }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('intHabitaciones' . $hotel->id ) !== null ? old('intHabitaciones' . $hotel->id):$hotel->num_huespedes }}">
                                <small class="text-red-500"> {{ $errors->first('intHabitaciones-'. $hotel->id) }} </small>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                                <input type="number" name="floatPrecio-{{ $hotel->id }}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('floatPrecio' . $hotel->id ) !== null ? old('floatPrecio' . $hotel->id):$hotel->precio }}">
                                <small class="text-red-500"> {{ $errors->first('floatPrecio-'. $hotel->id) }} </small>
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">Imagen</label>
                                <input class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="small_size" type="file" accept=".jpg, .jpeg,.png" name="imgHotel-{{ $hotel->id }}" value="{{ old('imgHotel-'.$hotel->id) }}">
                                <small class="text-red-500"> {{ $errors->first('imgHotel'.$hotel->id) }}</small>

                            </div>
                            
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                                <textarea id="description" name="txtDescripcion-{{ $hotel->id }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripción">{{ old('txtDescripcion' . $hotel->id ) !== null ? old('txtDescripcion' . $hotel->id):$hotel->descripcion }}
                                </textarea>
                                <small class="text-red-500"> {{ $errors->first('txtDescripcion-'. $hotel->id) }} </small>
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Políticas</label>
                                <textarea id="description" name="txtPoliticas-{{ $hotel->id }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Políticas de cancelación">{{ old('txtPoliticas' . $hotel->id ) !== null ? old('txtPoliticas' . $hotel->id):$hotel->politicas }}</textarea>
                                <small class="text-red-500"> {{ $errors->first('txtPoliticas-'. $hotel->id) }} </small>    
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Servicios</label>

                        <div class="h-min grid sm:grid-cols-4 lg:grid-cols-5 gap-2 justify-around w-full">
                            @foreach ($servicios as $servicio)

                                @php
                                    $status = '';
                                @endphp

                                @foreach ($serviciosHoteles as $sHotel)

                                    @if ($sHotel->servicio == $servicio->nombre && $sHotel->hotel == $hotel->id)
                                        @php
                                            $status = 'checked'
                                        @endphp
                                    @endif
                                    
                                @endforeach

                                <x-checkbox-input 
                                name="checkbox-{{ $servicio->id }}" 
                                id="checkbox-{{ $hotel->id }}-{{ $servicio->id }}" 
                                status="{{ $status }}"
                                >
                                    <i class="fa-solid fa-{{ $servicio->icono }} ms-1 fa-xs"></i>
                                    <span class="sm:text-sm ms-1">
                                        {{ $servicio->nombre }}
                                    </span>
                                </x-checkbox-input>
                            @endforeach
                        </div>

                        


                        
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-purple-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Editar
                    </button>
                </form>
        </div>
    </div>
</div>





