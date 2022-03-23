<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;

class BookingsController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();

        return view('bookings.index', [
            'bookings' => $bookings
        ]);
    }

    public function create()
    {

        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $booking = Booking::create([
            'car_id' => $request->input('car_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date')
        ]);

        return redirect('/bookings');
    }

    public function show($id)
    {
        $booking = Booking::find($id);

        return view('bookings.show')->with('booking', $booking);
    }

    public function edit($id)
    {
        $booking = Booking::find($id);

        return view('booking.edit')->with('booking', $booking);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::where('id', $id)
            ->update([
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date')
            ]);

        return redirect('/bookings');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect('/bookings');
    }

    public function allCarBookings($car_id)
    {
        $car = Car::find($car_id);
        $bookings = Booking::find($car_id);

        return view('bookings.show')->with('car', $car);
    }
}
