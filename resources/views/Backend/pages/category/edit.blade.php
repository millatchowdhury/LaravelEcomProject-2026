@extends('Backend.layout.master')
@section('content')
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Category</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $categoryById->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('Backend.partials.message')
                        <div class="form-group">
                            <label for="Name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="Name" value="{{ $categoryById->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="80" rows="8">{{ $categoryById->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="parent_category" class="form-label">Parent Category (Optional)</label>
                            <select name="parent_id" class="form-control">
                                    <option value="">Please select a primary Category</option>
                                @foreach ($main_Categories as  $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->id == $categoryById->parent_id ? 'selected' : '' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Category Old Image</label> 
                            <img src="{{ asset('images/categories/'.$categoryById->image) }}" width="100" alt="">
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Category New Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

