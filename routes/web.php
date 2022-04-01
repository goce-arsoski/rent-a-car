<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\UsersController;
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

Auth::routes();

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
    Route::controller(BookingsController::class)->group(function () {
        Route::get('/cars/{id}/bookings/create', 'cBooking')->name('create.booking');
        Route::post('/cars/{id}/bookings', 'sBooking')->name('store.booking');
    });

    //Users
    Route::get('/mybookings', [UsersController::class, 'userCars'])->name('user.cars');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('edit.user');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
