<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;

Route::view('/prueba','prueba');

Route::get('/emi',function(){
    return 'Emiliano';
});

Route::view('/inicio','login');

Route::view('/fd','asd');

Route::view('/administrador/destinos','vistas.destinosADM');


// Route::view('/v2','vistas.vuelos2');

route::get('/v2',[ViewsController::class,'vuelos']);