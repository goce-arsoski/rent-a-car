@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      Book a car
    </h1>
  </div>

  <div class="text-center">
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif

    <form action="{{ route('store.booking', $car->id) }}" method="POST">
      @csrf
      <div class="container">
        <div class="row text-center col-2 offset-5">
          <input
          type="hidden"
          name="car_id"
          value="{{ $car->id}}">
          <div class="col-sm">
            <label class="control-label">
              Start date
            </label>
            <input
              type="date"
              class="form-control block mb-2"
              name="start_date">
          </div>
          <div class="col-sm">
            <label class="control-label">
              End date
            </label>
            <input
              type="date"
              class="form-control block mb-3"
              name="end_date">
          </div>
          </br>
          <div class="col-sm">
            <button type="submit" class="btn btn-primary block">
              Book
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
