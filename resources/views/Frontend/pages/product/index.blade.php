@extends('Frontend.layout.master')

@section('content')

<div class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-2">
                    @include('Frontend.partials.sidebar')
                </div>
                <div class="col-xl-10">
                    <div class="featured-product">
                        <h1>All Products</h1>
                        <div class="row">

                            @foreach ($products as $product)
                               
                            <div class="col-xl-3">
                                <div class="card" style="margin-bottom: 15px;">
                                    {{-- @foreach ($product->imagesFunction as $image)
                                    <img src="{{ asset('Frontend/assets/images/'.$image->image) }}" class="card-img-top" alt="">
                                    @endforeach --}}
                                    @php $i = 1;  @endphp
                                    @foreach ($product->imagesFunction as $image)
                                        @if($i>0)
                                            <img src="{{ asset('Frontend/assets/images/'.$image->image) }}" class="card-img-top" alt="">
                                        @endif
                                        @php $i--; @endphp
                                    @endforeach
                                    <div class="card-body" style="text-align: center">
                                        <h5 class="card-title">{{ $product->title }}</h5>
                                        <p class="card-text">Taka - {{ $product->price }}</p>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
                                    </div>
                                </div>
                            </div>

                           @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection