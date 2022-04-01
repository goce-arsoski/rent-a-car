@extends('layouts.app')

@section('content')
<style>
  .container-bg {
    background: #e9e0e0;
    opacity: 0.95;
}
</style>
<div class="container-bg text-center">
  @if(session()->has('message'))
    <div class="col-4 offset-4 alert alert-success">
      {{ session()->get('message') }}
    </div>
  @endif
  <h1>
    CARS
  </h1>
  <a class="btn btn-info mb-3" href="{{ route('cars.create') }}">
      Add a new car
  </a>

  <div class="card-group container">

  @foreach ($cars as $car)
    <div class="col-4">
      <div class="card mb-4" style="width: 20rem;">
        <div class="text-center">
          <img
          class="mt-2"
          src="{{ asset('images/' . $car->image_path) }}"
          height="140">
        </div>
        <div class="card-body">
          <a href="cars/{{ $car->id }}">
            <h5 class="card-title">{{ $car->brand  }} {{ $car->model }}</h5>
          </a>
          <h6>
            License plate: {{ $car->plate }}
          </h6>
          <h6>
            Color: {{ $car->color }}
          </h6></br>
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="{{ route('cars.edit', $car->id) }}" type="button" class="btn btn-warning">
              Edit
            </a>
            <a class="btn btn-info" href="{{ route('create.booking', $car->id) }}">
              Book this car
            </a>
            <form action="{{ route('delete.car') }}" method="POST" class="ml-2">
              @csrf
              <input name="car_id" value={{ $car->id  }} hidden>
              <input name="type" value="form" hidden>
              <button class="btn btn-danger">
                Delete
              </button>
            </form>
          </div>
          <p class="card-text"><small class="text-muted">Last updated {{ $car->updated_at }}.</small></p>
        </div>
      </div>
    </div>
  @endforeach

  </div>
  <div class="container">
      {{ $cars->links() }}
  </div>
</div>
@endsection
