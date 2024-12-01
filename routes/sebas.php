<?php

use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/sebas',function(){
    return 'Sebas';
});

Route::get('/super-admin', [SuperAdminController::class, 'vistaSuperAdmin'])->name('superAdmin');
Route::post('/agregar-usuario', [SuperAdminController::class, 'agregarUsuario'])->name('agregarUsuario');
Route::post('/editar-usuario', [SuperAdminController::class, 'editarUsuario'])->name('editarUsuario');
Route::post('/eliminar-usuario', [SuperAdminController::class, 'eliminarUsuario'])->name('eliminarUsuario');