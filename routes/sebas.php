<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/sebas',function(){
    return 'Sebas';
});

Route::get('/super-admin', [SuperAdminController::class, 'vistaSuperAdmin'])->name('superAdmin');
Route::post('/agregar-usuario', [SuperAdminController::class, 'agregarUsuario'])->name('agregarUsuario');
Route::post('/editar-usuario', [SuperAdminController::class, 'editarUsuario'])->name('editarUsuario');
Route::post('/eliminar-usuario', [SuperAdminController::class, 'eliminarUsuario'])->name('eliminarUsuario');

Route::post('/reservando_hotel', [ReservationController::class, 'reservarHotel'])->name('reservarHotel');
Route::get('/mi_carrito', [ReservationController::class, 'mostrar'])->name('miCarrito');
Route::post('/eliminar_reserva', [ReservationController::class, 'eliminarReservaHotel'])->name('eliminarReserva');

Route::post('/reservando_vuelo', [ReservationController::class, 'reservarVuelo'])->name('reservarVuelo');
Route::post('/eliminar_reserva_vuelo', [ReservationController::class, 'eliminarReservaVuelo'])->name('eliminarReservaVuelo');
Route::get('/compra', [ReservationController::class, 'realizarCompra'])->name('realizarCompra');