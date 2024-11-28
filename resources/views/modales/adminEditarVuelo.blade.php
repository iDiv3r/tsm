
<!-- Large Modal -->
<div id="editar-vuelo-{{ $vuelo->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Large modal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editar-vuelo-{{ $vuelo->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form action="{{ route('rutaEditarVuelo') }}" method="POST" class="p-4 md:p-5">
                    @csrf
                        
                        <div class="grid gap-4 mb-4">
                            <div class="grid grid-cols-3 gap-4">
                                <!-- Código, Fecha Salida, Fecha Regreso ----------------------------------------------------------->
                                <div>
                                    <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                                    <input type="text" name="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('codigo')}}" >
                                    <small class="text-red-500"> {{ $errors->first('codigo') }}</small>
                                </div>
                                <div>
                                    <label for="fechaSalida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha salida</label>
                                    <input type="date" name="fechas" id="fechaSalida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('fechas')}}">
                                    <small class="text-red-500"> {{ $errors->first('fechas') }} </small>
                                </div>
                                <div>
                                    <label for="fechaRegreso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha regreso</label>
                                    <input type="date" name="fechar" id="fechaRegreso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('fechar')}}">
                                    <small class="text-red-500"> {{ $errors->first('fechar') }} </small>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <!-- Duración, Teléfono, Pasajeros ---------------------------------------------------->
                                <div>
                                    <label for="duracion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duración</label>
                                    <input type="number" name="duracion" id="duracion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('duracion')}}">
                                    <small class="text-red-500"> {{ $errors->first('duracion') }} </small>
                                </div>
                                <div>
                                    <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                                    <input type="number" name="telefono" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('telefono')}}">
                                    <small class="text-red-500"> {{ $errors->first('telefono') }} </small>
                                </div>
                                <div>
                                    <label for="pasajeros" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pasajeros</label>
                                    <input type="number" name="pasajeros" id="pasajeros" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('pasajeros')}}">
                                    <small class="text-red-500"> {{ $errors->first('pasajeros') }} </small>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Categoría, Aerolínea ---------------------------------------------------------------------------------->
                                <div>
                                    <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                                    <select id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('categoria')}}">
                                        <option selected="">Seleccionar categoría</option>
                                        <option value="AA">AAAAA</option>
                                        <option value="BB">BBBBB</option>
                                    </select>
                                    <small class="text-red-500"> {{ $errors->first('categoria') }} </small>
                                </div>
                                <div>
                                    <label for="aerolinea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aerolínea</label>
                                    <select id="aerolinea" name="aerolinea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('aerolinea')}}">
                                        <option selected="">Seleccionar aerolínea</option>
                                        <option value="AM">Aerolínea</option>
                                        <option value="VA">Viva Aerobus</option>
                                    </select>
                                    <small class="text-red-500"> {{ $errors->first('aerolinea') }} </small>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <!-- Origen, Destino ------------------------------------------------------------------------------------------->
                                <div>
                                    <label for="origen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origen</label>
                                    <input type="text" name="origen" id="origen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('origen')}}" >
                                    <small class="text-red-500"> {{ $errors->first('origen') }} </small>
                                </div>
                                <div>
                                    <label for="destino" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destino</label>
                                    <input type="text" name="destino" id="destino" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('destino')}}">
                                    <small class="text-red-500"> {{ $errors->first('destino') }} </small>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="relative overflow-x-auto sm:rounded-lg col-span-2 ">
                                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                        <thead class="text-xs text-gray-700 uppercase bg-white border-b-2 ">
                                            <tr>
                                                <th scope="col" class="p-4">
                                                    Fecha de salida
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Fecha de llegada
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white" id="date-range-picker" date-rangepicker datepicker-orientation="top" datepicker-format="dd/mm/yyyy">
                                                
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                            </svg>
                                                        </div>
                                                        <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Seleccionar">
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4">
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                            </svg>
                                                        </div>
                                                        <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Seleccionar">
                                                    </div>
                                                </td>
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 ">
                                                        <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#" class="font-medium text-blue-600  hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
</div>
