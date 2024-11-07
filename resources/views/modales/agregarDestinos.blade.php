<!-- Main modal -->
<div id="agregarDestinos" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 border border-t-orange-500 border-t-4">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Agregar nuevo vuelo
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="agregarDestinos">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form  action="{{ route('agregar') }}" method="POST" class="p-4 md:p-5">
            @csrf
                <div class="grid gap-4 mb-4">
                    <div class="grid grid-cols-3 gap-4">
                        <!-- Código, Fecha Salida, Fecha Regreso ----------------------------------------------------------->
                        <div>
                            <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                            <input type="text" name="txtcodigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtcodigo')}}" >
                            <small class="text-red-500"> {{ $errors->first('txtcodigo') }}</small>
                        </div>
                        <div>
                            <label for="fechaSalida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha salida</label>
                            <input type="date" name="txtfechas" id="fechaSalida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtfechas')}}">
                            <small class="text-red-500"> {{ $errors->first('txtfechas') }} </small>
                        </div>
                        <div>
                            <label for="fechaRegreso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha regreso</label>
                            <input type="date" name="txtfechar" id="fechaRegreso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtfechar')}}">
                            <small class="text-red-500"> {{ $errors->first('txtfechar') }} </small>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <!-- Duración, Teléfono, Pasajeros ---------------------------------------------------->
                        <div>
                            <label for="duracion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duración</label>
                            <input type="number" name="txtduracion" id="duracion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtduracion')}}">
                            <small class="text-red-500"> {{ $errors->first('txtduracion') }} </small>
                        </div>
                        <div>
                            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                            <input type="number" name="txttelefono" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txttelefono')}}">
                            <small class="text-red-500"> {{ $errors->first('txttelefono') }} </small>
                        </div>
                        <div>
                            <label for="pasajeros" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pasajeros</label>
                            <input type="number" name="txtpasajeros" id="pasajeros" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtpasajeros')}}">
                            <small class="text-red-500"> {{ $errors->first('txtpasajeros') }} </small>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Categoría, Aerolínea ---------------------------------------------------------------------------------->
                        <div>
                            <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                            <select id="categoria" name="txtcategoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtcategoria')}}">
                            <small> {{ $errors->first('txtcategoria') }} </small>
                                <option selected="">Seleccionar categoría</option>
                                <option value="AA">AAAAA</option>
                                <option value="BB">BBBBB</option>
                            </select>
                        </div>
                        <div>
                            <label for="aerolinea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aerolínea</label>
                            <select id="aerolinea" name="txtaerolinea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtaerolinea')}}">
                            <small class="text-red-500"> {{ $errors->first('txtaerolinea') }} </small>
                                <option selected="">Seleccionar aerolínea</option>
                                <option value="AM">Aerolínea</option>
                                <option value="VA">Viva Aerobus</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <!-- Origen, Destino ------------------------------------------------------------------------------------------->
                        <div>
                            <label for="origen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origen</label>
                            <input type="text" name="txtorigen" id="origen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtorigen')}}" >
                            <small class="text-red-500"> {{ $errors->first('txtorigen') }} </small>
                        </div>
                        <div>
                            <label for="destino" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destino</label>
                            <input type="text" name="txtdestino" id="destino" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('txtdestino')}}" >
                            <small class="text-red-500"> {{ $errors->first('txtdestino') }} </small>
                        </div>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h4V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Agregar
                </button>
            </form>
        </div>
    </div>
</div>