<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\City;


class AdminVuelos extends Controller
{   

    # Mostrar Vuelo ========================================================================================================================================

    public function vistaVuelos()
    {   
        $vuelos = DB::table('flights')
            ->join('cities as origen','origen.id','=','flights.origin_id')
            ->join('cities as destino','destino.id','=','flights.destination_id')
            ->join('countries as pdestino','pdestino.id','=','destino.country_id')
            ->join('countries as porigen','porigen.id','=','origen.country_id')
            ->join('airlines','airlines.id','=','flights.airline_id')
            ->select('flights.*','origen.nombre as origen','destino.nombre as destino','airlines.nombre as aerolinea','porigen.nombre as paisorigen','pdestino.nombre as paisdestino','porigen.bandera as banderaorigen','pdestino.bandera as banderadestino')
            ->get();
        
        $aerolineas = DB::table('airlines')
            ->join('countries','countries.id','=','airlines.country_id')
            ->select('airlines.*','countries.nombre as pais')
            ->get();

        $ciudades = DB::table('cities')
            ->join('countries','countries.id','=','cities.country_id')
            ->select('cities.*','countries.nombre as pais')
            ->get();
        
        return view('vistas.adminVuelos',[
            'vuelos'=>$vuelos,
            'aerolineas'=>$aerolineas,
            'ciudades'=>$ciudades
        ]);
    }

    # Agregar Vuelo ========================================================================================================================================

    public function agregar(Request $request)
    {

        $request->validate([
            'txtcodigo'=> 'required',
            'txtduracion'=> 'required',
            '1-clase-num'=>'nullable|integer',
            '2-clase-num'=>'nullable|integer',
            '3-clase-num'=>'required|integer',
            '1-clase-pr'=> 'nullable|numeric',
            '2-clase-pr'=> 'nullable|numeric',
            '3-clase-pr'=> 'required|numeric',
            'txtAerolinea'=> 'required',
            'strt'=> 'required',
            'end'=> 'nullable',
            'txtorigen'=> 'required',
            'txtdestino'=> 'required',
        ]);

        // $escalas = $request->input('escalas') ='on'?'si':'no';

        $idVuelo = DB::table('flights')->insertGetId([
            'codigo'=>$request->input('txtcodigo'),
            'duracion'=>$request->input('txtduracion'),
            'pasajeros'=>($request->input('1-clase-num') + $request->input('2-clase-num') + $request->input('3-clase-num')),
            'escalas'=> ($request->input('escalas') == 'on')?'si':'no',
            'airline_id'=>$request->input('txtAerolinea'),
            'origin_id'=>$request->input('txtorigen'),
            'destination_id'=>$request->input('txtdestino'),
            // 'start'=>$request->input('strt'),
            // 'end'=>$request->input('end'),
        ]);


        session()->flash('exito','Vuelo agregado');
        return to_route('rutaAdminVuelos');
    }
    
    # Editar Vuelo ========================================================================================================================================
    
    public function editar(Request $request)
    {
        
        $request->validate([
            'codigo'=> 'required',
            'fechas'=> 'required',
            'fechar'=> 'required',
            'duracion'=> 'required',
            'telefono'=> 'required',
            'pasajeros'=> 'required',
            'categoria'=> 'required',
            'aerolinea'=> 'required',
            'origen'=> 'required',
            'destino'=> 'required',
        ]);
        session()->flash('exito','Vuelo editado');
        return to_route('rutaAdminVuelos');
    }
}