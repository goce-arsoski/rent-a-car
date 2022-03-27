@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      {{ $car->brand }}
    </h1>
  <div>
  <div class="text-center">
    <form action="/cars/{{ $car->id }}" method="POST">
      @csrf
      @method('PUT')
      <div class="block">
        <p>
          {{ $car->model }}
          </br>
          {{ $car->plate }}
          </br>
          {{ $car->color }}
        </p>

        <form action="/cars/{{ $car->id }}" method="POST">
          @csrf
          @method('delete')
          <button class="btn btn-danger">
            Delete
          </button>
        </form>
        <input
          type="hidden"
          name="car_id"
          value="{{ $car->id}}">
        <div>
          <button class="btn btn-info">
            <a href="{{ route('create.booking', $car->id) }}">
              Book this car
            </a>
          </button>
        </div>
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
    </form>
  </div>
@endsection
