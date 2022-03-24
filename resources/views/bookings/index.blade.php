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
