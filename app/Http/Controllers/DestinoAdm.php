<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinoAdm extends Controller
{
    public function vistaDestinosAdm(){
        return view('destinosAdmin');
    }

    public function addDestino(request $newDest){
        $VnewDest=$newDest->validate([
            'pais'=>'required',
            'ciudad'=>'required',
            'aeropuerto'=>'required',
        ]);
        
       
        session()->flash('exitoadd');
        
        return to_route('rutaadminDestino');
    }

    public function editDestino(request $newDest){
        $VnewDest=$newDest->validate([
            'pais' => 'required|max:50',
            'ciudad' => 'required|max:50',
            'aeropuerto' => 'required|max:50',
        ]);
        
        
        session()->flash('exitoedit');
        
        return to_route('rutaadminDestino');
    }


    public function delDestino(request $newDest){
       
        session()->flash('exitodel');
        
        return to_route('rutaadminDestino');
    }

}
