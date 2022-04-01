@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      Update car
    </h1>
  </div>

  <div class="text-center">
    <img
      src="{{ asset('images/' . $car->image_path) }}"
      width="400">
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="block">
        <input
          type="hidden"
          name="car_id"
          value="{{ $car->id}}">
        </br>
        <input
          type="text"
          class="block"
          name="brand"
          value="{{ $car->brand }}">
        </br>
        <input
          type="text"
          class="block"
          name="model"
          value="{{ $car->model }}">
        </br>
        <input
          type="text"
          class="block"
          name="plate"
          value="{{ $car->plate }}">
        </br>
        <input
          type="text"
          class="block"
          name="color"
          value="{{ $car->color }}">
        </br>
        <input
          type="file"
          class="block"
          name="image">
          <input
          type="hidden"
          name="image_path"
          value="{{ $car->image_path}}">
        </br>
        <button type="submit" class="btn btn-primary block">
          Update car
        </button>
      </div>
    </form>
  </div>
@endsection
