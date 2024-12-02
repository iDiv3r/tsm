<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Events\FlightModificationEvent;


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
        
        $fechasVuelos = DB::table('flights_dates')
            ->join('flights','flights.id','=','flights_dates.flight_id')
            ->select('flights_dates.*','flights.codigo as codigo')
            ->get();

        // $categoriasVuelos = DB::table('categories_flights as cf')
        //     ->join('flights_dates as fd','fd.id','=','cf.flight_date_id')
        //     ->join('flights as f','f.id','=','fd.flight_id')
        //     ->groupBy('f.id')
        //     ->groupBy('cf.precio')
        //     ->groupBy('cf.categoria')
        //     // ->select('cf.*','f.id as id_vuelo')
        //     ->select('cf.precio','cf.disponibles','cf.categoria','f.id as id_vuelo')
        //     ->get();

        $categoriasVuelos = DB::table('categories_flights as cf')
            ->join('flights_dates as fd', 'fd.id', '=', 'cf.flight_date_id')
            ->join('flights as f', 'f.id', '=', 'fd.flight_id')
            ->groupBy('f.id', 'cf.precio', 'cf.disponibles', 'cf.categoria') // Agregar todas las columnas
            ->select('cf.precio', 'cf.disponibles', 'cf.categoria', 'f.id as id_vuelo')
            ->get();

        $numLugares = DB::table('categories_flights as cf')
            ->select('cf.flight_date_id', 'cf.categoria', 'cf.disponibles')
            ->get();

        // dd($numLugares);


        return view('vistas.adminVuelos',[
            'vuelos'=>$vuelos,
            'aerolineas'=>$aerolineas,
            'ciudades'=>$ciudades,
            'fechasVuelos'=>$fechasVuelos,
            'categoriasVuelos'=>$categoriasVuelos,
            'numLugares'=>$numLugares,
        ]);
    }

    # Agregar Vuelo ========================================================================================================================================

    public function agregar(Request $request)
    {

        // dd($request->all());

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
            'hora'=> 'required',
        ]);


        $idVuelo = DB::table('flights')->insertGetId([
            'codigo'=>$request->input('txtcodigo'),
            'duracion'=>$request->input('txtduracion'),
            'pasajeros'=>($request->input('1-clase-num') + $request->input('2-clase-num') + $request->input('3-clase-num')),
            'escalas'=> ($request->input('escalas') == 'on')?'si':'no',
            'airline_id'=>$request->input('txtAerolinea'),
            'origin_id'=>$request->input('txtorigen'),
            'destination_id'=>$request->input('txtdestino'),
        ]);

        $idFecha = DB::table('flights_dates')->insertGetId([
            'codigo'=>$request->input('txtcodigo').$idVuelo,
            'fecha_salida'=>$request->input('strt'),
            'fecha_regreso'=>$request->input('end'),
            'flight_id'=>$idVuelo,
            'hora_salida'=>$request->input('hora'),
        ]);

        DB::table('categories_flights')->insert([
            'precio'=>$request->input('3-clase-pr'),
            'disponibles'=>$request->input('3-clase-num'),
            'categoria'=>'Clase Turista',
            'flight_date_id'=>$idFecha,
        ]);

        if($request->input('chk1')== 'on'){
            DB::table('categories_flights')->insert([
                'precio'=>$request->input('1-clase-pr'),
                'disponibles'=>$request->input('1-clase-num'),
                'categoria'=>'Primera Clase',
                'flight_date_id'=>$idFecha,
            ]);
        }

        
        if($request->input('chk2' ) == 'on'){
            DB::table('categories_flights')->insert([
                'precio'=>$request->input('2-clase-pr'),
                'disponibles'=>$request->input('2-clase-num'),
                'categoria'=>'Clase Ejecutiva',
                'flight_date_id'=>$idFecha,
            ]);
        }

        session()->flash('exito','Vuelo agregado');
        return to_route('rutaAdminVuelos');
    }
    
    # Editar Vuelo ========================================================================================================================================
    
    public function editar(Request $request)
    {
        // dd($request->all());

        $idVuelo = $request->input('idVuelo');

        $request->validate([
            'txtcodigo-'.$idVuelo=> 'required',
            'txtduracion-'.$idVuelo=> 'required',
            '1-clase-pr-'.$idVuelo=> 'nullable|numeric',
            '2-clase-pr-'.$idVuelo=> 'nullable|numeric',
            '3-clase-pr-'.$idVuelo=> 'required|numeric',
            'txtAerolinea-'.$idVuelo=> 'required',
            'txtorigen-'.$idVuelo=> 'required',
            'txtdestino-'.$idVuelo=> 'required',
        ]);-

        DB::table('flights')
            ->where('id',$idVuelo)
            ->update([
                'codigo'=>$request->input('txtcodigo-'.$idVuelo),
                'duracion'=>$request->input('txtduracion-'.$idVuelo),
                'pasajeros'=>($request->input('1-clase-num-'.$idVuelo) + $request->input('2-clase-num-'.$idVuelo) + $request->input('3-clase-num-'.$idVuelo)),
                'escalas'=> ($request->input('escalas-'.$idVuelo) == 'on')?'si':'no',
                'airline_id'=>$request->input('txtAerolinea-'.$idVuelo),
                'origin_id'=>$request->input('txtorigen-'.$idVuelo),
                'destination_id'=>$request->input('txtdestino-'.$idVuelo),
            ]);

        
        if($request->input('strt-'.$idVuelo)!= null ){
            $validate = $request->validate([
                'hora-new-'.$idVuelo=> 'required',
            ]);

            $idNuevaFecha = DB::table('flights_dates')
                ->insertGetId([
                    'codigo'=>$request->input('txtcodigo-'.$idVuelo),
                    'fecha_salida'=>$request->input('strt-'.$idVuelo),
                    'fecha_regreso'=>$request->input('end-'.$idVuelo),
                    'hora_salida'=>$request->input('hora-new-'.$idVuelo),
                    'flight_id'=>$idVuelo,
                ]);
            
            DB::table('categories_flights')
                ->insert([
                    'precio'=>$request->input('3-clase-pr-'.$idVuelo),
                    'disponibles'=>$request->input('3-clase-num-'.$idVuelo),
                    'categoria'=>'Clase Turista',
                    'flight_date_id'=>$idNuevaFecha,
                ]);
            
            if($request->input('1-clase-num-'.$idVuelo)){
                $validate = $request->validate([
                    '1-clase-pr-'.$idVuelo=> 'required|numeric',
                ]);

                DB::table('categories_flights')
                    ->insert([
                        'precio'=>$request->input('1-clase-pr-'.$idVuelo),
                        'disponibles'=>$request->input('1-clase-num-'.$idVuelo),
                        'categoria'=>'Primera Clase',
                        'flight_date_id'=>$idNuevaFecha,
                ]);

            }

            if($request->input('2-clase-num-'.$idVuelo)){
                $validate = $request->validate([
                    '2-clase-pr-'.$idVuelo=> 'required|numeric',
                ]);
                DB::table('categories_flights')
                    ->insert([
                        'precio'=>$request->input('2-clase-pr-'.$idVuelo),
                        'disponibles'=>$request->input('2-clase-num-'.$idVuelo),
                        'categoria'=>'Clase Ejecutiva',
                        'flight_date_id'=>$idNuevaFecha,
                ]);
            }
        } 
        
        $idsVueloFecha = DB::table('flights_dates')
            ->where('flight_id',$idVuelo)
            ->select('id')
            ->get();

        foreach($idsVueloFecha as $idVueloFecha){

            $idFechaVuelo = preg_replace('/\D/', '', $request->input('hora'.$idVueloFecha->id)); 

            $validate = $request->validate([
                'hora-'.$idVueloFecha->id=> 'required',
            ]);

            DB::table('flights_dates')
                ->where('id',$idVueloFecha->id)
                ->update([
                    'hora_salida'=>$request->input('hora-'.$idVueloFecha->id),
                    'estado'=>($request->input('check-estado-'.$idVueloFecha->id) == 'on')
                    ?'cancelado'
                    :'activo',
                ]);
                event(new FlightModificationEvent($idVueloFecha->id));

            DB::table('categories_flights')
                ->where('flight_date_id',$idVueloFecha->id)
                ->where('categoria','Clase Turista')
                ->update([
                    'precio'=>$request->input('3-clase-pr-'.$idVuelo),
                    // 'disponibles'=>$request->input('3-clase-num'),
                ]);
            
            if($request->input('1-clase-num-'.$idVuelo)){
                $validate = $request->validate([
                    '1-clase-pr-'.$idVuelo=> 'required|numeric',
                ]);

                DB::table('categories_flights')
                    ->where('flight_date_id',$idVueloFecha->id)
                    ->where('categoria','Primera Clase')
                    ->update([
                        'precio'=>$request->input('1-clase-pr-'.$idVuelo),
                        // 'disponibles'=>$request->input('1-clase-num'),
                ]);

            }

            if($request->input('2-clase-num-'.$idVuelo)){
                $validate = $request->validate([
                    '2-clase-pr-'.$idVuelo=> 'required|numeric',
                ]);
                DB::table('categories_flights')
                    ->where('flight_date_id',$idVueloFecha->id)
                    ->where('categoria','Clase Ejecutiva')
                    ->update([
                        'precio'=>$request->input('2-clase-pr-'.$idVuelo),
                        // 'disponibles'=>$request->input('2-clase-num'),
                ]);
            }
        }



        foreach($request->post() as $item=>$value){

            if(strpos($item,"check-fecha-") !== false){

                if($value == 'on'){
                    $idFechaVuelo = preg_replace('/\D/', '', $item); 
                    DB::table('flights_dates')
                    ->where('id',$idFechaVuelo)
                    ->delete()
                    ;
                }                
            }
        }

        session()->flash('exito','Vuelo editado');
        return to_route('rutaAdminVuelos');
    }

    # Eliminar Vuelo ========================================================================================================================================

    public function eliminar(Request $request)
    {
        $idVuelo = $request->input('idVuelo');

        DB::table('flights')
            ->where('id',$idVuelo)
            ->delete();

        session()->flash('exito','Vuelo eliminado');
        return to_route('rutaAdminVuelos');
    }
}