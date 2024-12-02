<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        $cantidadAsientos = DB::table('categories_flights')
        ->join('flights_dates','flights_dates.id','=','categories_flights.flight_date_id')
        ->join('flights','flights.id','=','flights_dates.flight_id')
        ->select('categories_flights.*','flights.id as id_vuelo')
        ->get();

        $categoriasVuelos = DB::table('categories_flights')
            ->join('flights_dates','flights_dates.id','=','categories_flights.flight_date_id')
            ->join('flights','flights.id','=','flights_dates.flight_id')
            ->select('categories_flights.*','flights.id as id_vuelo')
            ->get();

        $hotelesReservados = DB::table('hotels')
            ->join('cities','cities.id','=','hotels.city_id')
            ->join('countries','countries.id','=','cities.country_id')
            ->join('hotel_carts','hotel_id','=','hotels.id')
            ->select('hotels.*', 'hotel_carts.num_noches as noches', 'hotel_carts.id as reservation_id' ,'hotel_carts.checkin', 'hotel_carts.checkout', 
            'hotel_carts.num_habitaciones as habitaciones', 'cities.nombre as ciudad','countries.bandera','countries.nombre as pais')
            ->where('hotel_carts.user_id', '=', Auth::user()->id)
            ->get()
        ;

        $vuelosReservados = DB::table('flights_dates')
            ->join('flights','flights.id','=','flights_dates.flight_id')
            ->join('cities as origen','origen.id','=','flights.origin_id')
            ->join('cities as destino','destino.id','=','flights.destination_id')
            ->join('countries as pdestino','pdestino.id','=','destino.country_id')
            ->join('countries as porigen','porigen.id','=','origen.country_id')
            ->join('airlines','airlines.id','=','flights.airline_id')
            ->join('tickets','tickets.flight_id','=','flights.id')
            ->select('flights_dates.*','tickets.id as ticket_id', 'tickets.estado', 'tickets.clase', 'tickets.cantidad_asientos','flights.codigo as codigo','origen.nombre as origen','destino.nombre as destino','airlines.nombre as aerolinea','porigen.nombre as paisorigen','pdestino.nombre as paisdestino','porigen.bandera as banderaorigen','pdestino.bandera as banderadestino','porigen.abrev as abvorigen','pdestino.abrev as abvdestino','origen.abrev as abvciudadorigen','destino.abrev as abvciudaddestino')
            ->where('tickets.user_id', '=', Auth::user()->id)
            ->get();
        
        $vuelosReservados = count($vuelosReservados);
        $hotelesReservados = count($hotelesReservados);
        $cantidadItemsCarrito = $vuelosReservados + $hotelesReservados;

        // dd($categoriasVuelos);
        // dd($cantidadAsientos);
        
        return view('vistas.userVuelos',compact('paises', 'vuelos', 'categoriasVuelos', 'cantidadAsientos', 'cantidadItemsCarrito'));
    }
}
