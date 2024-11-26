<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;

use Illuminate\Support\Facades\DB;


class UserHoteles extends Controller
{
    public function mostrar(){
        $paises = Country::all();
        $ciudades = City::all();


        $hoteles = DB::table('hotels')
            ->join('cities','cities.id','=','hotels.city_id')
            ->join('countries','countries.id','=','cities.country_id')
            ->select('hotels.*','cities.nombre as ciudad','countries.bandera','countries.nombre as pais')
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


        return view('vistas.userHoteles',[
            'paises'=>$paises,
            'ciudades'=>$ciudades,
            'hoteles'=>$hoteles,
            'serviciosHoteles'=>$serviciosHoteles,
            'imagenes'=>$imagenes
        ]);


    }
}
