@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  <div class="container p-5">
        <div class="card mb-5 p-5 b-rad">
            <h1 class="text-center">
                <b>WELCOME TO OUR CARS BOOKING SITE</b>
            </h1>
        </div>
        <div class="align-middle">
            <button class="btn btn-warning">
                <a href="bookings">
                    Bookings
                </a>
            </button>
            <button class="btn btn-danger">
                <a href="cars">
                    Cars
                </a>
            </button>
        </div>
    </div>
</main>
@endsection
