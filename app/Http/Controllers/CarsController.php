<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationCarRequest;
use App\Models\Car;
use App\Models\User;

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

    public function store(ValidationCarRequest $request)
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

    public function update(ValidationCarRequest $request, $id)
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

    public function userCars()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users
        ]);
    }
}
