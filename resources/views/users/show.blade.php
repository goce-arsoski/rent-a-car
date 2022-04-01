@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Show') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users/{{ $user->id }}, $user->id)">
                        @csrf
                        @method('PUT')

                        <div class="col-form-label text-center">
                          <p>
                            <b>Name: &nbsp;</b>
                            {{ $user->name }}
                          </p>
                          <p>
                            <b>Email: &nbsp;</b>
                            {{ $user->email }}
                          </p>
                        </div>

                        @if($user->id ==  auth()->user()->id)
                        <div class="row mb-0">
                          <div class="col-md-5 offset-md-5">
                            <a href="{{ route('edit.user', $user->id) }}" type="submit" class="btn btn-primary">
                              {{ __('Edit') }}
                            </a>
                          </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
