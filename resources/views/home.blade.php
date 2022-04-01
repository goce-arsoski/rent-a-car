@extends('layouts.app')

@section('content')
<style>
  .center {
    margin: 0;
    position: absolute;
    top: 30%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }
  .container-bg {
    background: #ec2727;
    opacity: 0.9;
  }
</style>
<main class="sm:container sm:mx-auto sm:mt-10">
  <div class="container p-5 mb-2 bg-gradient-danger text-white">
    @guest
      <div class="container-bg card mb-5 p-5 b-rad">
        <h1 class="text-center">
          <b>WELCOME TO OUR CARS BOOKING SITE</b>
        </h1>
      </div>
    @endguest
    @auth
      <div class="center">
        <a class="btn btn-info" href={{ route('user.cars') }}>
          My Bookings
        </a>
        <a class="btn btn-info mb-10" href={{ route('index.cars') }}>
          Cars
        </a>
        <a class="btn btn-info" href="{{ route('bookings') }}">
          Bookings
        </a>
      </div>
    @endauth
  </div>
</main>
@endsection
