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


        });
 });





