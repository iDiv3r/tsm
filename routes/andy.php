<?php

use App\Http\Controllers\AdminVuelos;
use Illuminate\Support\Facades\Route;


Route::view('/prueba','prueba');

Route::get('/andy',function(){
    return 'Andrea';
});

Route::view('/administrador/vuelos','vistas.adminVuelos')->name('rutaAdminVuelos');

Route::post('/administrador/vuelos/agregar',[AdminVuelos::class,'agregar'])->name('rutaAgregarVuelo');
Route::post('/administrador/vuelos/editar',[AdminVuelos::class,'editar'])->name('rutaEditarVuelo');