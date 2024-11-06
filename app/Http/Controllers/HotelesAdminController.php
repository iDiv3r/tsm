<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class HotelesAdminController extends Controller
{
    public function vistaHoteles(){
        return view('vistas.hotelesA');
    }

    public function agregarHotel(Request $request){
        $request->validate([
            'txtNombre' => 'required|string|max:150',
            'txtDireccion' => 'required|string|max:150',
            'txtCiudad' => 'required',
            'selectEstrellas' => 'required',
            'floatDistancia' => 'required|numeric|min:0',
            'intHabitaciones' => 'required|numeric|min:0',
            'intAdultos' => 'required|numeric|min:0',
            'intNinos' => 'required|numeric|min:0',
            'floatPrecio' => 'required|numeric|min:0',
            'txtDescripcion' => 'required|string|max:500',
            'txtPoliticas' => 'required|string|max:500',
        ]);

        $nombre = $request->input('txtNombre');
        session()->flash('successAdd', 'El Hotel '.$nombre.' ha sido agregado correctamente');
        return to_route('hotelesAdministrador');
    }

    public function editarHotel(Request $request){
        $request->validate([
            'txtNombre' => 'required|string|max:150',
            'txtDireccion' => 'required|string|max:150',
            'txtCiudad' => 'required',
            'selectEstrellas' => 'required',
            'floatDistancia' => 'required|numeric|min:0',
            'intHabitaciones' => 'required|numeric|min:0',
            'intAdultos' => 'required|numeric|min:0',
            'intNinos' => 'required|numeric|min:0',
            'floatPrecio' => 'required|numeric|min:0',
            'txtDescripcion' => 'required|string|max:500',
            'txtPoliticas' => 'required|string|max:500',
        ]);

        $nombre = $request->input('txtNombre');
        session()->flash('successEdit', 'El Hotel '.$nombre.' ha sido editado correctamente');
        return to_route('hotelesAdministrador');
    }

    public function eliminarHotel(Request $request){
        $nombre = $request->input('txtNombre');
        session()->flash('successDelete', 'El Hotel '.$nombre.' ha sido eliminado correctamente');
        return to_route('hotelesAdministrador');
    }
}
