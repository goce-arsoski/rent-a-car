<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\BookingsController;

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

//Cars
// Route::get('/cars', [CarsController::class, 'index']);
// Route::get('/cars/create', [CarsController::class, 'create']);
Route::resource('/cars', CarsController::class);

//People
Route::get('/people', [PeopleController::class, 'index']);

//Bookings
//Route::get('/bookings', [BookingsController::class, 'index']);
//Route::resource('/bookings', BookingsController::class);

Route::get('/cars/{id}/bookings/', [BookingsController::class, 'allCarBookings']);
Route::get('/cars/{id}/bookings/create', [CarsController::class, 'cBooking']);
Route::post('/cars/{id}/bookings/', [CarsController::class, 'sBooking']);
