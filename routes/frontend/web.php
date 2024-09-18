<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::controller(HomeController::class)
->group(function(){
    Route::get('/','home')->name('home');
});



