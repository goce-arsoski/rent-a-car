<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\PeopleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('/cars', CarsController::class);
//Cars
// Route::get('/cars', [CarsController::class, 'index']);
// Route::get('/cars/create', [CarsController::class, 'create']);

//People
Route::get('/people', [PeopleController::class, 'index']);
