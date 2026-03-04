@extends('Backend.layout.master')
@section('content')
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Category</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('Backend.partials.message')
                        <div class="form-group">
                            <label for="Name" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="Name" value="{{ $brand->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="80" rows="8">{{ $brand->description }}</textarea>
                        </div>

                        

                        {{-- <div class="form-group">
                            <label for="parent_category" class="form-label">Parent Brand (Optional)</label>
                            <select name="parent_id" class="form-control">
                                    <option value="">Please select a primary Brand</option>
                                @foreach ($brand as  $brandElement)
                                    <option value="{{ $brandElement->id }}">{{ $brandElement->id == $brandElement->id ? 'selected' : '' }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="image" class="form-label">Brand Old Image</label> 
                            <img src="{{ asset('images/brands/'.$brand->image) }}" width="100" alt="">
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Brand New Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Updated Brand</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

