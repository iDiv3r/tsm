<?php

use App\Http\Controllers\AdminVuelos;
use App\Http\Controllers\UserVuelos;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::view('/prueba','prueba');

Route::get('/andy',function(){
    return 'Andrea';
});

Route::get('/administrador/vuelos',[AdminVuelos::class,'vistaVuelos'])->name('rutaAdminVuelos');

Route::post('/administrador/vuelos/agregar',[AdminVuelos::class,'agregar'])->name('rutaAgregarVuelo');
Route::post('/administrador/vuelos/editar',[AdminVuelos::class,'editar'])->name('rutaEditarVuelo');

Route::post('/administrador/vuelos/eliminar',[AdminVuelos::class,'eliminar'])->name('rutaEliminarVuelo');

// Obtener Ciudades por país
Route::get('/administrador/vuelos/ciudades/{pais_id}', [AdminVuelos::class, 'getCiudades'])->name('rutaGetCiudades');

//Filtrar vuelos
Route::post('/administrador/vuelos/filtrar',[AdminVuelos::class,'filtroVuelos'])->name('rutaFiltrarVuelo');



// Obtener Ciudades por país usuarios
Route::get('/user/vuelos/ciudades/{pais_id}', [UserVuelos::class, 'getCiudades'])->name('rutaGetCiudades');

//Filtrar vuelos
Route::post('/user/vuelos/filtrar',[UserVuelos::class,'filtroVuelos'])->name('rutaFiltrarVuelo');