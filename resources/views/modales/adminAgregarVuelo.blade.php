<script>
    function toggleInputState(id) {
            const input1 = document.getElementById(id + "-pr");

            const input2 = document.getElementById(id + "-num")

            input1.disabled = !input1.disabled; // Cambia el estado
            input2.disabled = !input2.disabled; // Cambia el estado


            if(input1.disabled == false){
                input1.setAttribute('type','number');
                input1.setAttribute('required','required');

                input2.setAttribute('type','number');
                input2.setAttribute('required','required');
            }else{
                input1.removeAttribute('required');
                input2.removeAttribute('required');
            }
        }
</script>

<!-- Large Modal -->
<div id="agregarVuelo" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Agregar Vuelo
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="agregarVuelo">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form  action="{{ route('rutaAgregarVuelo') }}" method="POST" >
                    @csrf
                        <div class="grid gap-4 mb-4">
                            <div class="grid grid-cols-3 gap-4">
                                <!-- Código, Fecha Salida, Fecha Regreso ----------------------------------------------------------->
                                <div>
                                    <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 ">Código</label>
                                    <input type="text" name="txtcodigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ old('txtcodigo')}}" >
                                    <small class="text-red-500"> {{ $errors->first('txtcodigo') }}</small>
                                </div>
                                <div>
                                    <label for="duracion" class="block mb-2 text-sm font-medium text-gray-900 ">Duración</label>
                                    <input type="text" name="txtduracion" id="duracion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ old('txtduracion')}}">
                                    <small class="text-red-500"> {{ $errors->first('txtduracion') }} </small>
                                </div>
                                <div>
                                    {{-- <label for="pasajeros" class="block mb-2 text-sm font-medium text-gray-900 ">Pasajeros</label>
                                    <input type="number" name="txtpasajeros" id="pasajeros" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ old('txtpasajeros')}}">
                                    <small class="text-red-500"> {{ $errors->first('txtpasajeros') }} </small> --}}
                                    <div class="grid grid-cols-1 justify-between">
                                        <label for="aerolinea" class="block mb-2 text-sm font-medium text-gray-900 ">Aerolínea</label>
                                        <small class="text-red-500"> {{ $errors->first('txtAerolinea') }} </small>
                                        <select id="aerolinea" name="txtAerolinea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 self-end">
                                            <option selected value="">Seleccionar</option>
                                            @foreach($aerolineas as $aerolinea)
                                            <option value="{{ $aerolinea->id }}" 
                                                {{ old('txtAerolinea') == $aerolinea->id ? 'selected' : '' }}
                                                >{{ $aerolinea->nombre }} - {{ $aerolinea->pais }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="grid grid-cols-4 gap-4">
                                <!-- Categoría, Aerolínea ---------------------------------------------------------------------------------->
                                <div class="col-span-4">
                                    <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorías</label>
                                    
                                    <div class="flex  gap-3">

                                        <div>
                                            <x-checkbox-input name="" id="fc" status="" onclick="toggleInputState('1-clase')">
                                                Primera Clase   
                                            </x-checkbox-input> 
                                            
                                            <div class="flex gap-2">

                                                <input disabled placeholder="$" type="number" id="1-clase-pr" class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" value="{{ old('1-clase-pr') }}" name="1-clase-pr">
                                                <small class="text-red-500"> {{ $errors->first('1-clase-pr') }} </small>
                                                <input disabled placeholder="#" type="number" id="1-clase-num" class="mt-2 block w-2/4 p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" value="{{ old('1-clase-num') }}" name="1-clase-num">
                                                <small class="text-red-500"> {{ $errors->first('1-clase-num') }} </small>
                                            </div>
                                        </div>

                                        <div>
                                            <x-checkbox-input name="" id="bc" status="" onclick="toggleInputState('2-clase')">
                                                Clase Ejecutiva
                                            </x-checkbox-input>

                                            <div class="flex gap-2">
                                                <input disabled placeholder="$" type="number" id="2-clase-pr" class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" value="{{ old('2-clase-pr') }}" name="2-clase-pr">
                                                <small class="text-red-500"> {{ $errors->first('2-clase-pr') }} </small>
                                                <input disabled placeholder="#" type="number" id="2-clase-num" class="mt-2 block w-2/4 p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" value="{{ old('2-clase-num') }}" name="2-clase-num">
                                                <small class="text-red-500"> {{ $errors->first('2-clase-num') }} </small>
                                            </div>
                                        </div>
    
                                        <div>
                                            <x-checkbox-input name="" id="tc" status="checked disabled" >
                                                Clase Turista
                                            </x-checkbox-input>

                                            <div class="flex  gap-2">
                                                
                                                <input placeholder="$" type="number" name="3-clase-pr" class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" value="{{ old('3-clase-pr') }}" required>
                                                <small class="text-red-500"> {{ $errors->first('3-clase-pr') }} </small>
                                                <input placeholder="#" type="number" id="1-clase-num" class="mt-2 block w-2/4 p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" value="{{ old('3-clase-num') }}" name="3-clase-num" required>
                                                <small class="text-red-500"> {{ $errors->first('3-clase-num') }} </small>
                                            </div>
                                        </div>
    
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <!-- Origen, Destino ------------------------------------------------------------------------------------------->
                                <div>
                                    <label for="origen" class="block mb-2 text-sm font-medium text-gray-900 ">Origen
                                        {{-- <span class="fi fi-mx fa-xl mb-1"></span> --}}
                                    </label>
                                    <select id="countries" name="txtorigen"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected value="">Seleccionar</option>
                                        @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}"
                                                {{ old('txtorigen') == $ciudad->id ? 'selected' : '' }}   

                                            >{{ $ciudad->nombre }} - {{ $ciudad->pais }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-red-500"> {{ $errors->first('txtorigen') }} </small>
                                </div>
                                <div>
                                    <label for="destino" class="block mb-2 text-sm font-medium text-gray-900 ">Destino</label>
                                    <select id="countries"  name="txtdestino" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected value="">Seleccionar</option>
                                        @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}"
                                                {{ old('txtdestino') == $ciudad->id ? 'selected' : '' }}
                                                >{{ $ciudad->nombre }} - {{ $ciudad->pais }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-red-500"> {{ $errors->first('txtdestino') }} </small>
                                </div>
                                <div class="place-content-center ">
                                    <x-checkbox-input name="escalas" id="" status="">
                                        Escalas
                                    </x-checkbox-input>
                                </div>
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
                                                    <input id="datepicker-range-start" name="strt" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10  " placeholder="Seleccionar" value="{{ old('strt') }}">
                                                    
                                                </div>
                                                <small class="text-red-500"> {{ $errors->first('strt') }} </small>
                                            </th>
                                            <td class="px-6 py-4">
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                        </svg>
                                                    </div>
                                                    <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10  " placeholder="Seleccionar" value="{{ old('end') }}">
                                                    
                                                </div>
                                                <small class="text-red-500"> {{ $errors->first('end') }} </small>
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

                        <button type="submit" class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-5">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h4V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Agregar
                        </button>
                    </form>
            </div>
        </div>
    </div>
</div>

