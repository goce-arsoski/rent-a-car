@extends('layouts.app')

@section('content')
<style>
  .card {
    background: #e9e0e0;
    opacity: 0.95;
}
</style>
  <div class="text-center">
    <form action="/bookings/{{ $booking->id }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card col-4 offset-4">
        From: {{ $booking['start_date'] }} to {{ $booking['end_date'] }}.
        <div class="col-4 offset-4 btn-group mb-2" role="group" aria-label="Basic mixed styles example">
          <a href="{{ route('bookings.edit', $booking->id) }}" type="button" class="btn btn-warning">
            Edit
          </a>
          <form action="/bookings/{$id}" method="POST" class="ml-2">
            @csrf
          @method('delete')
          <a type="button" class="btn btn-danger">
            Delete
          </a>
          </form>
        </div>
      </div>
    </form>
  </div>
@endsection
