<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// // Frontend
// require_once __DIR__.'/frontend/web.php';

// Auth
require_once __DIR__.'/backend/auth.php';

// Backend
require_once __DIR__.'/backend/web.php';


