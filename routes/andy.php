<?php

use App\Http\Controllers\ControllerDestinoAdm;
use Illuminate\Support\Facades\Route;


Route::view('/prueba','prueba');

Route::get('/andy',function(){
    return 'Andrea';
});

Route::view('/administrador/vuelos','vistas.vuelosADM')->name('vuelosAdministrador');

Route::post('/vuelosAdmin',[ControllerDestinoAdm::class,'agregar'])->name('agregar');
Route::post('/vueloseditAdmin',[ControllerDestinoAdm::class,'editar'])->name('editar');