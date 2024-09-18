<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ChefController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ReservationController;


Route::middleware(['auth'])
    ->as('backend.')
    ->group(function () {
        // Dashboard Route

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
        });

        //

        // ProductController Route
        Route::middleware(['auth'])->group(function () {
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


        // Reservation Route
        Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
        Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
        Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
        Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
        Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
        Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');


        // Users Route
        Route::get('/users',[UserController::class,'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('user.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');



        //Chefs Route
        Route::get('/chefs', [ChefController::class, 'index'])->name('chefs.index');
        Route::get('/chefs/create', [ChefController::class, 'create'])->name('chefs.create');
        Route::post('/chefs', [ChefController::class, 'store'])->name('chefs.store');
        Route::get('/chefs/{id}/edit', [ChefController::class, 'edit'])->name('chefs.edit');
        Route::put('/chefs/{id}', [ChefController::class, 'update'])->name('chefs.update');
        Route::get('/chefs/{id}', [ChefController::class, 'show'])->name('chefs.show');
        Route::delete('/chefs/{id}', [ChefController::class, 'destroy'])->name('chefs.destroy');

        });
 });



     //ReservationController Route
     Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');


