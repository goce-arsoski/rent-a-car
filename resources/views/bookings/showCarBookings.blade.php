@extends('layouts.app')

@section('content')
<style>
  .container-bg {
    background: #5bb4ca;
    opacity: 0.8;
}
</style>
<div class="container-bg text-center col-4 offset-4">
  <h4>Bookings for
    <a href="{{ route('cars.show', $car->id) }}">
      {{ $car->brand }} {{ $car->model }}:
    </a>
  </h4>
  <ul>
    @forelse ($car->carBookings as $booking)
      <li>
        <a href="{{ route('sbooking', $booking->id) }}">
          From: {{ $booking['start_date'] }} to {{ $booking['end_date'] }}.
        </a>
      </li>
    @empty
      <p>
        No bookings yet.
      </p>
    @endforelse
  </ul>
</div>
@endsection
