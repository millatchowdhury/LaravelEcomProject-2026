@extends('Backend.layout.master')
@section('content')
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Division</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.division.update', $division->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('Backend.partials.message')
                        <div class="form-group">
                            <label for="Name" class="form-label">Division Name</label>
                            <input type="text" class="form-control" id="Name" value="{{ $division->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="priority" class="form-label">Division Priority</label>
                            <input type="text" class="form-control" name="priority" value="{{ $division->priority }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Division</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

