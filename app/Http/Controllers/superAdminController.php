<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function vistaSuperAdmin(){
        $usuarios = DB::table('users')->get();
        return view('vistas.superAdmin', compact('usuarios'));
    }

    public function agregarUsuario(Request $request){
        $request->validate([
            'txtNombre' => 'required|string|max:150',
            'txtCorreo' => 'required',
            'selectRol' => 'required',
            'txtPassword' => 'required|string|max:150',
            'txtConfirm' => 'required|string|max:150'
        ]);

        $password = $request->input('txtPassword');

        DB::table('users')->insert([
            'name' => $request->input('txtNombre'),
            'email' => $request->input('txtCorreo'),
            'rol' => $request->input('selectRol'),
            'password' => bcrypt($password),
        ]);

        $nombre = $request->input('txtNombre');
        session()->flash('successAdd', 'El usuario '.$nombre.' ha sido agregado correctamente');
        return to_route('superAdmin');
    }

    public function editarUsuario(Request $request){
        $request->validate([
            'txtNombre' => 'required|string|max:150',
            'txtCorreo' => 'required',
            'selectRol' => 'required',
        ]);

        DB::table('users')->where('id', $request->input('id'))->update([
            'name' => $request->input('txtNombre'),
            'email' => $request->input('txtCorreo'),
            'rol' => $request->input('selectRol')
        ]);

        $nombre = $request->input('txtNombre');
        session()->flash('successEdit', 'El usuario: '.$nombre.' ha sido editado correctamente');
        return to_route('superAdmin');
    }

    public function eliminarUsuario(Request $request){
        DB::table('users')->where('id', $request->input('id'))->delete();
        $nombre = $request->input('txtNombre');
        session()->flash('successDelete', 'El usuario: '.$nombre.' ha sido eliminado correctamente');
        return to_route('superAdmin');
    }

}
