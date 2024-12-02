<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DestinoAdm extends Controller
{
    public function vistaDestinosAdm(){
        $aerolineas = DB::table('airlines')->get();
        $paises = DB::table('countries')->get();
        $ciudades = DB::table('cities')->get();

        $destinos = DB::table('destinies')
        ->join('countries', 'countries.id', '=', 'destinies.country_id')
        ->join('cities', 'cities.id', '=', 'destinies.city_id')
        ->join('airlines', 'airlines.id', '=', 'destinies.airline_id')
        ->select('destinies.id', 'airlines.nombre as aerolinea', 'countries.nombre as pais', 'cities.nombre as ciudad')
        ->get();
        // dd($destinos);
        return view('destinosAdmin', compact('destinos', 'aerolineas', 'paises', 'ciudades'));
    }

    public function addDestino(request $newDest){
        $VnewDest=$newDest->validate([
            'pais'=>'required',
            'ciudad'=>'required',
            'aerolinea'=>'required',
        ]);

        DB::table('destinies')->insert([
            'country_id' => $newDest->pais,
            'city_id' => $newDest->ciudad,
            'airline_id' => $newDest->aerolinea,
        ]);
        
        session()->flash('exitoadd');
        
        return to_route('rutaadminDestino');
    }

    public function editDestino(request $newDest){
        $VnewDest=$newDest->validate([
            'pais' => 'required|max:50',
            'ciudad' => 'required|max:50',
            'aerolinea' => 'required|max:50',
        ]);

        DB::table('destinies')->where('id', $newDest->id)->update([
            'country_id' => $newDest->pais,
            'city_id' => $newDest->ciudad,
            'airline_id' => $newDest->aerolinea,
        ]);
        
        session()->flash('exitoedit');
        return to_route('rutaadminDestino');
    }


    public function delDestino(request $newDest){
        $VnewDest=$newDest->validate([
            'id' => 'required',
        ]);

        DB::table('destinies')->where('id', $newDest->id)->delete();

        session()->flash('exitodel');
        return to_route('rutaadminDestino');
    }

}
