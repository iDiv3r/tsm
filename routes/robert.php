<?php

use Illuminate\Support\Facades\Route;


Route::view('/prueba','prueba');

Route::get('/rob',function(){
    return 'Robert';
});
