<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\UserHoteles;
use App\Http\Controllers\UserVuelos;
use App\Models\User;
use App\Http\Controllers\FiltrosHoteles;
use App\Http\Controllers\AdminHoteles;


Route::view('/prueba','prueba');

Route::get('/emi',function(){
    return 'Emiliano';
});

Route::view('/inicio','login');

Route::view('/administrador/destinos','vistas.destinosADM');





Route::get('/v2',[UserVuelos::class,'index'])->name('rutaVuelosUsuarios');


Route::get('/c',[ViewsController::class,'carrito'])->name('rutaCarrito');


Route::get('/h',[UserHoteles::class,'mostrar'])->name('rutaHotelesUsuarios');


Route::post('/filtrarHotelesAdmin',[AdminHoteles::class,'filtrarHoteles'])->name('rutaFiltrarHotelesAdmin');

Route::post('/filtrarHoteles',[UserHoteles::class,'filtrarHoteles'])->name('rutaFiltrarHotelesUsuario');

// Route::get('/hoteles',[UserHoteles::class,'index'])->name('rutaHotelesUsuarios');