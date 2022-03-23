@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      Book a car
    </h1>
  </div>

  <div class="text-center">
    <form action="/cars/{{ car_id }}/bookings" method="POST">
      @csrf
      <p hidden>
        {{ Form::text('car_id', car_id) }}
      </p>
      <div class="block">
        <input
          type="date"
          class="block"
          name="start_date">
        </br>
          <input
          type="date"
          class="block"
          name="end_date">
        </br>
        <button type="submit" class="block">
          Book
        </button>
      </div>
    </form>
  </div>
@endsection
