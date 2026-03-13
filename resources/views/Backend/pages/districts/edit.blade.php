@extends('Backend.layout.master')
@section('content')
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h1>Edit District</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.district.update', $district->id) }}" method="POST">
                        @csrf
                        @include('Backend.partials.message')
                        <div class="form-group">
                            <label for="Name" class="form-label">District Name</label>
                            <input type="text" class="form-control" id="Name" value="{{ $district->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="division_name" class="form-label">Select Division</label>
                            <select class="form-control" name="division_id" id="">
                                <option class="form-control">Select Division</option>
                                @foreach ($divisions as $division)
                                    <option class="form-control" value="{{ $division->id }}" {{ $district->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update District</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

