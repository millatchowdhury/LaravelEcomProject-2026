@extends('Backend.layout.master')
@section('content')
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h1>Add District</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.district.store') }}" method="POST">
                        @csrf
                        @include('Backend.partials.message')
                        <div class="form-group">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="name" placeholder="Enter District Name">
                        </div>
                        <div class="form-group">
                            <label for="division" class="form-label">Select Division</label>
                            <select name="division_id" id="" class="form-control">
                                @foreach ($divisions as $division)
                                    <option class="form-control" value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="parent_category" class="form-label">Parent Category(Option) </label>
                            <select name="parent_id" class="form-control">
                                    <option value="">Please Select Parent Category</option>
                                @foreach ($main_Categories as  $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="image" class="form-label">Category Image (Option)</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div> --}}
                        
                        <button type="submit" class="btn btn-primary">Add District</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

