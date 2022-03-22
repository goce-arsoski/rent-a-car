@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      CARS
    </h1>
  <div>
  <button class="btn btn-info">
    <a href="cars/create">
      Add a new car
    </a>
  </button>
  <div>
    @foreach ($cars as $car)
      <div class="card">
        <div>
          <button class="btn btn-warning"
            <a href="cars/{{ $car->id }}/edit">
              Edit
            </a>
          <form action="/cars/{{ $car->id }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger">
              Delete
            </button>
          </form>
        </div>
        <h2>
          Brand:
          <a href="cars/{{ $car->id }}">
            {{ $car->brand  }}
          </a>
        </h2>
        <h3>
          Model: {{ $car->model }}
        </h3>
        <h3>
          License plate: {{ $car->plate }}
        </h3>
        <h3>
          Color: {{ $car->color }}
        </h3>
      </div>
    @endforeach
  </div>
@endsection
