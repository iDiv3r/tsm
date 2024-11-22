<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelesAdminController;

// Route::view('/prueba','prueba');

// Route::get('/bris',function(){
//     return 'Briseida';
// });

// Route::get('/administrador/hoteles',function(){
//     return view('vistas.hotelesA');
// })->name('hotelesAdministrador');

Route::get('/administrador/hoteles', [HotelesAdminController::class, 'vistaHoteles'])->name('hotelesAdministrador');
Route::post('/administrador/hoteles/agregar', [HotelesAdminController::class, 'agregarHotel'])->name('agregarHotel');
Route::post('/administrador/hoteles/editar', [HotelesAdminController::class, 'editarHotel'])->name('editarHotel');
Route::post('/administrador/hoteles/eliminar', [HotelesAdminController::class, 'eliminarHotel'])->name('eliminarHotel');