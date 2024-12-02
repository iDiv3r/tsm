<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function mostrar(){
        $paises = Country::all();
        $ciudades = City::all();

        // GET HOTELS ------------------------------------------------------------------------------------------------------------
    
        $hoteles = DB::table('hotels')
            ->join('cities','cities.id','=','hotels.city_id')
            ->join('countries','countries.id','=','cities.country_id')
            ->join('hotel_carts','hotel_id','=','hotels.id')
            ->select('hotels.*', 'hotel_carts.num_noches as noches', 'hotel_carts.id as reservation_id' ,'hotel_carts.checkin', 'hotel_carts.checkout', 
            'hotel_carts.num_habitaciones as habitaciones', 'cities.nombre as ciudad','countries.bandera','countries.nombre as pais')
            ->where('hotel_carts.user_id', '=', Auth::user()->id)
            ->get()
        ;
    
        $serviciosHoteles = DB::table('hotel_services')
            ->join('services','services.id','=','hotel_services.service_id')
            ->join('hotels','hotels.id','=','hotel_services.hotel_id')
            ->select('services.nombre as nom_servicio','services.icono','hotels.id as id_hotel')
            ->get()
        ;
    
        $imagenes = DB::table('hotel_photos')
            ->get()
        ;

        // GET FLIGHTS ------------------------------------------------------------------------------------------------------------

        $vuelos = DB::table('flights_dates')
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
    
        return view('vistas.carrito', compact('paises','ciudades','hoteles','serviciosHoteles','imagenes', 'vuelos', 'categoriasVuelos', 'cantidadItemsCarrito'));
    }
    
    public function reservarHotel(Request $request){
        $num_noches = strtotime($request->start) - strtotime($request->end);
        $num_noches = abs(round($num_noches/86400));
        DB::table('hotel_Carts')->insert([
            'checkin'=>$request->input('start'),
            'checkout'=>$request->input('end'),
            'num_noches'=>$num_noches,
            'num_habitaciones'=>$request->input('num_habitaciones'),
            'user_id'=>Auth::user()->id,
            'hotel_id'=>$request->input('hotel_id')
        ]);
        
        session()->flash('successAdd','Reserva del hotel realizada con éxito');
        return redirect()->back();
    }

    public function eliminarReservaHotel(Request $request){
        DB::table('hotel_carts')
            ->where('id', '=', $request->input('reservation_id'))
            ->delete()
        ;

        session()->flash('success','Reserva del hotel eliminada con éxito');
        return redirect()->back();
    }

    public function reservarVuelo(Request $request){
        $categorias = DB::table('categories_flights')
            ->where('flight_date_id', "=", $request->input('flight_id'))
            ->where('categoria', '=', $request->input('select-class-'.$request->input('flight_id')))
            ->get();
        
        if($categorias[0]->disponibles < $request->input('asientos')){
            session()->flash('error','No hay suficientes asientos disponibles');
            return redirect()->back();
        }

        DB::table('tickets')->insert([
            'estado' => 'activo',
            'fecha_adquisicion' => date('Y-m-d'),
            'clase' => $request->input('select-class-'.$request->input('flight_id')),
            'cantidad_asientos' => $request->input('asientos'),
            'user_id' => Auth::user()->id,
            'flight_id' => $request->input('flight_id')
        ]);

        DB::table('categories_flights')
            ->where('id', "=", $request->input('flight_id'))
            ->where('categoria', '=', $request->input('select-class-'.$request->input('flight_id')))
            ->decrement('disponibles', intval($request->input('asientos')));

        session()->flash('successAdd','Reserva del vuelo realizada con éxito');
        return redirect()->back();
    }

    public function eliminarReservaVuelo(Request $request){
        $vuelo = DB::table('flights_dates')
            ->where('flight_id', "=", $request->input('flight_id'))
            ->first();

        $fechaActual = Carbon::now()->toDateString();
        $fechaSalida = Carbon::parse($vuelo->fecha_salida);
        $diferenciaDias = $fechaSalida->diffInDays($fechaActual, false);
        // dd($diferenciaDias);
        
        if ($diferenciaDias < -2){
            DB::table('categories_flights')
            ->where('flight_date_id', "=", $request->input('flight_id'))
            ->where('categoria', '=', $request->input('flight-class'))
            ->increment('disponibles', intval($request->input('asientos')));
            
            DB::table('tickets')
            ->where('id', '=', $request->input('ticket_id'))
            ->delete();
        }
        else{
            session()->flash('error','No es posible cancelar vuelos a menos de 48 horas antes de la salida');
            return redirect()->back();
        }
        

        session()->flash('success','Reserva del vuelo eliminada con éxito');
        return redirect()->back();
    }

    public function realizarCompra(){
        session()->flash('success', 'Compra realizada');
        return redirect()->back();
    }
    
}