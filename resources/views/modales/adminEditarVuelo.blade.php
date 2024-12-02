
<!-- Large Modal -->
<div id="editar-vuelo-{{ $vuelo->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Editar Vuelo {{ $vuelo->codigo }}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editar-vuelo-{{ $vuelo->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <form action="{{ route('rutaEditarVuelo') }}" method="POST" class="px-4 ">
                    @csrf
                    <div class="grid gap-4 mb-4">

                        <input type="number" hidden name="idVuelo" value="{{ $vuelo->id }}">

                        <div class="grid grid-cols-3 gap-4">
                            <!-- Código, Fecha Salida, Fecha Regreso ----------------------------------------------------------->
                            <div>
                                <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 ">Código</label>
                                <input type="text" name="txtcodigo-{{ $vuelo->id }}" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " 
                                value="{{ old('txtcodigo' . $vuelo->id ) !== null ? old('txtcodigo' . $vuelo->id):$vuelo->codigo }}" >
                                <small class="text-red-500"> {{ $errors->first('txtcodigo-'.$vuelo->id) }}</small>
                            </div>
                            <div>
                                <label for="duracion" class="block mb-2 text-sm font-medium text-gray-900 ">Duración</label>
                                <input type="text" name="txtduracion-{{ $vuelo->id }}" id="duracion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " 
                                value="{{ old('txtduracion' . $vuelo->id ) !== null ? old('txtduracion' . $vuelo->id):$vuelo->duracion }}">
                                <small class="text-red-500"> {{ $errors->first('txtduracion-'.$vuelo->id) }} </small>
                            </div>
                            
                            <div>
                                <div class="grid grid-cols-1 justify-between">
                                    <label for="aerolinea" class="block mb-2 text-sm font-medium text-gray-900 ">Aerolínea</label>
                                    <select id="aerolinea" name="txtAerolinea-{{ $vuelo->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 self-end">
                                        <option selected value="">Seleccionar</option>
                                        @foreach($aerolineas as $aerolinea)
                                        <option value="{{ $aerolinea->id }}" 
                                            @if( old('txtAerolinea-'.$vuelo->id) != null)
                                            
                                                {{ old('txtAerolinea-'.$vuelo->id) == $aerolinea->id ? 'selected' : '' }}
                                            
                                            @elseif(old('txtAerolinea-'.$vuelo->id) == null)
                                            
                                                {{ $vuelo->aerolinea == $aerolinea->nombre ? 'selected' : '' }}
                                            
                                            @endif

                                            >{{ $aerolinea->nombre }} - {{ $aerolinea->pais }}</option>
                                            @endforeach
                                        </select>
                                    <small class="text-red-500"> {{ $errors->first('txtAerolinea-'.$vuelo->id) }} </small>
                                </div>
                            </div>
                            
                        </div>
                        <div class="grid grid-cols-4 gap-4">
                            <!-- Categoría, Aerolínea ---------------------------------------------------------------------------------->
                            <div class="col-span-4">
                                <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorías</label>
                                
                                <div class="flex gap-3">

                                    <div>
                                        
                                        @foreach ($categoriasVuelos as $cv)
                                            @if($cv->id_vuelo == $vuelo->id && $cv->categoria == 'Primera Clase')

                                                    <x-checkbox-input name="" id="fc" status="checked disabled" >
                                                        Primera Clase   
                                                    </x-checkbox-input> 
                                                    
                                                @endif
                                            @endforeach
                                        
                                        <div class="flex gap-2">
                                            @foreach ($categoriasVuelos as $cv)
                                                @if($cv->id_vuelo == $vuelo->id && $cv->categoria == 'Primera Clase')
                                            
                                                    <input  placeholder="$" type="number" class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" name="1-clase-pr-{{ $vuelo->id }}"
                                                    value="{{ old('1-clase-pr-' . $vuelo->id ) !== null ? old('1-clase-pr-' . $vuelo->id):$cv->precio }}" name="1-clase-pr-{{ $vuelo->id }}">
                                                    <small class="text-red-500"> {{ $errors->first('1-clase-pr-'.$vuelo->id) }} </small>
                                                    
                                                    {{-- <input disabled placeholder="#" type="number" id="1-clase-num" class="mt-2 block w-2/4 p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" value="{{ $cv->disponibles }}" name="1-clase-num-{{ $vuelo->id }}"> --}}

                                                    <input hidden type="number" value="{{ $cv->disponibles }}" name="1-clase-num-{{ $vuelo->id }}">

                                                    
                                                    <span class="text-sm self-end rounded-lg border px-2 py-1.5 bg-gray-50 border-gray-300 flex">
                                                        <i class="fa-solid fa-person self-center me-1"></i> {{ $cv->disponibles }}
                                                    </span>
                                                @endif
                                            @endforeach
                                            
                                        </div>
                                    </div>

                                    <div>
                                        
                                        @foreach ($categoriasVuelos as $cv)
                                        @if($cv->id_vuelo == $vuelo->id && $cv->categoria == 'Clase Ejecutiva')
                                        
                                                <x-checkbox-input name="" id="bc" status="checked disabled" >
                                                    Clase Ejecutiva
                                                </x-checkbox-input>
                                                @break
                                                
                                            @endif
                                        @endforeach

                                        <div class="flex gap-2">
                                            @foreach ($categoriasVuelos as $cv)
                                            @if($cv->id_vuelo == $vuelo->id && $cv->categoria == 'Clase Ejecutiva')
                                            
                                                    <input placeholder="$" type="number" class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" name="2-clase-pr-{{ $vuelo->id }}"
                                                    value="{{ old('2-clase-pr-' . $vuelo->id ) !== null ? old('2-clase-pr-' . $vuelo->id):$cv->precio }}" name="2-clase-pr-{{ $vuelo->id }}">
                                                    <small class="text-red-500"> {{ $errors->first('2-clase-pr-'.$vuelo->id) }} </small>
                                                    
                                                    <input hidden type="number" value="{{ $cv->disponibles }}" name="2-clase-num-{{ $vuelo->id }}">

                                                    <span class="text-sm self-end rounded-lg border px-2 py-1.5 bg-gray-50 border-gray-300 flex">
                                                        <i class="fa-solid fa-person self-center me-1"></i> {{ $cv->disponibles }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div>
                                        <x-checkbox-input name="" id="tc" status="checked disabled" >
                                            Clase Turista
                                        </x-checkbox-input>

                                        <div class="flex  gap-2">
                                            
                                            
                                            <small class="text-red-500"> {{ $errors->first('3-clase-pr-'.$vuelo->id) }} </small>
                                            @foreach ($categoriasVuelos as $cv)
                                                @if ($cv->id_vuelo == $vuelo->id && $cv->categoria == 'Clase Turista')
                                            
                                                    <input placeholder="$" type="number" name="3-clase-pr-{{ $vuelo->id }}" class="mt-2 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                                    value="{{ old('3-clase-pr-' . $vuelo->id ) !== null ? old('3-clase-pr-' . $vuelo->id):$cv->precio }}" >

                                                    <input type="number" value="{{ $cv->disponibles }}" name="3-clase-num-{{ $vuelo->id }}" hidden >

                                                    <span class="text-sm self-end rounded-lg border px-2 py-1.5 bg-gray-50 border-gray-300 flex">
                                                        <i class="fa-solid fa-person self-center me-1"></i> {{ $cv->disponibles }}
                                                    </span>
                                                @endif
                                            @endforeach
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
                                <select id="countries" name="txtorigen-{{ $vuelo->id }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected value="">Seleccionar</option>
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}"
                                            
                                            @if( old('txtorigen-'.$vuelo->id) != null)
                                            
                                                {{ old('txtorigen-'.$vuelo->id) == $ciudad->id ? 'selected' : '' }}
                                            
                                            @elseif(old('txtorigen-'.$vuelo->id) == null)
                                            
                                                {{ $vuelo->origen == $ciudad->nombre ? 'selected' : '' }}
                                            
                                            @endif

                                        >{{ $ciudad->nombre }} - {{ $ciudad->pais }}</option>
                                    @endforeach
                                </select>
                                <small class="text-red-500"> {{ $errors->first('txtorigen-'.$vuelo->id) }} </small>
                            </div>
                            <div>
                                <label for="destino" class="block mb-2 text-sm font-medium text-gray-900 ">Destino</label>
                                <select id="countries"  name="txtdestino-{{ $vuelo->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected value="">Seleccionar</option>
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}"
                                            {{-- {{ old('txtdestino') == $ciudad->id ? 'selected' : '' }} --}}

                                            @if( old('txtdestino-'.$vuelo->id) != null)
                                            
                                                {{ old('txtdestino-'.$vuelo->id) == $ciudad->id ? 'selected' : '' }}
                                        
                                            @elseif(old('txtdestino-'.$vuelo->id) == null)
                                            
                                                {{ $vuelo->destino == $ciudad->nombre ? 'selected' : '' }}
                                            
                                            @endif

                                            >{{ $ciudad->nombre }} - {{ $ciudad->pais }}</option>
                                    @endforeach
                                </select>
                                <small class="text-red-500"> {{ $errors->first('txtdestino-'.$vuelo->id) }} </small>
                            </div>
                            <div class="place-content-center ">
                                <x-checkbox-input name="escalas-{{ $vuelo->id }}" id="" status="{{ ($vuelo->escalas == 'si')? 'checked':''}}">
                                    Escalas
                                </x-checkbox-input>
                                @foreach ($fechasVuelos as $fechaVuelo)
                                    @if ($fechaVuelo->flight_id == $vuelo->id)
                                        <x-checkbox-input name="check-estado-{{ $vuelo->id }}" id="" status="{{ ($fechaVuelo->estado == 'cancelado')? 'checked':''}}" value='cancelado'>
                                            Cancelar
                                        </x-checkbox-input>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="relative overflow-x-auto sm:rounded-lg col-span-3 ">
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
                                            Disponibles
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Hora de salida
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Eliminar
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fechasVuelos as $fechaVuelo)
                                        @if ($fechaVuelo->flight_id == $vuelo->id)
                                            
                                            <tr class="">
                                                <td class="px-6 py-4">
                                                    {{$fechaVuelo->fecha_salida}}
                                                </td>
                    
                                                <td class="px-6 py-4">
                                                    {{ ($fechaVuelo->fecha_regreso == $fechaVuelo->fecha_salida)?'' : $fechaVuelo->fecha_regreso}}
                                                </td>
                                                
                                                <td class="px-6  py-1 text-xs">
                                                @foreach ($numLugares as $nl)
                                                    @if($nl->flight_date_id == $fechaVuelo->id)
                                                        {{ $nl->categoria }} - {{ $nl->disponibles }}
                                                        <br>
                                                    @endif
                                                @endforeach                
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="max-w-[8rem]">
                                                        <div class="relative">
                                                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                                </svg>
                                                            </div>
                                                            <input type="time" id="time" name="hora-{{$fechaVuelo->id}}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required value="{{ old('hora'.$fechaVuelo->id) !== null? old('hora-'.$fechaVuelo->id) : $fechaVuelo->hora_salida}}" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="w-4 p-4">
                                                    <x-checkbox-input name="check-fecha-{{ $fechaVuelo->id }}" id="" status="">
                                                        {{-- check-fecha-{{ $fechaVuelo->id }} --}}
                                                    </x-checkbox-input>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr class="bg-white" id="date-range-picker-{{ $vuelo->id}}" date-rangepicker datepicker-orientation="top" >
                                        
                                        <td scope="row" class="pe-6 font-medium text-gray-900 whitespace-nowrap ">
                                            <div class="relative">
                                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                </div>
                                                <input id="datepicker-range-start-{{ $vuelo->id}}" name="strt-{{ $vuelo->id }}" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10  " placeholder="Seleccionar" value="{{ old('strt-'.$vuelo->id) }}">
                                                
                                            </div>
                                            <small class="text-red-500"> {{ $errors->first('strt-'.$vuelo->id) }} </small>
                                        </td>
                                        <td class="">
                                            <div class="relative">
                                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input id="datepicker-range-end-{{ $vuelo->id}}" name="end-{{ $vuelo->id }}" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10  " placeholder="Seleccionar" value="{{ old('end-'.$vuelo->id) }}">
                                            
                                        </div>
                                        <small class="text-red-500"> {{ $errors->first('end-'.$vuelo->id) }} </small>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="max-w-[8rem]">
                                            <div class="relative">
                                                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                                <input type="time" id="time" name="hora-new-{{$vuelo->id}}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
                                                <small class="text-red-500"> {{ $errors->first('hora-new-'.$vuelo->id) }} </small>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <button type="submit" class="text-white inline-flex items-center bg-violet-500 hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-5">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h4V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Editar
                </button>
                
                </form>
            
            </div>
        </div>
    </div>
</div>
