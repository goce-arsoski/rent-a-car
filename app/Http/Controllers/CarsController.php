<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    public function create()
    {

        return view('cars.create');
    }

    public function store(ValidationRequest $request)
    {
        $request->validated();

        $car = Car::create([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'plate' => $request->input('plate'),
            'color' => $request->input('color')
        ]);

        return redirect('/cars');
    }

    public function show($id)
    {
        $car = Car::find($id);

        return view('cars.show')->with('car', $car);
    }

    public function edit($id)
    {
        $car = Car::find($id);

        return view('cars.edit')->with('car', $car);
    }

    public function update(ValidationRequest $request, $id)
    {
        $request->validated();

        $car = Car::where('id', $id)
            ->update([
                'brand' => $request->input('brand'),
                'model' => $request->input('model'),
                'plate' => $request->input('plate'),
                'color' => $request->input('color')
            ]);

        return redirect('/cars');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect('/cars');
    }

    //Create booking with custom route
    public function cBooking($id)
    {
        $car = Car::findOrFail($id);
        return view('bookings.create', compact('car'));
    }

    //Save booking with custom route
    public function sBooking(Request $request)
    {
        $booking = Booking::create([
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect('/bookings');
    }
}
