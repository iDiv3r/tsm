<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinoAdm extends Controller
{
    public function vistaDestinosAdm(){
        return view('adminDestinos');
    }

    public function addDestino(request $newDest){
        $VnewDest=$newDest->validate([
            'pais'=>'required',
            'ciudad'=>'required',
            'aeropuerto'=>'required',
        ]);
        return "Formulario envido";
    }
}
