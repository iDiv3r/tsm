<?php

use Illuminate\Support\Facades\Route;


Route::view('/prueba','prueba');

Route::get('/emi',function(){
    return 'Emiliano';
});

Route::view('/inicio','login');

Route::view('/fd','asd');

Route::view('/administrador/destinos','vistas.destinosADM');

Route::view('/vuelos','vistas.vuelosUsu');