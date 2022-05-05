@extends('layouts.app')

@section('content')

<!-- AddNewCarModal -->
<div class="modal fade" id="addNewCarModal" tabindex="-1" role="dialog" aria-labelledby="addNewCarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewCarModalLabel">Add a new Car</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul id="saveform_errList"></ul>

        <div class="group mb-3">
          <label for="">Brand</label>
          <input type="text" class="brand form-control">
        </div>
        <div class="group mb-3">
          <label for="">Model</label>
          <input type="text" class="model form-control">
        </div>
        <div class="group mb-3">
          <label for="">Plate</label>
          <input type="text" class="plate form-control">
        </div>
        <div class="group mb-3">
          <label for="">Color</label>
          <input type="text" class="color form-control">
        </div>
        <div class="group mb-3">
          <label for="">Image</label>
          <input type="file" class="image form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary addNewCar">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- End-AddNewCarModal -->

<style>
  .container-bg {
    background: #e9e0e0;
    opacity: 0.95;
}
</style>
<div class="container-bg text-center">
  @if(session()->has('message'))
    <div class="col-4 offset-4 alert alert-success">
      {{ session()->get('message') }}
    </div>
  @endif
  <h1>
    CARS
  </h1>

  <div id="success_message"></div>

  <a class="btn btn-info mb-3" href="#" data-bs-toggle="modal" data-bs-target="#addNewCarModal">
      Add a new car
  </a>

  <div class="card-group container">

  @foreach ($cars as $car)
    <div class="col-4">
      <div class="card mb-4" style="width: 20rem;">
        <div class="text-center">
          <img
          class="mt-2"
          src="{{ asset('images/' . $car->image_path) }}"
          height="140">
        </div>
        <div class="card-body">
          <a href="cars/{{ $car->id }}">
            <h5 class="card-title">{{ $car->brand  }} {{ $car->model }}</h5>
          </a>
          <h6>
            License plate: {{ $car->plate }}
          </h6>
          <h6>
            Color: {{ $car->color }}
          </h6></br>
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="{{ route('cars.edit', $car->id) }}" type="button" class="btn btn-warning">
              Edit
            </a>
            <a class="btn btn-info" href="{{ route('create.booking', $car->id) }}">
              Book this car
            </a>
            <form action="{{ route('delete.car') }}" method="POST" class="ml-2">
              @csrf
              <input name="car_id" value={{ $car->id  }} hidden>
              <input name="type" value="form" hidden>
              <button class="btn btn-danger">
                Delete
              </button>
            </form>
          </div>
          <p class="card-text"><small class="text-muted">Last updated {{ $car->updated_at }}.</small></p>
        </div>
      </div>
    </div>
  @endforeach

  </div>
  <div class="container">
      {{ $cars->links() }}
  </div>
</div>
@endsection

@section('editCar')
<script>
  $(document).ready(function () {

    // fetchcar();

    // function fetchcar()
    // {
    //   $.ajax({
    //     type: "GET",
    //     url: "/fetch-cars",
    //     dataType: "json",
    //     success: function (response) {
    //       console.log(response.cars);
    //     }
    //   });
    // }

    $(document).on('click', '.addNewCar', function (e) {
      e.preventDefault();
      let data = {
        'brand': $('.brand').val(),
        'model': $('.model').val(),
        'plate': $('.plate').val(),
        'color': $('.color').val(),
        'image_path': $('.image').val(),
      }

      $('#upload_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
        url:"{{ url('employeeImageUpload') }}",
        method:"POST",
        data:new FormData(this),
        dataType:'json',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data)
        {
          $('#message').css('display', 'block');
          $('#message').html(data.success);
          $('#message').addClass(data.class_name);
          $('#uploaded_image').html(data.uploaded_image);
        }
        })
      });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: "POST",
        url: "/cars",
        data: data,
        dataType: "json",
        success: function (response) {
          // console.log(response);
          if(response.status == 400)
          {
            $('#saveform_errList').html("");
            $('#saveform_errList').addClass('alert alert-danger');
            $.each(response.errors, function (key, err_values) {
            $('#saveform_errList').append('<li>'+err_values+'</li>');
            });
          }
          else
          {
            $('#saveform_errList').html("");
            $('#success_message').addClass('alert alert-success');
            $('#success_message').text(response.message);
            window.location.href = response.redirect;
          }
        }
      });

    });
  });
</script>
@endsection
