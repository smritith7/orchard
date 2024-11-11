<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\AuthController;


Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('backend.dashboard');
    }
    return view('backend.auth.pages.login');
})->name('login');

Route::controller(AuthController::class)
->group(function(){
    Route::post('/login','loginCheck')->name('login.post');
    Route::post('/logout','logout')->name('logout');
    Route::post('/store', 'storeUser')->name('store');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register','registerPage')->name('register');
    Route::post('/authenticate', 'authenticate')->name('authenticate');

    Route::get('/profile','profile')->name('profile');




});



