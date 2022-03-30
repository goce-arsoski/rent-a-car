<div class="container">
  <nav class="navbar navbar-default navbar-fixed-top">
    <strong><a class="navbar-brand text-uppercase font-weight-bold">Car booking</a></strong>
    <a class="navbar-brand"></a><a class="btn btn-secondary" href="/">Home</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <a class="btn" href={{ route('index.cars') }}>Book Car</a>
        <a class="btn" href="/cars/create">Add Car</a>

        @unless (Auth::check())
          <a class="btn" href="/login/">Login</a>
          <a class="btn" href="/register/">Register</a>
        @endunless ()

      </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      <li class="mobile-menu">
      </li>
      </div>
    </div>
  </nav>
</div>
