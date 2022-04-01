@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      Book a car
    </h1>
  </div>

  <div class="text-center">
    {{-- @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif --}}
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="container">
        <div class="row text-center col-2 offset-5">
          <input
            type="hidden"
            name="booking_id"
            value="{{ $booking->id}}">
          <input
            type="hidden"
            name="car_id"
            value="{{ $booking->car->id }}">
          <div class="col-sm">
            <label class="control-label">
              Start date
            </label>
          <input
            type="date"
            class="form-control block mb-2"
            name="start_date"
            value="{{ $booking->start_date }}">
          </div>
          <div class="col-sm">
            <label class="control-label">
              End date
            </label>
            <input
              type="date"
              class="form-control block mb-3"
              name="end_date"
              value="{{ $booking->end_date }}">
          </div>
          </br>
          <button type="submit" class="btn btn-primary block">
            Update booking
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
