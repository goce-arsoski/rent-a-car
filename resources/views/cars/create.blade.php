@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>
      Create car
    </h1>
  </div>

  <div class="text-center">
    <form action="/cars" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="block row text-center col-2 offset-5">
        <input
          type="text"
          class="form-control block mb-2"
          name="brand"
          placeholder="Brand name   - e.g. BMW/ Audi">
        </br>
        <input
          type="text"
          class="form-control block mb-2"
          name="model"
          placeholder="Model   - e.g. 325i/ A4">
        </br>
        <input
          type="text"
          class="form-control block mb-2"
          name="plate"
          placeholder="Plate   - e.g. SK-1111-AA">
        </br>
        <input
          type="text"
          class="form-control block mb-2"
          name="color"
          placeholder="Color   - e.g. Green/ Blue">
        </br>
        <input
          type="file"
          class="form-control block mb-2"
          name="image">
        </br>
        </br>
        <button type="submit" class="btn btn-primary block">
          Create car
        </button>
      </div>
    </form>
  </div>
  @if ($errors->any())
    <div class="text-center">
      @foreach ($errors->all() as $error)
        <li class="text-red-500">
          {{ $error }}
        </li>
      @endforeach
    </div>
  @endif
@endsection
