<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class UserVuelos extends Controller
{
    public function index(){

        $paises = Country::all();

        $vuelos = DB::table('flights_dates')
            ->join('flights','flights.id','=','flights_dates.flight_id')
            ->join('cities as origen','origen.id','=','flights.origin_id')
            ->join('cities as destino','destino.id','=','flights.destination_id')
            ->join('countries as pdestino','pdestino.id','=','destino.country_id')
            ->join('countries as porigen','porigen.id','=','origen.country_id')
            ->join('airlines','airlines.id','=','flights.airline_id')
            ->select('flights_dates.*','flights.codigo as codigo','origen.nombre as origen','destino.nombre as destino','airlines.nombre as aerolinea','porigen.nombre as paisorigen','pdestino.nombre as paisdestino','porigen.bandera as banderaorigen','pdestino.bandera as banderadestino','porigen.abrev as abvorigen','pdestino.abrev as abvdestino','origen.abrev as abvciudadorigen','destino.abrev as abvciudaddestino')
            ->get();

        $categoriasVuelos = DB::table('categories_flights')
            ->join('flights_dates','flights_dates.id','=','categories_flights.flight_date_id')
            ->join('flights','flights.id','=','flights_dates.flight_id')
            ->select('categories_flights.*','flights.id as id_vuelo')
            ->get();

        // dd($categoriasVuelos);
        
        return view('vistas.userVuelos',[
            'paises'=>$paises,
            'vuelos'=>$vuelos,
            'categoriasVuelos'=>$categoriasVuelos,
        ]);
    }
}
