<?php

use Illuminate\Support\Facades\Route;


Route::view('/prueba','prueba');

Route::get('/andy',function(){
    return 'Andrea';
});
