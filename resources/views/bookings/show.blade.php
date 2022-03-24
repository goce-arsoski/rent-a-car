@extends('layouts.app')

@section('content')
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
@endsection
