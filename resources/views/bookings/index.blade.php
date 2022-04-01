@extends('layouts.app')

@section('content')
<style>
  .container-bg {
    background: #e9e0e0;
    opacity: 0.95;
}
</style>
  <div class="container-bg text-center col-4 offset-4">
    <h1>
      Bookings:
    </h1>
  <div>
  <div class="text-center">
    <ul>
      @forelse ($bookings as $booking)
        <li>
          <a href="{{ route('show.bookings', $booking->car->id) }}">
            View all bookings for
            <b> {{ $booking->car->brand }} {{ $booking->car->model }} </b>
          </a>
          ---
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
    <div>
      {{ $bookings->links() }}
    </div>
  </div>
@endsection
