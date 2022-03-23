@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      Bookings for:
      {{ $car->brand }} </br>
      {{ $car->model }} </br>
      {{ $car->plate }} </br>
      {{ $car->color }} </br>
    </h1>
  <div>
  <div class="text-center">
    <ul>
      <p>
        Bookings:
      </p>

      @forelse ($car->carBookings as $booking)
        <li>
          From: {{ $booking['start_date'] }} to {{ $booking['end_date'] }}.
        </li>
      @empty
        <p>
          No bookings yet.
        </p>
      @endforelse
    </ul>
  </div>
  <div class="text-center">
    <h1>
      Book this car
    </h1>
  </div>

  <div class="text-center">
    <form action="/cars/{{ $car->id }}/bookings" method="POST">
      @csrf
      <div class="block">
        <input
          type="date"
          class="block"
          name="start_date"
        </br>
          <input
          type="date"
          class="block"
          name="end_date"
        </br>
        <button type="submit" class="block">
          Book
        </button>
      </div>
    </form>
  </div>
@endsection
