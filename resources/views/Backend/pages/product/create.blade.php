@extends('Backend.layout.master')
@section('content')
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h1>Add Product</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('Backend.partials.message')
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="" class="form-control" cols="80" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        {{-- For Single Image  --}}
                        {{-- <div class="form-group">
                            <label for="product_image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="product_image" name="product_image">
                        </div> --}}

                        {{-- For multiple image  --}}
                        <div class="row">
                            <div class="col-xl-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image">
                            </div>
                            <div class="col-xl-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image">
                            </div>
                            <div class="col-xl-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image">
                            </div>
                            <div class="col-xl-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image">
                            </div>
                            <div class="col-xl-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
          
        </div>




@endsection