<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerDestinoAdm extends Controller
{
   public function procesarModal(Request $peticion)
   {
    
    $validacion= $peticion->validate([
        'txtcodigo'=> 'required',
        'txtfechas'=> 'required',
        'txtfechar'=> 'required',
        'txtduracion'=> 'required',
        'txttelefono'=> 'required',
        'txtpasajeros'=> 'required',
        'txtcategoria'=> 'required',
        'txtaerolinea'=> 'required',
        'txtorigen'=> 'required',
        'txtdestino'=> 'required',
    ]);
    }
}