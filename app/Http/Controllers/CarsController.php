<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationCarRequest;
use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', [
            'cars' => Car::paginate(3)
        ]);
    }

    public function create()
    {

        return view('cars.create');
    }

    public function store(ValidationCarRequest $request)
    {
        $request->validated();

        if ($request->image != null) {
            $imageName = $request->brand . '_' . $request->model . '_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = "image_path";
        }

        $car = Car::create([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'plate' => $request->input('plate'),
            'color' => $request->input('color'),
            'image_path' => $imageName
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

    public function update(ValidationCarRequest $request)
    {
        $request->validated();

        if ($request->image != null) {
            $imageName = $request->brand . '_' . $request->model . '_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $request->image_path;
        }

        $car = Car::where('id', $request->car_id)
            ->update([
                'brand' => $request->input('brand'),
                'model' => $request->input('model'),
                'plate' => $request->input('plate'),
                'color' => $request->input('color'),
                'image_path' => $imageName
            ]);

        return redirect('/cars');
    }

    public function destroy(Request $request)
    {
        $car_id = $request->car_id;
        $car = Car::findOrFail($car_id);
        $car_brand = $car->brand;
        $car_model = $car->model;
        $car->delete();

        if ($request->type == "form") {
            return redirect('/cars')->with('message', "The car $car_brand $car_model is deleted!");
        }
        return response()->json([
            'redirect' => route('index.cars'),
            'success' => "program"
        ]);
    }
}
