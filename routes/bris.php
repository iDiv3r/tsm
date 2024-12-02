<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHoteles;
use App\Http\Controllers\DestinoAdm;

// Route::view('/prueba','prueba');

// Route::get('/bris',function(){
//     return 'Briseida';
// });

// Route::get('/administrador/hoteles',function(){
//     return view('vistas.hotelesA');
// })->name('hotelesAdministrador');

Route::get('/administrador/hoteles', [AdminHoteles::class, 'vistaHoteles'])->name('hotelesAdministrador');
Route::post('/administrador/hoteles/agregar', [AdminHoteles::class, 'agregarHotel'])->name('agregarHotel');
Route::post('/administrador/hoteles/editar', [AdminHoteles::class, 'editarHotel'])->name('editarHotel');
Route::post('/administrador/hoteles/eliminar', [AdminHoteles::class, 'eliminarHotel'])->name('eliminarHotel');

Route::post('/administrador/destinos/agregar', [DestinoAdm::class, 'addDestino'])->name('agregarDestino');
Route::post('/administrador/destinos/editar', [DestinoAdm::class, 'editDestino'])->name('editarDestino');