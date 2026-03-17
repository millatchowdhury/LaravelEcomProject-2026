@extends('Frontend.layout.master')

@section('content')
  <div class='container mt-2'>
    <div class="row">
      <div class="col-md-4">
        <div class="list-group">
          <a href="" class="list-group-item">
            <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:100px">
          </a>
          <a href="{{ route('show.user.dashboard') }}" class="list-group-item {{ Route::is('show.user.dashboard') ? 'active' : '' }}">Dashboard</a>
          <a href="{{ route('edit.user.profile') }}" class="list-group-item {{ Route::is('edit.user.profile') ? 'active' : '' }}">Update Profile</a>

        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-body">
          @yield('sub-content')
        </div>
      </div>
    </div>
  </div>
@endsection