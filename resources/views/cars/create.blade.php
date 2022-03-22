@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      Create car
    </h1>
  </div>

  <div class="text-center">
    <form action="/cars" method="POST">
      @csrf
      <div class="block">
        <input
          type="text"
          class="block"
          name="brand"
          placeholder="Brand name   - e.g. BMW/ Audi">
        </br>
          <input
          type="text"
          class="block"
          name="model"
          placeholder="Model   - e.g. 325i/ A4">
        </br>
          <input
          type="text"
          class="block"
          name="plate"
          placeholder="Plate   - e.g. SK-1111-AA">
        </br>
          <input
          type="text"
          class="block"
          name="color"
          placeholder="Color   - e.g. Green/ Blue">
        </br>
        <button type="submit" class="block">
          Create car
        </button>
      </div>
    </form>
  </div>
@endsection
