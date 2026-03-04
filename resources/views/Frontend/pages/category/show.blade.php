@extends('Frontend.layout.master')

@section('content')

<div class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-2">
                    @include('Frontend.partials.sidebar')
                </div>
                <div class="col-xl-10">
                    <h3>All Products in <span class="badge text-bg-info">{{$category->name}}</span> Category</h3>

                    @php
                        $products = $category->products()->paginate(9);
                    @endphp
                    
                    @if ($products->count() > 0)
                        @include('Frontend.pages.product.partials.all_products')
                    @else
                        <div class="alert alert-warning">
                            No Products has added yet in this category !!
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
@endsection