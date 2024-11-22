<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminVuelos extends Controller
{
    public function agregar(Request $peticion)
    {
        
        $peticion->validate([
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
        session()->flash('exito','Vuelo agregado');
        return to_route('rutaAdminVuelos');
        }

        public function editar(Request $peticion)
    {
        
        $peticion->validate([
            'codigo'=> 'required',
            'fechas'=> 'required',
            'fechar'=> 'required',
            'duracion'=> 'required',
            'telefono'=> 'required',
            'pasajeros'=> 'required',
            'categoria'=> 'required',
            'aerolinea'=> 'required',
            'origen'=> 'required',
            'destino'=> 'required',
        ]);
        session()->flash('exito','Vuelo editado');
        return to_route('rutaAdminVuelos');
        }
}