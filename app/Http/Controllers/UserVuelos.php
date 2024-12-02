<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\Airline;
use Illuminate\Support\Facades\DB;

class UserVuelos extends Controller
{
    public function index()
    {

        $paises = Country::all();

        $vuelos = DB::table('flights_dates')
            ->join('flights', 'flights.id', '=', 'flights_dates.flight_id')
            ->join('cities as origen', 'origen.id', '=', 'flights.origin_id')
            ->join('cities as destino', 'destino.id', '=', 'flights.destination_id')
            ->join('countries as pdestino', 'pdestino.id', '=', 'destino.country_id')
            ->join('countries as porigen', 'porigen.id', '=', 'origen.country_id')
            ->join('airlines', 'airlines.id', '=', 'flights.airline_id')
            ->select('flights_dates.*', 'flights.codigo as codigo', 'origen.nombre as origen', 'destino.nombre as destino', 'airlines.nombre as aerolinea', 'porigen.nombre as paisorigen', 'pdestino.nombre as paisdestino', 'porigen.bandera as banderaorigen', 'pdestino.bandera as banderadestino', 'porigen.abrev as abvorigen', 'pdestino.abrev as abvdestino', 'origen.abrev as abvciudadorigen', 'destino.abrev as abvciudaddestino')
            ->get();

        $categoriasVuelos = DB::table('categories_flights')
            ->join('flights_dates', 'flights_dates.id', '=', 'categories_flights.flight_date_id')
            ->join('flights', 'flights.id', '=', 'flights_dates.flight_id')
            ->select('categories_flights.*', 'flights.id as id_vuelo')
            ->get();

        // dd($categoriasVuelos);

        $ciudades = City::get();

        //Obtener paises
        $getpaises = Country::get();
        //obtener ciudades
        $getciudades = City::get();
        //Obtener aerolineas
        $getaerolineas = Airline::get();

        return view('vistas.userVuelos', [
            'paises' => $paises,
            'vuelos' => $vuelos,
            'categoriasVuelos' => $categoriasVuelos,
            'ciudades' => $ciudades,
            'getpaises' => $getpaises,
            'getciudades' => $getciudades,
            'getaerolineas' => $getaerolineas
        ]);
    }

    // Obtener ciudades por País
    public function getCiudad($pais_id)
    {
        $ciudades = City::where('country_id', $pais_id)->get();

        //Se manda en Json para uso de ajax en blade
        return response()->json($ciudades);

        //Obtener paises
        $getpaises = Country::get();
        //obtener ciudades
        $getciudades = City::get();
        //Obtener aerolineas
        $getaerolineas = Airline::get();

        return view('vistas.UserVuelos', [
            'vuelos' => $vuelos,
            'aerolineas' => $aerolineas,
            'ciudades' => $ciudades,
            'fechasVuelos' => $fechasVuelos,
            'categoriasVuelos' => $categoriasVuelos,
            'numLugares' => $numLugares,
            'getpaises' => $getpaises,
            'getciudades' => $getciudades,
            'getaerolineas' => $getaerolineas
        ]);
    }

    //filtrar los vuelos en usuarios
    public function filtroVuelos(Request $request)
    {
        if (isset($request->directo)) {
            $escalas = 'no';
        } elseif (isset($request->escalado)) {
            $escalas = 'si';
        } else {
            $escalas = 'no';
        }
        $paises = Country::all();
        $aerolinea = $request->input('aerolinea', []);
        $destino = $request->ciudaddestino;
        $origen = $request->ciudadorigen;

        $vuelosselect = DB::table('flights_dates')
        ->join('flights', 'flights.id', '=', 'flights_dates.flight_id')
        ->join('cities as origen', 'origen.id', '=', 'flights.origin_id')
        ->join('cities as destino', 'destino.id', '=', 'flights.destination_id')
        ->join('countries as pdestino', 'pdestino.id', '=', 'destino.country_id')
        ->join('countries as porigen', 'porigen.id', '=', 'origen.country_id')
        ->join('airlines', 'airlines.id', '=', 'flights.airline_id')
        ->select('flights_dates.*', 'flights.codigo as codigo', 'origen.nombre as origen', 'destino.nombre as destino', 'airlines.nombre as aerolinea', 'porigen.nombre as paisorigen', 'pdestino.nombre as paisdestino', 'porigen.bandera as banderaorigen', 'pdestino.bandera as banderadestino', 'porigen.abrev as abvorigen', 'pdestino.abrev as abvdestino', 'origen.abrev as abvciudadorigen', 'destino.abrev as abvciudaddestino')
            ->when(!empty($escalas), function ($query) use ($escalas) {
                return $query->where('flights.escalas', $escalas);
            })
            ->when(!empty($aerolinea), function ($query) use ($aerolinea) {
                return $query->whereIn('flights.airline_id', $aerolinea);
            })
            ->when(!empty($destino), function ($query) use ($destino) {
                return $query->where('flights.destination_id', $destino);
            })
            ->when(!empty($origen), function ($query) use ($origen) {
                return $query->where('flights.origin_id', $origen);
            });


        $conteovuelos = $vuelosselect->count();
        $vuelos = $vuelosselect->get();

        $categoriasVuelos = DB::table('categories_flights')
            ->join('flights_dates', 'flights_dates.id', '=', 'categories_flights.flight_date_id')
            ->join('flights', 'flights.id', '=', 'flights_dates.flight_id')
            ->select('categories_flights.*', 'flights.id as id_vuelo')
            ->get();

        // dd($categoriasVuelos);

        $ciudades = City::get();

        //Obtener paises
        $getpaises = Country::get();
        //obtener ciudades
        $getciudades = City::get();
        //Obtener aerolineas
        $getaerolineas = Airline::get();

        return view('vistas.userVuelos', [
            'paises' => $paises,
            'vuelos' => $vuelos,
            'categoriasVuelos' => $categoriasVuelos,
            'ciudades' => $ciudades,
            'getpaises' => $getpaises,
            'getciudades' => $getciudades,
            'getaerolineas' => $getaerolineas,
            'conteovuelos' => $conteovuelos
        ]);
    }
}
