@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="container p-5">
        @guest
            <div class="card mb-5 p-5 b-rad">
                <h1 class="text-center">
                    <b>WELCOME TO OUR CARS BOOKING SITE</b>
                </h1>
            </div>
        @endguest
        @auth
            <div class="align-middle">
              <button class="btn btn-info">
                <a href={{ route('user.cars') }}>
                  Users
                </a>
              </button>
              <button class="btn btn-danger">
                <a href={{ route('index.cars') }}>
                  Cars
                </a>
              </button>
              <button class="btn btn-warning">
                  <a href="/bookings">
                      Bookings
                  </a>
              </button>
            </div>
        @endauth
    </div>
    <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
