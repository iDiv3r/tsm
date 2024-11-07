<?php

use App\Http\Controllers\superAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/sebas',function(){
    return 'Sebas';
});

Route::get('/super-admin', [superAdminController::class, 'vistaSuperAdmin'])->name('superAdmin');
Route::post('/agregar-usuario', [superAdminController::class, 'agregarUsuario'])->name('agregarUsuario');
Route::post('/editar-usuario', [superAdminController::class, 'editarUsuario'])->name('editarUsuario');
Route::post('/eliminar-usuario', [superAdminController::class, 'eliminarUsuario'])->name('eliminarUsuario');