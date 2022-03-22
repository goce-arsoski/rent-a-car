@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      Update car
    </h1>
  </div>

  <div class="text-center">
    <form action="/cars/{{ $car->id }}" method="POST">
      @csrf
      @method('PUT')
      <div class="block">
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
        <button type="submit" class="block">
          Update car
        </button>
      </div>
    </form>
  </div>
@endsection
