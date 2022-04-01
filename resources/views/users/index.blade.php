@extends('layouts.app')

@section('content')
<style>
  .container-bg {
    background: #ff8080;
    opacity: 0.8;
}
</style>
<main class="container-bg col-6 offset-3">
  <div class="container p-5">
    <ul>
      <p>
        <h1><b>Users:</b></h1>
      </p>

      @foreach ($users as $user)
        <li>
          <h4> {{ $user['name'] }} </h4>
        </li>
      @endforeach
    </ul>
    </br>
    <ul>
      <p>
        <h3> Booked Cars: </h3>
      </p>

      @forelse ($user->userBookings as $bookings)
      <li>
        <h6>
          {{ $user['name'] }}

          <?php
            $id = $bookings['car_id'];
            $car = DB::table('cars')->find($id);
            echo "--- $car->brand $car->model: --- ";
          ?>
          From: {{ $bookings['start_date'] }} to {{ $bookings['end_date'] }}.
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
