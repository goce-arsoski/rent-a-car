@extends('layouts.app')

@section('content')
<style>
  .container-bg {
    background: #e9e0e0;
    opacity: 0.95;
}
</style>
<main class="container-bg col-4 offset-4">
  <div class="container p-5">
    <h1 class="text-center">
      My Bookings
    </h1>
    <ul>
      <p>
        <h3><b>User:</b>
          <a href="{{ route('users.show', $user->id) }}">
            {{  $user->name  }}
          </a>
        </h3>
      </p>
    </ul>
    </br>
    <ul>
      <p>
        <h3> Booked Cars: </h3>
      </p>

      @forelse ($user->userBookings as $bookings)
      <li>
        <h6>
          <a href="{{ route('sbooking', $bookings->id) }}">
            {{ $bookings->car->car_model() }} from: {{ $bookings['start_date'] }} to {{ $bookings['end_date'] }}.
          </a>
        </h6>
      </li>
    @empty
      <p>
        No bookings yet.
      </p>
    @endforelse
    </ul>
  </div>
</main>
@endsection
