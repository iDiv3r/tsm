<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinoAdm;
use App\Http\Controllers\ReporteAdm;
use App\Http\Controllers\ReportAController;

Route::view('/prueba','prueba');

Route::get('/rob',function(){
    return 'Robert';
});


route::get('/destinosAdm',[DestinoAdm::class,'vistaDestinosAdm'])->name('rutaadminDestino');
route::Post('/adminDestinosadd',[DestinoAdm::class,'addDestino'])->name('rutaaddDestino');
route::Post('/adminDestinosedit',[DestinoAdm::class,'editDestino'])->name('rutaeditDestino');
route::Post('/adminDestinosdele',[DestinoAdm::class,'delDestino'])->name('rutadeleDestino');

route::get('/reportesAdm',[ReporteAdm::class,'vistaReporteAdm'])->name('rutaadminReporte');
route::Post('/adminrepodestadd',[ReporteAdm::class,'addDestinoRepo'])->name('rutaadminrepodestadd');
route::Post('/adminrepoaeroadd',[ReporteAdm::class,'addAeroRepo'])->name('rutaadminrepoaeroadd');
route::Post('/adminrepoaclieadd',[ReporteAdm::class,'addClienRepo'])->name('rutaadminrepoaclieadd');

route::Post('/adminrepodestdel',[ReporteAdm::class,'delDestinoRepo'])->name('rutaadminrepodestdel');
route::Post('/adminrepoaerodel',[ReporteAdm::class,'delAeroRepo'])->name('rutaadminrepoaerodel');
route::Post('/adminrepoacliedel',[ReporteAdm::class,'delClienRepo'])->name('rutaadminrepoacliedel');

// route::resource('report', ReportAController::class);

Route::get('/exportAerolineas', [ReporteAdm::class, 'exportAerolineas']);

Route::get('/exportarDestinos', [ReporteAdm::class, 'exportDestinos']);

Route::get('/exportarClientesV', [ReporteAdm::class, 'exportClientesV']);

Route::get('/exportarClientesH', [ReporteAdm::class, 'exportClientesH']);