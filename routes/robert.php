<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinoAdm;

Route::view('/prueba','prueba');

Route::get('/rob',function(){
    return 'Robert';
});


route::get('/destinosAdm',[DestinoAdm::class,'vistaDestinosAdm'])->name('rutaadminDestino');
route::Post('/adminDestinosadd',[DestinoAdm::class,'addDestino'])->name('rutaaddDestino');
route::Post('/adminDestinosedit',[DestinoAdm::class,'editDestino'])->name('rutaeditDestino');
route::Post('/adminDestinosdele',[DestinoAdm::class,'delDestino'])->name('rutadeleDestino');