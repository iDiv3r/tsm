<?php

use App\Http\Controllers\ControllerDestinoAdm;
use Illuminate\Support\Facades\Route;


Route::view('/prueba','prueba');

Route::get('/andy',function(){
    return 'Andrea';
});

Route::view('/administrador/vuelos','vistas.vuelosADM');

Route::post('/administrador/vuelos',[ControllerDestinoAdm::class,'procesarModal'])->name('procesarModal');