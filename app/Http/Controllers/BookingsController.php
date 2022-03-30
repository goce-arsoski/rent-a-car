<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationBookingRequest;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;

class BookingsController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('car')->get();
        $bookings = Booking::paginate(10);
        return view('bookings.index', [
            'bookings' => $bookings
        ]);
    }

    public function create()
    {

        return view('bookings.create');
    }

    public function store(ValidationBookingRequest $request)
    {
        $request->validated();

        $booking = Booking::create([
            'car_id' => $request->input('car_id'),
            'user_id' => auth()->user()->id,
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

    //Create booking with custom route
    public function cBooking($id)
    {
        $car = Car::findOrFail($id);
        return view('bookings.create', compact('car'));
    }

    //Save booking with custom route
    public function sBooking(ValidationBookingRequest $request)
    {
        $booking = Booking::create([
            'car_id' => $request->car_id,
            'user_id' => auth()->user()->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect('/bookings');
    }

    public function allCarBookings($car_id, $booking_id)
    {
        $car = Car::find($car_id);
        // $bookings = Booking::find($car_id, $booking_id);
        $bookings = $car->carBookings;
        return view('bookings.show')->with(['car' => $car, 'bookings' => $bookings]);
    }
}
