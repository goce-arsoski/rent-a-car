@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      Bookings:
    </h1>
  <div>
  <div class="text-center">
    <ul>
      @forelse ($bookings as $booking)
        <li>
          <button class="btn btn-info">
            <a href="{{ route('show.bookings', [$booking->car->id, $booking->id]) }}">
              View booking
            </a>
          </button>
          From: {{ $booking['start_date'] }} to {{ $booking['end_date'] }}.
        </li>
      @empty
        <p>
          No bookings yet.
        </p>
      @endforelse
      {{ $bookings->links() }}
    </ul>
  </div>
@endsection
