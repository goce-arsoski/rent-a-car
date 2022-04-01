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

Route::middleware(['auth'])->group(function () {
    //Cars
    Route::resource('/cars', CarsController::class);
    Route::get('/cars', [CarsController::class, 'index'])->name('index.cars');
    Route::post('/delete-car', [CarsController::class, 'destroy'])->name('delete.car');

    //Bookings
    Route::resource('/bookings', BookingsController::class);
    Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings');
    Route::get('/bookings/{id}', [BookingsController::class, 'showOneBooking'])->name('sbooking');

    //Bookings custom routes
    Route::get('/cars/{car_id}/bookings', [BookingsController::class, 'allCarBookings'])->name('show.bookings');

    //Route::get('/cars/{id}/bookings/create', [CarsController::class, 'cBooking'])->name('create.booking');
    //Route::post('/cars/{id}/bookings', [CarsController::class, 'sBooking'])->name('store.booking');
    Route::controller(BookingsController::class)->group(function () {
        Route::get('/cars/{id}/bookings/create', 'cBooking')->name('create.booking');
        Route::post('/cars/{id}/bookings', 'sBooking')->name('store.booking');
    });

    //Users
    Route::get('/users', [CarsController::class, 'userCars'])->name('user.cars');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
