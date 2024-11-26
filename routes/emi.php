<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\UserHoteles;
use App\Models\User;

Route::view('/prueba','prueba');

Route::get('/emi',function(){
    return 'Emiliano';
});

Route::view('/inicio','login');

Route::view('/administrador/destinos','vistas.destinosADM');





Route::get('/v2',[ViewsController::class,'vuelos'])->name('rutaVuelosUsuarios');


Route::get('/c',[ViewsController::class,'carrito'])->name('rutaCarrito');



Route::get('/h',[UserHoteles::class,'mostrar'])->name('rutaHotelesUsuarios');


// Route::get('/hoteles',[UserHoteles::class,'index'])->name('rutaHotelesUsuarios');