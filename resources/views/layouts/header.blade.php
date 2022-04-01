<div class="">
  <nav class="navbar navbar-default navbar-fixed-top">
    <style>
      .pd {
          padding-left: 10px;
          }
    </style>
    <img
      class="pd"
      src="//www.vip-charter-service.com/cars-rental/img/BMW-luxury-cars.jpg"
      width="400">
    <h1 style="text-transform:uppercase">Car booking</h1>

    <div class="btn-group">
      <button
        class="navbar-toggler"
        type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <a class="btn btn-secondary navbar-brand" href="/">Home</a>
        <a class="btn" href={{ route('index.cars') }}>Book Car</a>
        <a class="btn" href="/cars/create">Add Car</a>

        @if (Auth::check())
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-danger navbar-brand">
            Logout
          </button>
        </form>
        @endif

        @unless (Auth::check())
          <a class="btn" href="/login/">Login</a>
          <a class="btn" href="/register/">Register</a>
        @endunless ()
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      <li class="mobile-menu">
      </li>
      </div>
    </div>
  </nav>
</div>
