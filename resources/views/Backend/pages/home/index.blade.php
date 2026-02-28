@extends('Backend.layout.master')
@section('content')
    <div class="content-wrapper">
          
      <div class="card card-body">
        <h3>Welcome to your Admin Panel</h3>
        <br>
        <br>
        <p>
          <a class="btn btn-primary btn-lg" href="{{ route('index') }}">Visit Main Site</a>
        </p>
      </div>    

    </div>



@endsection