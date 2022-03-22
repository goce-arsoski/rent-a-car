<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function store(Request $request)
    {
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

    public function update(Request $request, $id)
    {
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
}
