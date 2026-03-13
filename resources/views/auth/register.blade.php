@extends('Frontend.layout.master')
@section('content')
{{-- <x-guest-layout> --}}
    <div class="container mt-2 " style="margin-bottom: 200px!important;">
    <div class="row justify-content-center mb-5 mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>
          <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="mb-3">
                  <label for="first_name" class="form-label">First Name</label>
                  <input type="text" class="form-control" name="first_name" required autofocus>
              </div>
              <div class="mb-3">
                  <label for="last_name" class="form-label">Last Name</label>
                  <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email Name</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
              </div>
              <div class="mb-3">
                  <label for="phone_no" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" required>
              </div>
              <div class="mb-3">
                  <select class="form-control" name="division_id">
                    <option>Select Division</option>
                    @foreach ($divisions as $division)
                      <option class="form-control" value="{{ $division->id }}">{{$division->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3">
                  <select class="form-control" name="district_id">
                    <option>Select District</option>
                    @foreach ($districts as $district)
                      <option class="form-control" value="{{ $district->id }}">{{$district->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3">
                  <label for="street_address" class="form-label">Street Address</label>
                  <input type="text" class="form-control" name="street_address" value="{{ old('street_address') }}" required>
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" required>
              </div>
              <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Password Confirmation</label>
                  <input type="password" class="form-control" name="password_confirmation" required>
              </div>
              <div class="mb-3">
                  <input type="submit" class="form-control" value="Register">
              </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    </div>











        <!-- Name -->
        {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> --}}

        {{-- <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div> --}}
   
{{-- </x-guest-layout> --}}
@endsection