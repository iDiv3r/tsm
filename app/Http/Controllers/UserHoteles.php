<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserHoteles extends Controller
{
    public function mostrar(Object $filtros = null){
        if (Auth::user() == null){
            return redirect()->route('welcome');
        }else if (Auth::user()->rol != '0'){
            return redirect()->route('welcome');
        }
        $paises = Country::all();

        $ciudades = DB::table('cities')
            ->join('countries','countries.id','=','cities.country_id')
            ->select('cities.id','cities.nombre as ciudad','countries.nombre as pais' )
            ->get()
        ;

        $hoteles = $filtros;

        if ($hoteles == null){
            $hoteles = DB::table('hotels')
                ->join('cities','cities.id','=','hotels.city_id')
                ->join('countries','countries.id','=','cities.country_id')
                ->select('hotels.*','cities.nombre as ciudad','countries.bandera','countries.nombre as pais')
                ->get()
            ;
        }


        $serviciosHoteles = DB::table('hotel_services')
            ->join('services','services.id','=','hotel_services.service_id')
            ->join('hotels','hotels.id','=','hotel_services.hotel_id')
            ->select('services.nombre as nom_servicio','services.icono','hotels.id as id_hotel')
            ->get()
        ;

        $imagenes = DB::table('hotel_photos')
            ->get()
        ;

        $precios = DB::table('hotels')
            ->select(DB::raw('max(precio) as maxPrecio, min(precio) as minPrecio, min(distancia) as minDistancia, max(distancia) as maxDistancia'))
            ->get();

        $servicios = Service::all();

        $paises = Country::all();

        // dd($ciudades);
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


        return view('vistas.userHoteles',[
            'paises'=>$paises,
            'ciudades'=>$ciudades,
            'hoteles'=>$hoteles,
            'serviciosHoteles'=>$serviciosHoteles,
            'imagenes'=>$imagenes,
            'cantidadItemsCarrito'=>$cantidadItemsCarrito,
            'precios'=>$precios,
            'servicios'=>$servicios
        ]);
    }

    public function filtrarHoteles(Request $request){

        // dump($request->post());

        $wheres = [];

        if($request->input('busqueda') != null ){
            array_push($wheres,[
                'hotels.nombre',
                '=',
                $request->input('busqueda')
            ]);
        }

        array_push($wheres, [
            'hotels.precio',
            ($request->input('selPrecio') == 1)?'<=':'>=',
            $request->input('precio')]);
        

        array_push($wheres, [
            'hotels.distancia',
            ($request->input('selDistancia') == 1)?'<=':'>=',
            $request->input('distancia')
        ]);


        $estrellas = [];

        foreach ($request->post() as $item => $value) {
            if (strpos($item, "estrellas-") !== false) {
                $num = preg_replace('/\D/', '', $item); 
                array_push($estrellas, $num);
            }
        }

        if (empty($estrellas)) {
            $estrellas = [1,2,3,4,5]; 
        }


        # ------------------------------------------------------------------------------------------------------------------------
        $servicios = [];

        $numServicios = DB::table('services')->count();

        foreach($request->post() as $item=>$value){
            if(strpos($item,"checkbox") !== false){

                $idServicio = preg_replace('/\D/', '', $item); 
                
                array_push($servicios,$idServicio);
            }
        }

        if (empty($servicios)) {

            $idsHotelesFiltrados = DB::table('hotel_services')
            ->select('hotel_id')
            ->groupBy('hotel_id')
            ->pluck('hotel_id')
            ->toArray();    

        }else{

            $idsHotelesFiltrados = DB::table('hotel_services')
            ->select('hotel_id',DB::raw('count(*) as cantidad_servicios'))
            ->whereIn('service_id',$servicios)
            ->groupBy('hotel_id')
            ->having('cantidad_servicios','=',count($servicios))
            ->pluck('hotel_id')
            ->toArray();
        }
        

        #-------------------------------------------------------------------------------------------------------------------------

        if ($request->input('pais') != null){
            array_push($wheres, ['cities.country_id','=',$request->input('pais')]);
        }


        if ($request->input('ciudad') != null){
            array_push($wheres, ['hotels.city_id','=',$request->input('ciudad')]);
        }

        if ($request->input('disponible') == 'on'){
            array_push($wheres, ['hotels.num_huespedes','>=',1]);
        }

        if ($request->input('disponiblent') == 'on'){
            array_push($wheres, ['hotels.num_huespedes','=',0]);
        }

    
        $hoteles = DB::table('hotels')
        ->join('cities','cities.id','=','hotels.city_id')
        ->join('countries','countries.id','=','cities.country_id')
        ->select('hotels.*','cities.nombre as ciudad','countries.bandera','countries.nombre as pais')
        ->where($wheres)
        ->whereIn('hotels.id',$idsHotelesFiltrados)
        ->whereIn('estrellas',$estrellas)
        ->get();

        return $this->mostrar($hoteles);
    }
}
