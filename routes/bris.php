<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHoteles;

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