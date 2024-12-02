<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\reportA;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class ReporteAdm extends Controller
{
    public function vistaReporteAdm(){
                
        return view('reportesAdmin');
    }


    // consulta de Destinos
    public function exportDestinos(): JsonResponse
    {
        $consulta = DB::table('hotels')
        ->join('cities', 'hotels.city_id', '=', 'cities.id')
        ->join('countries', 'cities.country_id', '=', 'countries.id')
        ->select('hotels.nombre as Nombre', DB::raw("CONCAT(countries.nombre, ' - ', cities.nombre) as Ubicacion"), 'hotels.direccion as Direccion', 'hotels.num_huespedes as Num_Huespedes','hotels.precio as PrecioXhabitacion','hotels.calificacion as Calificacion')
        ->get();

        // Devuelve los datos en formato JSON
        return response()->json($consulta);
    }


    // consulta de Aerolineas
    public function  exportAerolineas(): JsonResponse
    {
        $consulta = DB::table('flights')
        ->join('airlines', 'flights.airline_id', '=', 'airlines.id')
        ->join('cities as destination', 'flights.destination_id', '=', 'destination.id')
        ->join('countries as destination_country', 'destination.country_id', '=', 'destination_country.id')
        ->join('cities as origin', 'flights.origin_id', '=', 'origin.id')
        ->join('countries as origin_country', 'origin.country_id', '=', 'origin_country.id')
        ->select( 
            'flights.codigo as CodigoVuelo','airlines.nombre as Aerolinea',
            DB::raw("CONCAT(origin_country.nombre, ' - ', origin.nombre) as Origen"),
            DB::raw("CONCAT(destination_country.nombre, ' - ', destination.nombre) as Destino"),
            'flights.duracion as Duracion',
            'flights.pasajeros as Pasajeros',
        )
        ->get();

        // Devuelve los datos en formato JSON
        return response()->json($consulta);
    }


    // consulta de Clientes Vuelos
    public function  exportClientesV(): JsonResponse
    {
        $consulta = DB::table('tickets')
        ->join('users', 'tickets.user_id', '=', 'users.id')
        ->join('categories_flights', 'tickets.flight_id', '=', 'categories_flights.id')
        ->join('flights_dates', 'categories_flights.flight_date_id', '=', 'flights_dates.id')
        ->join('flights', 'flights_dates.flight_id', '=', 'flights.id')
        ->join('airlines', 'flights.airline_id', '=', 'airlines.id')
        ->join('cities', 'flights.destination_id', '=', 'cities.id')
        ->join('countries', 'cities.country_id', '=', 'countries.id')
        ->select('users.name as Cliente', DB::raw("CONCAT(countries.nombre, ' - ', cities.nombre) as Destino"), 'airlines.nombre as Aerolinea',  'categories_flights.categoria as Categoria', 'categories_flights.precio as Precio', 'flights.codigo as Codigo_Vuelo')
        ->get();

        // Devuelve los datos en formato JSON
        return response()->json($consulta);
    }

    // consulta de Clientes Hoteles
    public function  exportClientesH(): JsonResponse
    {
        $consulta = DB::table('hotel_carts')
        ->join('users', 'hotel_carts.user_id', '=', 'users.id')
        ->join('hotels', 'hotel_carts.hotel_id', '=', 'hotels.id')
        ->join('cities', 'hotels.city_id', '=', 'cities.id')
        ->join('countries', 'cities.country_id', '=', 'countries.id')
        ->select('users.name as Cliente', 'hotels.nombre as Hotel', 'hotel_carts.num_noches as Noches', 'hotels.precio as Precio', DB::raw("CONCAT(countries.nombre, ' - ', cities.nombre) as Ubicacion"), 'hotels.direccion as Direccion')
        ->get();

        // Devuelve los datos en formato JSON
        return response()->json($consulta);
    }


    
    public function addDestinoRepo(request $newDest){

        $VnewDest=$newDest->validate([
            'destino'=>'required',
        ]);

      ;
        session()->flash('exitodesadd');
        
       

        
        return to_route('rutaadminReporte');
    }

    public function addAeroRepo(request $newDest){
        $VnewDest=$newDest->validate([
            'aerolinea'=>'required',
        ]);
        
        session()->flash('exitoaeroadd');
        
        return to_route('rutaadminReporte');
    }

    public function addClienRepo(request $newDest){
        $VnewDest=$newDest->validate([
            'cliente'=>'required',
        ]);
        
        session()->flash('exitoClienadd');
        
        return to_route('rutaadminReporte');
    }




    public function delDestinoRepo(request $newDest){
        session()->flash('exitoDestdel');
        return to_route('rutaadminReporte');
    }


    public function delAeroRepo(request $newDest){
        session()->flash('exitoAerodel');
        return to_route('rutaadminReporte');
    }

    public function delClienRepo(request $newDest){
        session()->flash('exitocliedel');
        return to_route('rutaadminReporte');
    }

}
