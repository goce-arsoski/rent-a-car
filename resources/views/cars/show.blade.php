@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      {{ $car->brand }}
    </h1>
  <div>
  <div class="text-center">
    <form action="/cars/{{ $car->id }}" method="POST">
      @csrf
      @method('PUT')
      <div class="block">
        <p>
          {{ $car->brand }}
          </br>
          {{ $car->model }}
          </br>
          {{ $car->plate }}
          </br>
          {{ $car->color }}
        </p>
        <form action="/cars/{{ $car->id }}" method="POST">
          @csrf
          @method('delete')
          <button class="btn btn-danger">
            Delete
          </button>
        </form>
      </div>
    </form>
  </div>
@endsection
