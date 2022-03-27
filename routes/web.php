<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\BookingsController;
use Illuminate\Support\Facades\Auth;

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
Route::resource('/cars', CarsController::class);
Route::get('/cars', [CarsController::class, 'index'])->name('index.cars');

//Bookings
Route::get('/bookings', [BookingsController::class, 'index']);

//Bookings custom routes
Route::get('/cars/{id}/bookings', [BookingsController::class, 'allCarBookings'])->name('show.bookings');
Route::get('/cars/{id}/bookings/create', [CarsController::class, 'cBooking'])->name('create.booking');
Route::post('/cars/{id}/bookings', [CarsController::class, 'sBooking'])->name('store.booking');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
