<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class ViewsController extends Controller
{
    
    public function vuelos (){
        $paises = Country::all();

        return view('vistas.vuelos2',[
            'paises'=>$paises
        ]);
    }

    public function hoteles (){
        $paises = Country::all();

        return view('vistas.hotelesU',[
            'paises'=>$paises
        ]);
    }

    public function carrito (){
        $paises = Country::all();

        return view('vistas.carrito',[
            'paises'=>$paises
        ]);
    }
}

