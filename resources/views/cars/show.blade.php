@extends('layouts.app')

@section('content')
<style>
  .container-bg {
    background: #68d635;
    opacity: 0.8;
}
</style>

  <div class="text-center">
    <img
      src="{{ asset('images/' . $car->image_path) }}"
      width="400">
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

        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <a href="{{ route('cars.edit', $car->id) }}" type="button" class="btn btn-warning">
            Edit
          </a>
          <a class="btn btn-info" href="{{ route('create.booking', $car->id) }}">
            Book this car
          </a>

          <button type="button"
            id="delete"
            class="btn btn-danger delete"
            data-car_id="{{ $car->id }}">
            Delete
          </button>
          <input
            type="hidden"
            name="car_id"
            value="{{ $car->id}}">
        </div>

        <div class="container-bg col-2 offset-5"
          <p>
            <b>Bookings:</b>
          </p>
          <ul class="list-group">
            @forelse ($car->carBookings as $booking)
              <li class="list-group-item">
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

      </div>
    </form>
  </div>
@endsection

@section('js')
  <script>
      $('.delete').on('click', function(){
        // console.log(jQuery(this).data('goce'))
        let car_id = $(this).data('car_id')
        let token = $('input[name=_token]').val()
        console.log(token)
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': token
          }
        })
        $.ajax({
            url: "{{ route('delete.car') }}",
            type: 'POST',
            data: {
                "car_id": car_id,
            },
            success: function (data){
              window.location.href = data.redirect;
            }
        });
      })
  </script>
@endsection
