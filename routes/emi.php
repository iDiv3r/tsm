<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;

Route::view('/prueba','prueba');

Route::get('/emi',function(){
    return 'Emiliano';
});

Route::view('/inicio','login');

Route::view('/administrador/destinos','vistas.destinosADM');





Route::get('/v2',[ViewsController::class,'vuelos'])->name('rutaVuelosUsuarios');

Route::get('/h',[ViewsController::class,'hoteles'])->name('rutaHotelesUsuarios');

Route::get('/c',[ViewsController::class,'carrito'])->name('rutaCarrito');