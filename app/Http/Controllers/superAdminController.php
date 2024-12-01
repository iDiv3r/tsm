<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function vistaSuperAdmin(){
        return view('vistas.superAdmin');
    }

    public function agregarUsuario(Request $request){
        $request->validate([
            'txtNombre' => 'required|string|max:150',
            'txtApellidos' => 'required|string|max:150',
            'txtCorreo' => 'required',
            'intTelefono' => 'required|numeric|min:0',
            'selectRol' => 'required',
            'txtPassword' => 'required|string|max:150',
            'txtConfirm' => 'required|string|max:150'
        ]);

        DB::table('users')->insert([
            'name' => $request->input('txtNombre'),
            'apellidos' => $request->input('txtApellidos'),
            'email' => $request->input('txtCorreo'),
            'telefono' => $request->input('intTelefono'),
            'rol' => $request->input('selectRol'),
            'password' => $request->input('txtPassword')
        ]);

        $nombre = $request->input('txtNombre');
        session()->flash('successAdd', 'El usuario '.$nombre.' ha sido agregado correctamente');
        return to_route('superAdmin');
    }

    public function editarUsuario(Request $request){
        $request->validate([
            'txtNombre' => 'required|string|max:150',
            'txtApellidos' => 'required|string|max:150',
            'txtCorreo' => 'required',
            'intTelefono' => 'required|numeric|min:0',
            'selectRol' => 'required',
            'txtPassword' => 'required|string|max:150',
            'txtConfirm' => 'required|string|max:150'
        ]);

        $nombre = $request->input('txtNombre');
        session()->flash('successEdit', 'El usuario: '.$nombre.' ha sido editado correctamente');
        return to_route('superAdmin');
    }

    public function eliminarUsuario(Request $request){
        $nombre = $request->input('txtNombre');
        session()->flash('successDelete', 'El usuario: '.$nombre.' ha sido eliminado correctamente');
        return to_route('superAdmin');
    }

}
